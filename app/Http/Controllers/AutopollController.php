<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Http\Controllers\HelperController;

class AutopollController extends Controller
{
    public function autopoll(Request $rqs)
    {
        $h = new HelperController;
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        if (!isset($_SESSION['id'])) {
            return redirect('/login');
        }

        $customer = DB::table('customers')->where('id', $_SESSION['id'])->first();
        if ($customer == null) {
            return redirect('/login');
        }

        $amount = (float) $rqs->input('amount', 0);
        if ($amount < 10 || fmod($amount, 10) !== 0.0) {
            return redirect()->back()->withInput($rqs->all())->withErrors([
                'poll_error' => 'Amount must be a multiple of 10 and at least 10 USDT.',
            ]);
        }

        if (!$rqs->filled('tpassword') || !Hash::check($rqs->input('tpassword'), $customer->tpassword)) {
            return redirect()->back()->withInput($rqs->all())->withErrors([
                'poll_error' => 'Wrong transaction password.',
            ]);
        }

        $hasSub = false;
        if (Schema::hasTable('customer_subs')) {
            $sub_sum = DB::table('customer_subs')
                ->where('csId', $customer->id)
                ->sum('sub_amount');
            if ($sub_sum > 0) {
                $hasSub = true;
            }
        }
        if (!$hasSub) {
            return redirect()->back()->withInput($rqs->all())->withErrors([
                'poll_error' => 'You must have an active subscription to purchase Auto Poll.',
            ]);
        }

        $wallet_balance = (float) $rqs->input('wallet_balance', 0);
        $wlt_amount = min($amount, $wallet_balance);
        $credit_paid = $amount - $wlt_amount;

        if (isSubDomainAdmin()) {
            if (!Schema::hasTable('customer_autopolls')) {
                Schema::create('customer_autopolls', function (Blueprint $table) {
                    $table->id();
                    $table->unsignedBigInteger('csId');
                    $table->decimal('poll_amount', 18, 8)->default(0);
                    $table->string('txid')->nullable();
                    $table->longText('receipt')->nullable();
                    $table->string('status')->default('completed');
                    $table->timestamps();
                });
            }

            $pollId = DB::table('customer_autopolls')->insertGetId([
                'csId' => $customer->id,
                'poll_amount' => $amount,
                'txid' => null,
                'receipt' => null,
                'status' => 'completed',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            $this->distributeAutopoll($customer->id, $amount, $pollId);

            $input = [
                'reciept' => null,
                'txid' => null,
                'wlt_amount' => strval($amount),
                'coin_type' => 'usdt',
                'pname' => 'autopoll',
                'pamount' => strval($amount),
                'csId' => strval($customer->id),
            ];

            return redirect('/dashboard')->withInput($input)->withErrors([
                'walletsuccess' => 'walletsuccess',
                'type' => 'autopoll',
            ]);
        }

        if ($credit_paid > 0) {
            $transferCreditBalance = DB::table('customer_transfers')
                ->where('csId', $customer->id)
                ->where('tStatus', '1')
                ->get()
                ->sum('tAmount');
            if ($credit_paid > $transferCreditBalance + 0.01) {
                return redirect()->back()->withInput($rqs->all())->withErrors([
                    'poll_error' => 'Insufficient Transfer Credit balance.',
                ]);
            }
        }

        $admin_config = DB::table('admin_config')->first();
        $prs = [
            'pname' => 'autopoll',
            'pamount' => strval($amount),
            'wlt_amount' => strval($wlt_amount),
            'credit_paid' => strval($credit_paid),
            'msg' => 'Auto Poll purchase',
            'csId' => strval($customer->id),
        ];

        return $h->getboth('dashboard.dcards.wallet', [
            'admin_config' => $admin_config,
            'snd' => null,
            'prs' => $prs,
            'route' => '/successautopoll',
            'reciever' => $admin_config ? decStr($admin_config->admin_wallet) : null,
            'amount' => $wlt_amount,
            'remark' => 'Auto Poll purchase',
        ]);
    }

    public function successautopoll(Request $rqs)
    {
        $prs = json_decode(json_encode($rqs->input(), true), true);
        if ($prs['reciept'] != null) {
            // Deduct transfer credit now that the blockchain tx is confirmed
            if (isset($prs['credit_paid']) && (float) $prs['credit_paid'] > 0) {
                DB::table('customer_transfers')->insert([
                    'csId'       => $prs['csId'],
                    'tType'      => 'autopoll',
                    'tAmount'    => strval(-(float) $prs['credit_paid']),
                    'tStatus'    => '1',
                    'wStatus'    => '1',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }

            if (!Schema::hasTable('customer_autopolls')) {
                Schema::create('customer_autopolls', function (Blueprint $table) {
                    $table->id();
                    $table->unsignedBigInteger('csId');
                    $table->decimal('poll_amount', 18, 8)->default(0);
                    $table->string('txid')->nullable();
                    $table->longText('receipt')->nullable();
                    $table->string('status')->default('completed');
                    $table->timestamps();
                });
            }

            $pollId = DB::table('customer_autopolls')->insertGetId([
                'csId' => $prs['csId'],
                'poll_amount' => $prs['pamount'],
                'txid' => $prs['txid'],
                'receipt' => $prs['reciept'],
                'status' => 'completed',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            $this->distributeAutopoll($prs['csId'], (float) $prs['pamount'], $pollId);
        }
        return redirect('/dashboard')->withInput($rqs->all())->withErrors([
            'walletsuccess' => 'walletsuccess',
        ]);
    }

    public function history()
    {
        $h = new HelperController;
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (!isset($_SESSION['id'])) {
            return redirect('/login');
        }

        // Fetch user's autopoll purchases
        $autopolls = DB::table('customer_autopolls')
            ->where('csId', $_SESSION['id'])
            ->orderBy('created_at', 'desc')
            ->get();

        // Fetch user's autopoll income transactions
        // Join with customers to show who triggered the distribution
        $incomeTransactions = DB::table('customer_poll_transactions as pt')
            ->leftJoin('customers as c', 'pt.fcsId', '=', 'c.id')
            ->select('pt.*', 'c.name as from_customer_name')
            ->where('pt.csId', $_SESSION['id'])
            ->orderBy('pt.created_at', 'desc')
            ->get();

        return $h->getboth('dashboard.vendor.autopollhistory', [
            'autopolls' => $autopolls,
            'incomeTransactions' => $incomeTransactions
        ]);
    }

    private function distributeAutopoll($csId, $amount, $pollId = null)
    {
        $pool = (float) $amount * 0.50;
        if ($pool <= 0) {
            return;
        }

        // Get all other customers who have completed auto poll sum > 0
        $recipients = DB::table('customer_autopolls')
            ->select('csId', DB::raw('SUM(poll_amount) as total_poll'))
            // ->where('csId', '!=', $csId)
            ->where('status', 'completed')
            ->groupBy('csId')
            ->get();

        $eligibleRecipients = [];
        foreach ($recipients as $recipient) {
            $totalPoll = (float) $recipient->total_poll;
            if ($totalPoll > 0) {
                $eligibleRecipients[] = [
                    'csId' => $recipient->csId,
                    'total_poll' => $totalPoll
                ];
            }
        }

        $count = count($eligibleRecipients);
        if ($count === 0) {
            return;
        }

        $share = $pool / $count;

        // Ensure customer_poll_transactions table exists with eligible_count and poll_id
        if (!Schema::hasTable('customer_poll_transactions')) {
            Schema::create('customer_poll_transactions', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('csId');
                $table->unsignedBigInteger('fcsId')->nullable();
                $table->decimal('tamount', 18, 8)->default(0);
                $table->string('tStatus')->default('1');
                $table->string('wStatus')->default('0');
                $table->string('tType')->default('pollincome');
                $table->integer('eligible_count')->default(0);
                $table->unsignedBigInteger('poll_id')->nullable();
                $table->timestamps();
            });
        } else {
            if (!Schema::hasColumn('customer_poll_transactions', 'eligible_count')) {
                Schema::table('customer_poll_transactions', function (Blueprint $table) {
                    $table->integer('eligible_count')->default(0);
                });
            }
            if (!Schema::hasColumn('customer_poll_transactions', 'poll_id')) {
                Schema::table('customer_poll_transactions', function (Blueprint $table) {
                    $table->unsignedBigInteger('poll_id')->nullable();
                });
            }
        }

        foreach ($eligibleRecipients as $recipient) {
            $recipientId = $recipient['csId'];
            $totalPollSum = $recipient['total_poll'];

            $maxIncomeLimit = $totalPollSum * 3.0;

            // Calculate total pollincome received so far (gross)
            $currentPollIncome = (float) DB::table('customer_poll_transactions')
                ->where('csId', $recipientId)
                ->where('tType', 'pollincome')
                ->where('wStatus', '0')
                ->where('tamount', '>', 0)
                ->sum('tamount');

            $headroom = $maxIncomeLimit - $currentPollIncome;

            if ($headroom > 0) {
                $actualAward = min($share, $headroom);
                if ($actualAward > 0) {
                    DB::table('customer_poll_transactions')->insert([
                        'csId' => $recipientId,
                        'fcsId' => $csId,
                        'tamount' => $actualAward,
                        'tStatus' => '1',
                        'wStatus' => '0',
                        'tType' => 'pollincome',
                        'eligible_count' => $count,
                        'poll_id' => $pollId,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
                }
            }
        }
    }
}
