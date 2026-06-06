<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\NwStoreUserRequest;
use Illuminate\Support\Facades\Validator;
// use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\File;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\ApiController;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

// require_once 'vendor/Intervention/src/ImageManager.php';


class LoginApiController extends Controller
{


    public function logout(Request $rqs)
    {
        Auth::logout();
        // Unset all session variables
        session_start();
        session_unset();
        // Destroy the session
        session_destroy();
        return redirect('/login');
    }
    public function register(Request $rqs)
    {
        $h = new HelperController;
        $rqd = json_decode(json_encode($rqs->all()));
        // dd($rqd);
        $vef = DB::table("customers_inactive")->where('email', $rqd->email)->first();
        $rfusr = DB::table("customers")->where('id', $rqd->referral)->first();
        // if ($rqd->email != $rqd->remail) {
        //     return redirect()->back()->withInput($rqs->all())->withErrors([
        //         'email' => 'Re entered email not match',
        //         // 'password' => 'Wrong password',
        //     ]);
        // }

        if ($rqd->password == $rqd->tpassword) {
            return redirect()->back()->withInput($rqs->all())->withErrors([
                'password' => 'password and transaction password cannot be same',
                // 'password' => 'Wrong password',
            ]);
        }

        if ($rfusr == null) {
            return redirect()->back()->withInput($rqs->all())->withErrors([
                'referral' => 'Referral user not found',
                // 'password' => 'Wrong password',
            ]);
        }

        $pttamnt = DB::table('customer_plans')->where('csId', $rfusr->id)->where('pstatus', '1')->get()->sum('pamount');
        if ($pttamnt < 1) {
            return redirect()->back()->withInput($rqs->all())->withErrors([
                'referral' => 'Referral user not active',
                // 'password' => 'Wrong password',
            ]);
        }


        $vpe = DB::table("customers")->where('phone', $rqd->phone)->first();
        if (strlen($rqd->phone) != 10) {
            return redirect()->back()->withInput($rqs->all())->withErrors([
                'phone' => 'phone number not 10 digit',
                // 'password' => 'Wrong password',
            ]);
        }
        if ($vpe != null) {
            return redirect()->back()->withInput($rqs->all())->withErrors([
                'phone' => 'phone number already exists',
                // 'password' => 'Wrong password',
            ]);
        }
        $ve = DB::table("customers")->where('email', $rqd->email)->first();
        if ($ve != null) {
            return redirect()->back()->withInput($rqs->all())->withErrors([
                'email' => 'email already exists',
                // 'password' => 'Wrong password',
            ]);
        } else if ($vef != null) {
            return redirect()->back()->withInput($rqs->all())->withErrors([
                'email' => 'email already exists, activate to continue !',
                // 'password' => 'Wrong password',
            ]);
        } else {
            $pas = $rqd->password;
            $rqd->password = Hash::make($rqd->password);
            $rqd->tpassword = Hash::make($rqd->tpassword);
            $rqd->code = Str::random(6);
            $fid = $h->toTable("customers_inactive", $rqd);
            $inac = DB::table("customers_inactive")->where('id', $fid)->first();
            unset($inac->id);
            unset($inac->code);
            // dd($inac);
            $vvvid = $h->toTable("customers", $inac);

            $nuser = User::firstOrCreate(
                ['email' => $inac->email], // Condition to check if the user exists
                [
                    'name' => $inac->name,
                    'password' => $pas,
                ]
            );

            // $credentials = $rqs->only('email', 'password');
            if (Auth::attempt(['email' => $inac->email, 'password' => $pas])) {
                $rqs->session()->regenerate();
                session_start();
                $_SESSION["mail"] = $inac->email;
                return redirect('/dashboard');
            } else {
                return redirect()->back()->withInput($rqs->only('email', 'password'))->withErrors([
                    // 'email' => 'Wrong email',
                    'password' => "Login Failed",
                ]);
            }
            // $h->sendMail($mail, $rqd->name, $fid, $h->encrypt($rqd->code));
            // return redirect('/register/sent');
        }
    }

    public function activate($id, $code)
    {
        $h = new HelperController;
        $dcode = $h->decrypt($code);
        $ve = DB::table("customers_inactive")->where('id', $id)->where('code', $dcode)->first();
        $vef = DB::table("customers_inactive")->where('id', $id)->first();
        $vem = DB::table("customers")->where('email', $vef->email)->first();
        if ($vem != null) {
            return view('auth.login.activation', ['st' => 'a']);
        }
        if ($ve != null) {
            unset($ve->id);
            unset($ve->created_at);
            unset($ve->code);
            $fid = $h->toTable("customers", $ve);
            $v = DB::table("customers")->where('id', $fid)->first();
            if ($v->type == 'vendor') {
                $h->toTable('pv', ['vid' => $v->id]);
            } else {
                $h->toTable('cv', ['vid' => $v->id]);
            }
            return view('auth.login.activation', ['st' => 's']);
        } else {
            return view('auth.login.activation', ['st' => 'f']);
        }
    }

    public function verifyphone(Request $rqs)
    {
        $h = new HelperController;
        $prs = json_decode(json_encode($rqs->input(), true), true);
        $phone = $prs['phone'];
        $otp = $prs['otp'];
        $vid = $prs['csId'];

        $user = DB::table('customers')->where('id', $vid)->first();

        // Your 2Factor API key
        $apiKey = '7b78d8b8-6c15-11ef-8b17-0200cd936042'; // Replace with your actual API key

        // 2Factor API URL to verify OTP
        $verifyUrl = "https://2factor.in/API/V1/$apiKey/SMS/VERIFY3/$phone/$otp";

        // Use file_get_contents or cURL to send a GET request to the API
        $response = file_get_contents($verifyUrl);

        // Decode the JSON response
        $responseJson = json_decode($response, true);

        // Check the response status
        if ($responseJson['Status'] === 'Success') {
            // OTP verification successful

            $already_exists = DB::table('customers')->where('vphone', $phone)->exists();

            if ($already_exists) {
                return redirect('/dashboard')->withInput($rqs->all())->withErrors([
                    'otp_verify' => "failed",
                ]);
            } else {
                DB::table('customers')->where('id', $vid)->update(['vphone' => $phone]);
                $ap = new ApiController;
                $ap->quick_reward();
                return redirect('/dashboard')->withInput($rqs->all())->withErrors([
                    'otp_verify' => "success",
                ]);
            }

            // You can redirect to another page or perform any other action here
        } else {
            // OTP verification failed
            // dd($prs);
            return redirect('/dashboard')->withInput($rqs->all())->withErrors([
                'otp_verify' => "failed",
            ]);
        }
    }

    public function registerupdate(Request $rqs)
    {
        session_start();
        if (isset($_SESSION['mail'])) {
            $ve = DB::table('customers')
                ->where('email', $_SESSION['mail'])
                ->first();
            $h = new HelperController;
            $rqd = json_decode(json_encode($rqs->all()));
            if ($ve != null) {
                if ($ve->otpcode != $rqd->otpcode) {
                    return redirect()->back()->withInput()->withErrors([
                        'email' => 'Incorrect otp',
                        // 'password' => 'Wrong password',
                    ]);
                }
                $rqd->otpcode = 'x';
                // if ($rqs->hasFile('image') && $rqs->file('image')->isValid()) {
                // if (isset($rqd->image)) {
                //     // if (isset($prs['id']) && isset($prs['img'])) {
                //     $h->deleteFileByUrl($ve->img);
                //     // }
                //     $image = $rqs->file('image');
                //     $imageName = time() . '.' . $image->getClientOriginalExtension();
                //     $image->move(public_path('uploads'), $imageName);
                //     $url = asset('uploads/' . $imageName);
                //     $rqd->img = $url;
                // }
                if (isset($rqd->image)) {
                    $image = $rqs->file('image');

                    // Check if image size exceeds 500MB (500 * 1024 * 1024 bytes)
                    $isize = ($image->getSize() / 1000000);
                    if ($isize > 1) {
                        return redirect()->back()->withInput()->withErrors([
                            'image' => 'Image maximum size is 1MB',
                            // 'password' => 'Wrong password',
                        ]);
                    }

                    // Delete existing image if it exists
                    if (isset($ve->img)) {
                        $h->deleteFileByUrl($ve->img);
                    }

                    // Move the uploaded image to the uploads directory
                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('uploads'), $imageName);
                    $url = asset('uploads/' . $imageName);
                    $rqd->img = $url;
                }
                // if (isset($rqd->image)) {
                //     // if (isset($prs['id']) && isset($prs['img'])) {
                //     //     $h->deleteFileByUrl($ve->img);
                //     // }
                //     $image = $rqs->file('image');
                //     $imageName = time() . '.' . $image->getClientOriginalExtension();

                //     // Check file size
                //     $fileSize = $image->getSize();
                //     if ($fileSize > 400 * 1024) { // Convert 400kb to bytes
                //         // Compress the image
                //         $manager = new ImageManager(); // Assuming Intervention Image is installed
                //         $compressedImage = $manager->make($image)->encode('jpg', 80); // Compress to 80% quality

                //         // Generate a new filename for compressed image
                //         $compressedImageName = 'compressed_' . $imageName;

                //         // Save the compressed image
                //         $compressedImage->save(public_path('uploads/' . $compressedImageName));

                //         // Use the compressed image path
                //         $url = asset('uploads/' . $compressedImageName);
                //     } else {
                //         // File size is already less than 400kb, save directly
                //         $image->move(public_path('uploads'), $imageName);
                //         $url = asset('uploads/' . $imageName);
                //     }

                //     $rqd->img = $url;
                // }
                // if (isset($rqd->image)) {
                //     $image = $rqs->file('image');
                //     $imageName = time() . '.' . $image->getClientOriginalExtension();
                //     $imagePath = public_path('uploads/') . $imageName;

                //     // Move the original image
                //     $image->move(public_path('uploads'), $imageName);

                //     // Compress the image until it's approximately 150 KB in size
                //     $quality = 75; // Initial quality
                //     while (filesize($imagePath) > 150 * 1024 && $quality >= 0) {
                //         $this->compressImage($imagePath, $imagePath, $quality); // Compress with current quality
                //         $quality -= 5; // Decrease quality for next iteration
                //     }

                //     $url = asset('uploads/' . $imageName);
                //     $rqd->img = $url;
                // }

                // Function to compress the image using GD library


                // $mail = $rqd->email;
                // $rqd->password = Hash::make($rqd->password);
                $h->toTableupdate("customers", $rqd);
                // $h->sendMail($mail, $rqd->name);
                // session_start();
                // $_SESSION["mail"] = "$mail";
                return redirect('dashboard/profile');
            }
        } else {
            return abort(404);
        }
    }
    function compressImage($sourcePath, $destinationPath, $quality)
    {
        $info = getimagesize($sourcePath);
        if ($info['mime'] == 'image/jpeg') {
            $image = imagecreatefromjpeg($sourcePath);
            imagejpeg($image, $destinationPath, $quality);
        } elseif ($info['mime'] == 'image/png') {
            $image = imagecreatefrompng($sourcePath);
            imagepng($image, $destinationPath, floor($quality / 10)); // PNG quality is represented from 0 to 9, so we need to adjust it
        }
        imagedestroy($image);
    }

    public function login(Request $rqs)
    {
        // if (session_status() !== PHP_SESSION_ACTIVE) {
        //     session_start();
        // }
        // if (isset($_SESSION['mail'])) {
        //     return redirect('/dashboard');
        // }
        $rqd = json_decode(json_encode($rqs->all()));
        $ve = DB::table("customers")->where('email', $rqd->email)->first();
        $vef = DB::table("customers_inactive")->where('email', $rqd->email)->first();
        if ($ve == null) {
            return redirect()->back()->withInput($rqs->only('email', 'password'))->withErrors([
                'email' => 'email not found',
                // 'password' => 'Wrong password',
            ]);
        }

        // else if ($ve == null && $vef != null) {
        //     return redirect()->back()->withInput($rqs->only('email', 'password'))->withErrors([
        //         'email' => 'activate email to continue',
        //         // 'password' => 'Wrong password',
        //     ]);
        // }

        $createdDate = Carbon::parse($ve->last_login_attempt);
        $daysDifference = $createdDate->diffInHours(date('Y-m-d H:i:s'));
        if ($ve->login_attempts > 2 && $daysDifference > 24) {
            $ve->login_attempts = 0;
            DB::table("customers")->where('email', $rqd->email)->update(
                [
                    'login_attempts' => 0,
                ]
            );
        }
        if (Hash::check($rqd->password, $ve->password)) {
            // The passwords match... if ($ve->login_attempts == 4) {
            if ($ve->login_attempts > 2 && $daysDifference < 24) {
                return redirect()->back()->withInput($rqs->only('email', 'password'))->withErrors([
                    // 'email' => 'Wrong email',
                    'password' => "Account is blocked , You can try after 24 hours",
                ]);
            } else {
                DB::table("customers")->where('email', $rqd->email)->update(
                    [
                        'last_login_time' => date('Y-m-d H:i:s'),
                        'last_login_attempt' => date('Y-m-d H:i:s'),
                        'login_attempts' => 0,
                    ]
                );
                // $validated = $rqs->validated();
                $nuser = User::firstOrCreate(
                    ['email' => $rqd->email], // Condition to check if the user exists
                    [
                        'name' => $ve->name,
                        'password' => $rqd->password,
                    ]
                );

                $credentials = $rqs->only('email', 'password');
                if (Auth::attempt($credentials)) {
                    $rqs->session()->regenerate();
                    session_start();
                    $_SESSION["mail"] = $rqd->email;
                    return redirect('dashboard');
                } else {
                    return redirect()->back()->withInput($rqs->only('email', 'password'))->withErrors([
                        // 'email' => 'Wrong email',
                        'password' => "Login Failed",
                    ]);
                }
            }
        } else {
            $ve->login_attempts = $ve->login_attempts ?? 0;
            $ve->login_attempts++;

            if ($ve->login_attempts > 3) {
                return redirect()->back()->withInput($rqs->only('email', 'password'))->withErrors([
                    // 'email' => 'Wrong email',
                    'password' => "Account is blocked , You can try after 24 hours",
                ]);
            } else {
                DB::table("customers")->where('email', $rqd->email)->update(
                    [
                        'last_login_attempt' => date('Y-m-d H:i:s'),
                        'login_attempts' => $ve->login_attempts,
                    ]
                );
                return redirect()->back()->withInput($rqs->only('email', 'password'))->withErrors([
                    // 'email' => 'Wrong email',
                    'password' => "Wrong password " . (4 - $ve->login_attempts) . " Attempts remaining",
                ]);
            }
        }
        // $v = DB::table("customers")->where('email', $rqd->email)->where('password', $rqd->password)->first();
        // if ($v == null) {

        // } else {

        // }
    }

    public function sendpass(Request $rqs)
    {
        $h = new HelperController;
        $rqd = json_decode(json_encode($rqs->all()));
        // $ve = DB::table("customers")->where('email', $rqd->email)->first();
        $ve = DB::table("customers")->where('email', $rqd->email)->first();
        $vef = DB::table("customers_inactive")->where('email', $rqd->email)->first();
        if ($ve == null) {
            return redirect()->back()->withInput($rqs->only('email', 'password'))->withErrors([
                'email' => 'email not found',
                // 'password' => 'Wrong password',
            ]);
        }
        $rqd->fcode = Str::random(6);
        $rqd->id = $vef->id;
        $h->toTableupdate("customers_inactive", $rqd);
        $h->sendforgetMail($ve->email, $ve->name, $vef->id, $h->encrypt($rqd->fcode));
        return redirect('/login/sendpass/s');
    }

    public function forget($id, $code)
    {
        $h = new HelperController;
        // $rqd = json_decode(json_encode($rqs->all()));
        $vef = DB::table("customers_inactive")->where('id', $id)->where('fcode', $h->decrypt($code))->first();
        if ($vef == null) {
            abort(404);
        } else {
            $ve = DB::table("customers")->where('email', $vef->email)->first();
            return view('auth.login.forget', ['st' => 'form', 'v' => $ve, 'id' => $id, 'code' => $code]);
        }
    }

    public function changepass(Request $rqs)
    {
        $h = new HelperController;
        $rqd = json_decode(json_encode($rqs->all()));
        $vef = DB::table("customers_inactive")->where('id', $rqd->id)->where('fcode', $h->decrypt($rqd->code))->first();
        if (isset($rqd->password) && isset($rqd->tpassword)) {
            if ($rqd->password == $rqd->tpassword) {
                return redirect()->back()->withInput()->withErrors([
                    'password' => 'password and transaction password cannot be same',
                    // 'password' => 'Wrong password',
                ]);
            }
        }
        if (isset($rqd->password)) {
            if ($rqd->password != $rqd->spassword) {
                return redirect()->back()->withInput()->withErrors([
                    'password' => 'password not same',
                    // 'password' => 'Wrong password',
                ]);
            }
        }
        if (isset($rqd->tpassword)) {
            if ($rqd->tpassword != $rqd->stpassword) {
                return redirect()->back()->withInput()->withErrors([
                    'password' => 'transaction password not same',
                    // 'password' => 'Wrong password',
                ]);
            }
        }
        if ($vef == null) {
            // abort(404);
            return 'something error..';
        } else {
            $ve = DB::table("customers")->where('email', $vef->email)->first();
            if (isset($rqd->password)) {
                $h->toTableupdate("customers", ['id' => $ve->id, 'password' => Hash::make($rqd->password)]);
                $user = User::where('email', $vef->email)->first();
                if ($user != null) {
                    $user->password = $rqd->password;
                    $user->save();
                }
            }
            if (isset($rqd->tpassword)) {
                $h->toTableupdate("customers", ['id' => $ve->id, 'tpassword' => Hash::make($rqd->tpassword)]);
            }
            $h->toTableupdate("customers_inactive", ['id' => $vef->id, 'fcode' => 'x']);
            return redirect('/');
        }
    }

    public function dltuser(Request $rqs)
    {
        $h = new HelperController;
        $rqd = json_decode(json_encode($rqs->all()));
        if (isset($rqd->dltid)) {
            $cst = DB::table('customers')->where('id', $rqd->dltid)->first();
            $ttamount = DB::table('customer_plans')->where('csId', $rqd->dltid)->where('pstatus', '1')->get()->sum('pamount');
            if ($cst != null) {
                if ($ttamount == 0) {
                    User::where('email', $cst->email)->delete();
                    DB::table('customers_inactive')->where('email', $cst->email)->delete();
                    DB::table('customers')->where('id', $rqd->dltid)->delete();
                    return redirect('/admin');
                }
            } else {
                return redirect('/admin');
            }
        }
    }

}