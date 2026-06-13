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

class StakeIncomeController extends Controller
{

    public function stakeincome()
    {
        $users = DB::table('customers')->get();
        foreach ($users as $user) {
            $stake_amount = DB::table('customer_plans')->where('csId', $user->id)->sum('pamount');
            if (balance2x($user->id) > 0) {
                $stakeincome = $stake_amount / 100 * 0.5;
                if ($stakeincome > balance2x($user->id)) {
                    $stakeincome = balance2x($user->id);
                }

                if ($stakeincome > 0) {
                    $lastTransaction = DB::table('customer_transactions')
                        ->where('csId', $user->id)
                        ->where('tType', 'stake_income')
                        ->latest('created_at')
                        ->first();

                    $newCreatedAt = Carbon::now()->subHours(4);
                    if ($lastTransaction) {
                        $lastDate = Carbon::parse($lastTransaction->created_at);
                        if (Carbon::now()->diffInHours($lastDate) < 24) {
                            continue;
                        }
                        $newCreatedAt = $lastDate->addHours(24);
                    }

                    DB::table('customer_transactions')
                        ->insert([
                            'tType' => 'stake_income',
                            'created_at' => $newCreatedAt->format('Y-m-d H:i:s'),
                            'csId' => $user->id,
                            'tAmount' => strval($stakeincome),
                            'tStatus' => '1',
                            'wStatus' => '0',
                        ]);
                }
            }
        }
        return "stake";
    }



}