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

class LevelIncomeController extends Controller
{

    public function levelincome($planid)
    {
        $stake = DB::table('customer_plans')->where('id', $planid)->first();
        $stake_user = DB::table('customers')->where('id', $stake->csId)->first();

        $current_referral_id = $stake_user->referral;

        for ($level = 1; $level <= 5; $level++) {
            if (empty($current_referral_id)) {
                break;
            }

            $referal_user = DB::table('customers')->where('id', $current_referral_id)->first();
            if (!$referal_user) {
                break;
            }

            $next_referral_id = $referal_user->referral;

            $bal2x = balance2x($referal_user->id);
            if ($bal2x > 0) {
                $level_income = ($stake->pamount / 100) * 1;

                $actual_income = $level_income;
                if ($actual_income > $bal2x) {
                    $actual_income = $bal2x;
                }

                DB::table('customer_transactions')->insert([
                    'csId' => $referal_user->id,
                    'fcsId' => $stake->csId,
                    'tamount' => $actual_income,
                    'tStatus' => '1',
                    'wStatus' => '0',
                    'tType' => 'levincome',
                    'planId' => $stake->id,
                    'levl' => (string) $level,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }

            // Move to the next level referrer
            $current_referral_id = $next_referral_id;
        }
        return "level";
    }



}