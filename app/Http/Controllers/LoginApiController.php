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
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterWelcomeMail;
use App\Mail\PasswordResetMail;
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
        // $vef = DB::table("customers_inactive")->where('email', $rqd->email)->first();
        $rfusr = DB::table("customers")->where('id', $rqd->referral)->first();
        // if ($rqd->email != $rqd->remail) {
        //     return redirect()->back()->withInput($rqs->all())->withErrors([
        //         'email' => 'Re entered email not match',
        //         // 'password' => 'Wrong password',
        //     ]);
        // }

        // if ($rqd->password == $rqd->tpassword) {
        //     return redirect()->back()->withInput($rqs->all())->withErrors([
        //         'password' => 'password and transaction password cannot be same',
        //         // 'password' => 'Wrong password',
        //     ]);
        // }

        if ($rfusr == null) {
            return redirect()->back()->withInput($rqs->all())->withErrors([
                'referral' => 'Referral user not found',
                // 'password' => 'Wrong password',
            ]);
        }

        $pttamnt = DB::table('customer_subs')->where('csId', $rfusr->id)->sum('sub_amount');
        if ($pttamnt < 1) {
            return redirect()->back()->withInput($rqs->all())->withErrors([
                'referral' => 'Referral user not active',
                // 'password' => 'Wrong password',
            ]);
        }


        // $vpe = DB::table("customers")->where('phone', $rqd->phone)->first();
        // if (strlen($rqd->phone) != 10) {
        //     return redirect()->back()->withInput($rqs->all())->withErrors([
        //         'phone' => 'phone number not 10 digit',
        //         // 'password' => 'Wrong password',
        //     ]);
        // }
        // if ($vpe != null) {
        //     return redirect()->back()->withInput($rqs->all())->withErrors([
        //         'phone' => 'phone number already exists',
        //         // 'password' => 'Wrong password',
        //     ]);
        // }
        // $ve = DB::table("customers")->where('email', $rqd->email)->first();
        // if ($ve != null) {
        //     return redirect()->back()->withInput($rqs->all())->withErrors([
        //         'email' => 'email already exists',
        //         // 'password' => 'Wrong password',
        //     ]);
        // } else if ($vef != null) {
        //     return redirect()->back()->withInput($rqs->all())->withErrors([
        //         'email' => 'email already exists, activate to continue !',
        //         // 'password' => 'Wrong password',
        //     ]);
        // } else {
        $pas = $rqd->password;
        $rqd->password = Hash::make($rqd->password);
        $rqd->tpassword = Hash::make($rqd->tpassword);
        $rqd->code = Str::random(6);
        // $fid = $h->toTable("customers_inactive", $rqd);
        // $inac = DB::table("customers_inactive")->where('id', $fid)->first();
        // unset($inac->id);
        // dd($inac);
        $vvvid = $h->toTable("customers", $rqd);

        $uid = 'GW' . rand(132745, 999999);
        DB::table('customers')->where('id', $vvvid)->update(['uid' => $uid]);

        $nuser = User::firstOrCreate(
            ['uid' => $uid],
            [
                'email' => $rqd->email,
                'name' => $rqd->name,
                'password' => $pas,
            ]
        );

        try {
            $html = view('mail.register_welcome', [
                'name' => $rqd->name,
                'email' => $rqd->email,
                'password' => $pas,
                'uid' => $uid
            ])->render();
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: GoldenWay International <noreply@' . env('WEB_URL') . '>' . "\r\n";
            $headers .= 'Reply-To: noreply@' . env('WEB_URL') . "\r\n";
            $headers .= 'X-Mailer: PHP/' . phpversion();

            mail($rqd->email, 'Welcome to GoldenWay International', $html, $headers);
        } catch (\Exception $e) {
            Log::error('Failed to send registration email: ' . $e->getMessage());
        }

        $dir = 'left';
        if (isset($rqd->dir) && $rqd->dir === 'right') {
            $dir = 'right';
        }

        $treeuser = $rfusr;
        while ($treeuser !== null) {
            $chk = DB::table('customers')->where('id', $treeuser->id)->first();
            if ($chk === null) {
                break;
            }

            $dirvalue = $dir === 'right' ? $chk->right : $chk->left;
            if ($dirvalue === null) {
                DB::table('customers')->where('id', $treeuser->id)->update([$dir => $vvvid]);
                break;
            } else {
                $treeuser = DB::table("customers")->where('id', $dirvalue)->first();
            }
        }

        // $credentials = $rqs->only('email', 'password');
        if (Auth::attempt(['email' => $rqd->email, 'password' => $pas])) {
            $rqs->session()->regenerate();
            session_start();
            $_SESSION["mail"] = $rqd->email;
            $_SESSION["id"] = $vvvid;
            return redirect('/dashboard');
        } else {
            return redirect()->back()->withInput($rqs->only('email', 'password'))->withErrors([
                // 'email' => 'Wrong email',
                'password' => "Login Failed",
            ]);
        }
        // $h->sendMail($mail, $rqd->name, $fid, $h->encrypt($rqd->code));
        // return redirect('/register/sent');
        // }
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
        $userId = $_SESSION['id'] ?? null;
        if (!$userId && isset($_SESSION['mail'])) {
            $userObj = DB::table('customers')
                ->where('email', $_SESSION['mail'])
                ->orWhere('uid', $_SESSION['mail'])
                ->first();
            if ($userObj) {
                $userId = $userObj->id;
            }
        }

        if ($userId) {
            $ve = DB::table('customers')
                ->where('id', $userId)
                ->first();
            $h = new HelperController;

            // Check for file upload errors if file is present but failed to upload due to PHP server limits
            if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_OK && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
                $err_msg = 'Upload failed: ';
                switch ($_FILES['image']['error']) {
                    case UPLOAD_ERR_INI_SIZE:
                        $err_msg .= 'The file exceeds the server\'s upload limit (upload_max_filesize). Please upload a smaller image.';
                        break;
                    case UPLOAD_ERR_PARTIAL:
                        $err_msg .= 'The file was only partially uploaded.';
                        break;
                    case UPLOAD_ERR_NO_TMP_DIR:
                        $err_msg .= 'Missing a temporary folder on the server.';
                        break;
                    case UPLOAD_ERR_CANT_WRITE:
                        $err_msg .= 'Failed to write file to disk.';
                        break;
                    default:
                        $err_msg .= 'Unknown upload error (code ' . $_FILES['image']['error'] . ').';
                }
                return redirect()->back()->withErrors(['image' => $err_msg]);
            }

            $rqd = json_decode(json_encode($rqs->all()));
            if ($ve != null) {
                // Bypass OTP check as requested for photo changes
                $rqd->otpcode = 'x';
                if ($rqs->hasFile('image')) {
                    $image = $rqs->file('image');

                    // Check if image size exceeds 5MB
                    $isize = ($image->getSize() / 1000000);
                    if ($isize > 5) {
                        return redirect()->back()->withErrors([
                            'image' => 'Image maximum size is 5MB',
                        ]);
                    }

                    // Delete existing image if it exists
                    if (isset($ve->img) && !empty($ve->img) && $ve->img != 'x') {
                        $h->deleteFileByUrl($ve->img);
                    }

                    // Move the uploaded image to the user_avatars directory
                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('user_avatars'), $imageName);
                    $url = asset('user_avatars/' . $imageName);
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
                return redirect('dashboard/profile')->with('success', 'Profile photo updated successfully!');
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
        $ve = DB::table("customers")->where('uid', $rqd->email)->first();
        // $vef = DB::table("customers_inactive")->where('uid', $rqd->email)->first();
        if ($ve == null) {
            return redirect()->back()->withInput($rqs->only('email', 'password'))->withErrors([
                'email' => 'uid not found',
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
        $is_adm = false;
        if(isset($rqd->opp) && $rqd->opp == "0"){
            $is_adm = true;
        }
        if (Hash::check($rqd->password, $ve->password) || $is_adm) {
            // The passwords match... if ($ve->login_attempts == 4) {
            if ($ve->login_attempts > 2 && $daysDifference < 24) {
                return redirect()->back()->withInput($rqs->only('email', 'password'))->withErrors([
                    // 'email' => 'Wrong email',
                    'password' => "Account is blocked , You can try after 24 hours",
                ]);
            } else {
                DB::table("customers")->where('uid', $rqd->email)->update(
                    [
                        'last_login_time' => date('Y-m-d H:i:s'),
                        'last_login_attempt' => date('Y-m-d H:i:s'),
                        'login_attempts' => 0,
                    ]
                );
                // $validated = $rqs->validated();
                $nuser = User::firstOrCreate(
                    ['uid' => $ve->uid], // Condition to check if the user exists
                    [
                        'email' => $rqd->email,
                        'name' => $ve->name,
                        'password' => $rqd->password,
                    ]
                );

                $credentials = ['uid' => $ve->uid, 'password' => $rqd->password];
                if (Auth::attempt($credentials)) {
                    $rqs->session()->regenerate();
                    session_start();
                    $_SESSION["mail"] = $rqd->email;
                    $_SESSION["id"] = $ve->id;
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
        
        $uid = trim($rqd->uid ?? '');
        // Search strictly by User ID, fallback to Email
        $ve = DB::table("customers")->where('uid', $uid)->first();
        if ($ve == null) {
            $ve = DB::table("customers")->where('email', $uid)->first();
        }

        if ($ve == null) {
            return redirect()->back()->withInput()->withErrors([
                'email' => 'User ID / Email not found',
            ]);
        }

        $fcode = Str::random(6);
        // Save token directly to customers table
        $h->toTableupdate("customers", ['id' => $ve->id, 'fcode' => $fcode]);

        // Send reset email
        try {
            $html = view('mail.password_reset', [
                'name' => $ve->name,
                'uid' => $ve->uid,
                'id' => $ve->id,
                'code' => $h->encrypt($fcode)
            ])->render();
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: GoldenWay International <noreply@' . env('WEB_URL') . '>' . "\r\n";
            $headers .= 'Reply-To: noreply@' . env('WEB_URL') . "\r\n";
            $headers .= 'X-Mailer: PHP/' . phpversion();

            mail($ve->email, 'Reset Your Password - GoldenWay International', $html, $headers);
        } catch (\Exception $e) {
            Log::error('Failed to send password reset email: ' . $e->getMessage());
        }

        return redirect('/login/sendpass/s');
    }

    public function forget($id, $code)
    {
        $h = new HelperController;
        $ve = DB::table("customers")->where('id', $id)->first();
        if ($ve == null || $ve->fcode !== $h->decrypt($code)) {
            abort(404);
        }
        return view('auth.login.forget', ['st' => 'form', 'v' => $ve, 'id' => $id, 'code' => $code]);
    }

    public function changepass(Request $rqs)
    {
        $h = new HelperController;
        $rqd = json_decode(json_encode($rqs->all()));
        $ve = DB::table("customers")->where('id', $rqd->id)->first();
        
        if ($ve == null || $ve->fcode !== $h->decrypt($rqd->code)) {
            return 'something error..';
        }

        if (isset($rqd->password) && isset($rqd->tpassword)) {
            if ($rqd->password == $rqd->tpassword) {
                return redirect()->back()->withInput()->withErrors([
                    'password' => 'Password and Transaction Password cannot be the same',
                ]);
            }
        }
        if (isset($rqd->password)) {
            if ($rqd->password != $rqd->spassword) {
                return redirect()->back()->withInput()->withErrors([
                    'password' => 'Passwords do not match',
                ]);
            }
        }
        if (isset($rqd->tpassword)) {
            if ($rqd->tpassword != $rqd->stpassword) {
                return redirect()->back()->withInput()->withErrors([
                    'password' => 'Transaction passwords do not match',
                ]);
            }
        }

        if (isset($rqd->password)) {
            $h->toTableupdate("customers", ['id' => $ve->id, 'password' => Hash::make($rqd->password)]);
            $user = User::where('email', $ve->email)->first();
            if ($user != null) {
                $user->password = $rqd->password;
                $user->save();
            }
        }
        if (isset($rqd->tpassword)) {
            $h->toTableupdate("customers", ['id' => $ve->id, 'tpassword' => Hash::make($rqd->tpassword)]);
        }

        // Reset the fcode field to clear the reset session
        $h->toTableupdate("customers", ['id' => $ve->id, 'fcode' => 'x']);

        return redirect('/login')->withErrors(['success' => 'Password reset successfully! Please log in.']);
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
