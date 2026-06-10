<?php
if (!function_exists('getPname')) {
    function getPname($parameter)
    {
        // Your logic here
        switch ($parameter) {
            case 'normal':
                return "Silver";
            case 'allincome':
                return "Withdraw";
            case 'transfer':
                return "Transfer";
            case 'reinvest':
                return "Restake Silver";
            case 'refincome':
                return "Referral Income";
            case 'levincome':
                return "Level Income";
            case 'pincome':
                return "Profit";
            case 'compound':
                return "Gold";
            case 'reinvest_compound':
                return "Restake Gold";
            case 'creditadd':
                return "Add Fund";
            case 'ref_reward':
                return "Quick Reward";
            case 'mine_amount':
                return "Mined Amount";
            default:
                return $parameter;
        }
    }
}

function getlevusers($levn, $v)
{
    if ($levn == '1') {
        return DB::table('customers')
            ->where('referral', $v->id)
            ->get();
    }

    if ($levn == '2') {
        return DB::table('customers as c1')
            ->join('customers as c2', 'c1.referral', '=', 'c2.id')
            ->where('c2.referral', $v->id)
            ->select('c1.*')
            ->get();
    }

    if ($levn == '3') {
        return DB::table('customers as c1')
            ->join('customers as c2', 'c1.referral', '=', 'c2.id')
            ->join('customers as c3', 'c2.referral', '=', 'c3.id')
            ->where('c3.referral', $v->id)
            ->select('c1.*')
            ->get();
    }

    if ($levn == '4') {
        return DB::table('customers as c1')
            ->join('customers as c2', 'c1.referral', '=', 'c2.id')
            ->join('customers as c3', 'c2.referral', '=', 'c3.id')
            ->join('customers as c4', 'c3.referral', '=', 'c4.id')
            ->where('c4.referral', $v->id)
            ->select('c1.*')
            ->get();
    }

    if ($levn == '5') {
        return DB::table('customers as c1')
            ->join('customers as c2', 'c1.referral', '=', 'c2.id')
            ->join('customers as c3', 'c2.referral', '=', 'c3.id')
            ->join('customers as c4', 'c3.referral', '=', 'c4.id')
            ->join('customers as c5', 'c4.referral', '=', 'c5.id')
            ->where('c5.referral', $v->id)
            ->select('c1.*')
            ->get();
    }

}

function checkadmin(): bool
{
    session_start();
    if (isset($_SESSION['mail'])) {
        if (
            // $_SESSION['mail'] == 'forvcom000@gmail.com' ||
            $_SESSION['mail'] == 'sijuwinstar@gmail.com' ||
            // $_SESSION['mail'] == 'sajikakkadan@yahoo.com' ||
            $_SESSION['mail'] == 'ajithaoriens@gmail.com'
            // $_SESSION['mail'] == 'mprasheed51@gmail.com'
            // $_SESSION['mail'] == 'globalmarketstars@gmail.com'
        ) {
            return true;
        } else {
            abort(404);
            return false;
        }
    } else {
        redirect('/login');
        return false;
    }
}

function isAdmin(): bool
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    if (isset($_SESSION['mail'])) {
        if (
            $_SESSION['mail'] == 'forvcom000@gmail.com' ||
            $_SESSION['mail'] == 'sijuwinstar@gmail.com' ||
            // $_SESSION['mail'] == 'sajikakkadan@yahoo.com' ||
            $_SESSION['mail'] == 'ajithaoriens@gmail.com'
            // $_SESSION['mail'] == 'mprasheed51@gmail.com'
            // $_SESSION['mail'] == 'globalmarketstars@gmail.com'
        ) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function isSubDomainAdmin(): bool
{
    if (!empty($_SERVER['HTTP_HOST'])) {
        $host = strtolower($_SERVER['HTTP_HOST']);
        if (strpos($host, 'sub.') === 0 && isAdmin()) {
            return true;
        }
    }
    return false;
}

function subFcm($topic)
{
    echo "<script> try{ FlutterBridge.postMessage('subscribeToTopic:$topic'); } catch(e){} </script>";
}

function unSubFcm($topic)
{
    echo "<script> try{ FlutterBridge.postMessage('unsubscribeFromTopic:$topic'); } catch(e){} </script>";
}

function encStr($value)
{
    try {
        $key = '1e45w145de45q745'; // hardcode
        $iv = 'e16re9t3a2qdawb8'; // hardcode

        // Pad the key and IV if they are not of the expected length
        $key = str_pad($key, 32, "\0");
        $iv = str_pad($iv, 16, "\0");

        $encrypted = openssl_encrypt($value, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
        return base64_encode($encrypted);
    } catch (Exception $e) {
        return '';
    }
}

function decStr($encrypted)
{
    try {
        $key = '1e45w145de45q745'; // hardcode
        $iv = 'e16re9t3a2qdawb8'; // hardcode

        // Pad the key and IV if they are not of the expected length
        $key = str_pad($key, 32, "\0");
        $iv = str_pad($iv, 16, "\0");

        $decrypted = openssl_decrypt(base64_decode($encrypted), 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
        return $decrypted;
    } catch (Exception $e) {
        return '';
    }
}

function clearhis()
{
    echo "<script> document.addEventListener('DOMContentLoaded', function() { window.location.replace(window.location.pathname); }); </script>";
}

function isTest()
{
    return env('IS_TEST', false);
}

function encPass($value, $password)
{
    $hardcodedKey = '1e45w145de45q745';
    $iv = 'e16re9t3a2qdawb8';

    // Derive a 32-byte key from the user's password using PBKDF2
    $derivedKey = hash_pbkdf2('sha256', $password, $hardcodedKey, 10000, 32, true);

    // Pad the IV to ensure it is 16 bytes long
    $iv = str_pad($iv, 16, "\0");

    // Encrypt the value using the derived key and hardcoded IV
    $encrypted = openssl_encrypt($value, 'aes-256-cbc', $derivedKey, OPENSSL_RAW_DATA, $iv);
    return base64_encode($encrypted);
}

function decPass($encryptedValue, $password)
{
    $hardcodedKey = '1e45w145de45q745';
    $iv = 'e16re9t3a2qdawb8';

    // Derive a 32-byte key from the user's password using PBKDF2
    $derivedKey = hash_pbkdf2('sha256', $password, $hardcodedKey, 10000, 32, true);

    // Pad the IV to ensure it is 16 bytes long
    $iv = str_pad($iv, 16, "\0");

    // Decode the base64 encoded encrypted value
    $encrypted = base64_decode($encryptedValue);

    // Decrypt the value using the derived key and hardcoded IV
    $decrypted = openssl_decrypt($encrypted, 'aes-256-cbc', $derivedKey, OPENSSL_RAW_DATA, $iv);
    return $decrypted;
}

function getLevelName($nameno): string
{
    switch ($nameno) {
        case 1:
            return "Normal";
        case 2:
            return "Staker";
        case 3:
            return "Promoter";
        case 4:
            return "Executive Promoter";
        case 5:
            return "Manager";
        case 6:
            return "Diamond Achiever";
        default:
            return "Normall";
    }
}

function getLevelColor(int $nameno): string
{
    switch ($nameno) {
        case 1:
            return "#FF5733";    // Orange
        case 2:
            return "#6b0d6e";    // Green
        case 3:
            return "#317dd4";    // Blue
        case 4:
            return "#FF33A1";    // Pink
        case 5:
            return "#FFD700";    // Gold
        case 6:
            return "#00FFFF";    // Cyan
        default:
            return "#FF5733";    // Default to Orange
    }
}

// function getLevel($id): int
// {
//     $user = DB::table('customers')->where('id', $id)->first();
//     $tamount = DB::table('customer_plans')->where('id', $id)->get()->sum('pamount');
//     $referrals = DB::table('customers')->where('referral', $user->id)->get();
//     $levno = 1;
//     if ($tamount >= 100) {
//         $levno = 2;
//         if ($referrals->count() >= 10) {
//             $levno = 3;
//             $referral3 = 0;
//             foreach ($referrals as $ruser) {
//                 $rlevno = getLevel($ruser->id);
//                 $ruser->levno = $rlevno;
//                 if ($rlevno >= 3) {
//                     $referral3++;
//                 }
//             }
//             if ($referral3 >= 2) {
//                 $levno = 4;
//                 $referral4 = 0;
//                 foreach ($referrals as $ruser) {
//                     if ($ruser->levno >= 4) {
//                         $referral4++;
//                     }
//                 }
//                 if ($referral4 >= 2) {
//                     $levno = 5;
//                     $referral5 = 0;
//                     foreach ($referrals as $ruser) {
//                         if ($ruser->levno >= 5) {
//                             $referral5++;
//                         }
//                     }
//                     if ($referral5 >= 2) {
//                         $levno = 6;
//                     }
//                 }
//             }
//         }
//     }
//     return $levno;
// }

function getcusLevel($id): int
{
    $user = DB::table('customers')->find($id);
    $tamount = DB::table('customer_plans')->where('csId', $id)->sum('pamount');
    $referrals = DB::table('customers')->where('referral', $id)->get();
    foreach ($referrals as $key => $refer) {
        $rtamount = DB::table('customer_plans')->where('csId', $refer->id)->sum('pamount');
        if ($rtamount < 100) {
            unset($referrals[$key]);
        }
    }
    $levno = 1;

    if ($tamount < 100)
        return $levno;

    $levno = 2;
    if ($referrals->count() < 10)
        return $levno;

    $levno = 3;
    $referral3 = $referrals->filter(fn($ruser) => getcusLevel($ruser->id) >= 3)->count();

    if ($referral3 < 2)
        return $levno;

    $levno = 4;
    $referral4 = $referrals->filter(fn($ruser) => $ruser->levno >= 4)->count();

    if ($referral4 < 2)
        return $levno;

    $levno = 5;
    $referral5 = $referrals->filter(fn($ruser) => $ruser->levno >= 5)->count();

    return $referral5 >= 2 ? 6 : $levno;
}

function levName($id): string
{
    return getLevelName(getcusLevel($id));
}
function levColor($id): string
{
    return getLevelColor(getcusLevel($id));
}
function lastlott(): int
{
    return 1;
}