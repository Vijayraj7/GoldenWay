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

class BinaryIncomeController extends Controller
{

    public function binaryincome()
    {
        $users = DB::table('customers')->get();
        foreach ($users as $user) {
            // Process each user
            $left_amount = 0;
            $right_amount = 0;
            if ($user->left && $user->right) {

                $main_left = DB::table('customers')->where('id', $user->left)->first();
                $main_right = DB::table('customers')->where('id', $user->right)->first();

                if ($main_left) {
                    $left_amount += $this->balance_sub($user->id, $main_left->id);
                    $left_amount += $this->binary_side_total($user->id, $main_left->id, null);
                }

                if ($main_right) {
                    $right_amount += $this->balance_sub($user->id, $main_right->id);
                    $right_amount += $this->binary_side_total($user->id, $main_right->id, null);
                }

                $main_amount = 0;
                if ($left_amount <= $right_amount) {
                    $main_amount = $left_amount;
                } else {
                    $main_amount = $right_amount;
                }

                if ($main_amount > 0) {
                    $txnamount = $main_amount / 10;
                    $bal2x = balance2x($user->id);
                    if ($bal2x > 0) {
                        if ($txnamount > $bal2x) {
                            $txnamount = $bal2x;
                        }
                        DB::table('customer_transactions')
                            ->insert([
                                'tType' => 'sub_income',
                                'created_at' => Carbon::parse(Carbon::now())->subHours(4)->format('Y-m-d H:i:s'),
                                'csId' => $user->id,
                                'tAmount' => strval($txnamount),
                                'tStatus' => '1',
                                'wStatus' => '0',
                            ]);

                        $original_income = $main_amount;
                        if ($original_income > $bal2x) {
                            $original_income = $bal2x;
                        }

                        if ($main_left) {
                            $left_total = $main_amount;
                            $original_left_income = $original_income;
                            $left_total = $this->confirm_sub($user->id, $main_left->id, $left_total, $original_left_income);
                            $this->binary_side_total($user->id, $main_left->id, $left_total, $original_left_income);
                        }

                        if ($main_right) {
                            $right_total = $main_amount;
                            $original_right_income = $original_income;
                            $right_total = $this->confirm_sub($user->id, $main_right->id, $right_total, $original_right_income);
                            $this->binary_side_total($user->id, $main_right->id, $right_total, $original_right_income);
                        }
                    }
                }
            }
        }
        return "yes";
    }


    public function binary_side_total($user_id, $main_user_id, $confirm_amount = null, $original_income = null): float
    {
        $main_user = DB::table('customers')->where('id', $main_user_id)->first();
        if (!$main_user) {
            return 0.0;
        }
        $total_amount = 0.0;

        $left_user = DB::table('customers')->where('id', $main_user->left)->first();
        $right_user = DB::table('customers')->where('id', $main_user->right)->first();

        if ($left_user) {
            if ($confirm_amount !== null && $confirm_amount > 0) {
                $confirm_amount = $this->confirm_sub($user_id, $left_user->id, $confirm_amount, $original_income);
            }
            $total_amount += $this->balance_sub($user_id, $left_user->id);
            $total_amount += $this->binary_side_total($user_id, $left_user->id, $confirm_amount, $original_income);
        }

        if ($right_user) {
            if ($confirm_amount !== null && $confirm_amount > 0) {
                $confirm_amount = $this->confirm_sub($user_id, $right_user->id, $confirm_amount, $original_income);
            }
            $total_amount += $this->balance_sub($user_id, $right_user->id);
            $total_amount += $this->binary_side_total($user_id, $right_user->id, $confirm_amount, $original_income);
        }

        return $total_amount;
    }

    public function balance_sub($main_user_id, $user_id)
    {
        $uId = is_object($user_id) ? $user_id->id : $user_id;
        $subs = DB::table('customer_subs')->where('csId', $uId)->get();
        $total_balance = 0.0;
        foreach ($subs as $sub) {
            $sub_transaction_amount = DB::table('customer_sub_transactions')
                ->where('csId', $main_user_id)
                ->where('fcsId', $uId)
                ->where('sub_id', $sub->id)
                ->sum('amount');

            if ($sub_transaction_amount > 0) {
                $sub_amount = (float) $sub->sub_amount;
                $tx_amount = (float) $sub_transaction_amount;
                if ($sub_amount > $tx_amount) {
                    $total_balance += ($sub_amount - $tx_amount);
                }
            } else {
                $total_balance += (float) $sub->sub_amount;
            }
        }
        return $total_balance;
    }

    public function confirm_sub($main_user_id, $user_id, $confirm_amount, $original_income)
    {
        $uId = is_object($user_id) ? $user_id->id : $user_id;
        $subs = DB::table('customer_subs')->where('csId', $uId)->get();
        $total_confirm_amount = (float) $confirm_amount;
        $total_original_amount = (float) $original_income;

        foreach ($subs as $sub) {
            if ($total_confirm_amount <= 0) {
                break;
            }

            $tx_amount = DB::table('customer_sub_transactions')
                ->where([
                    'csId' => $main_user_id,
                    'fcsId' => $uId,
                    'sub_id' => $sub->id
                ])
                ->sum('amount');

            $sub_amount = (float) $sub->sub_amount;
            $total_original_amount = $total_original_amount < 0 ? 0 : $total_original_amount;
            if ($tx_amount > 0) {
                if ($tx_amount < $sub_amount) {
                    $minus_amount = $sub_amount - $tx_amount;
                    $amount_to_confirm = min($total_confirm_amount, $minus_amount);
                    if ($amount_to_confirm > 0) {
                        $insert_amount = ($tx_amount + $amount_to_confirm);
                        $not_have_balance = $insert_amount > $total_original_amount;
                        DB::table('customer_sub_transactions')->insert([
                            'csId' => $main_user_id,
                            'fcsId' => $uId,
                            'amount' => $insert_amount,
                            'user_amount' => $not_have_balance ? $total_original_amount : $insert_amount,
                            'status' => '1',
                            'company' => $not_have_balance ? '1' : '0',
                            'company_amount' => $not_have_balance ? $insert_amount - $total_original_amount : 0,
                            'sub_id' => $sub->id,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        ]);
                        $total_confirm_amount -= $amount_to_confirm;
                        $total_original_amount -= $amount_to_confirm;
                    }
                }
            } else {
                $amount_to_confirm = min($total_confirm_amount, $sub_amount);
                $insert_amount = $amount_to_confirm;
                $not_have_balance = $insert_amount > $total_original_amount;
                if ($amount_to_confirm > 0) {
                    DB::table('customer_sub_transactions')->insert([
                        'csId' => $main_user_id,
                        'fcsId' => $uId,
                        'status' => '1',
                        'amount' => $insert_amount,//1200
                        'user_amount' => $not_have_balance ? $total_original_amount : $insert_amount,//120
                        'company' => $not_have_balance ? '1' : '0',
                        'company_amount' => $not_have_balance ? $insert_amount - $total_original_amount : 0,//1080
                        'sub_id' => $sub->id,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
                    $total_confirm_amount -= $amount_to_confirm;
                    $total_original_amount -= $amount_to_confirm;
                }
            }
        }
        return $total_confirm_amount;
    }


}