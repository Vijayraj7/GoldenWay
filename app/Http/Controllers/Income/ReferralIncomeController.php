<?php

namespace App\Http\Controllers\Income;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\FcmController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ReferralIncomeController extends Controller
{

    public function refincome($planid)
    {
        $stake = DB::table("customer_plans")->where("id", $planid)->first();
        $musr = DB::table("customers")->where("id", $stake->csId)->first();
        $refuser = DB::table('customers')->where('id', $musr->referral)->first();
        if ($refuser && balance2x($refuser->id) > 0) {

            $stake_ref = $stake->pamount / 100 * 5;
            if ($stake_ref > balance2x($refuser->id)) {
                $stake_ref = balance2x($refuser->id);
            }
            if ($stake_ref > 0) {
                DB::table('customer_transactions')->insert([
                    'csId' => $musr->referral,
                    'fcsId' => $musr->id,
                    'tamount' => $stake_ref,
                    'planId' => $planid,
                    'tStatus' => '1',
                    'wStatus' => '0',
                    'tType' => 'refincome',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
        }
        return "referral";
    }

}