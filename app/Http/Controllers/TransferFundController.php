<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\FcmController;
use Carbon\Carbon;

class TransferFundController extends Controller
{
    /**
     * Search customer name by UID instead of ID.
     */
    public function getcusname(Request $rqs)
    {
        $prs = json_decode(json_encode($rqs->input(), true), true);

        if (!isset($prs['csId'])) {
            return 'no user found';
        }

        $usr = DB::table('customers')->where('uid', trim($prs['csId']))->first();

        if ($usr) {
            return 'user found';
        }

        return 'no user found';
    }

    /**
     * Perform direct credit transfer between customers.
     */
    public function transferDirect(Request $rqs)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        if (!isset($_SESSION['id']) || !Auth::check()) {
            return redirect('/login');
        }

        $sender = DB::table('customers')->where('id', $_SESSION['id'])->first();
        if ($sender == null) {
            return redirect('/login');
        }

        $prs = json_decode(json_encode($rqs->input(), true), true);

        // Verify transaction password
        if (isset($prs['tpassword'])) {
            if (!Hash::check($prs['tpassword'], $sender->tpassword)) {
                return redirect()->back()->withInput($rqs->all())->withErrors([
                    'image' => 'Wrong transaction password',
                ]);
            }
        } else {
            return redirect()->back()->withInput($rqs->all())->withErrors([
                'image' => 'Transaction password is required',
            ]);
        }

        // Verify recipient UID
        if (!isset($prs['tuserid']) || empty(trim($prs['tuserid']))) {
            return redirect()->back()->withInput($rqs->all())->withErrors([
                'image' => 'Recipient User ID is required',
            ]);
        }

        $recipient = DB::table('customers')->where('uid', trim($prs['tuserid']))->first();
        if ($recipient == null) {
            return redirect()->back()->withInput($rqs->all())->withErrors([
                'image' => 'No User Found',
            ]);
        }

        if ($recipient->id == $sender->id) {
            return redirect()->back()->withInput($rqs->all())->withErrors([
                'image' => 'Cannot transfer to yourself',
            ]);
        }

        $amnt = (float) $prs['amount'];
        if ($amnt < 10.0) {
            return redirect()->back()->withInput($rqs->all())->withErrors([
                'image' => 'Min USDT is 10',
            ]);
        }

        $isAutoPoll = (isset($prs['trnfrc']) && $prs['trnfrc'] == '2');
        $feePercent = 0.10;
        $fee = $amnt * $feePercent;
        $total_deducted = $amnt + $fee;

        // Compute sender balance limits
        $maxmnt = 0;
        if ($isAutoPoll) {
            $total_poll_income = \Illuminate\Support\Facades\Schema::hasTable('customer_poll_transactions') ? (float) DB::table('customer_poll_transactions')->where('csId', $sender->id)->where('tType', 'pollincome')->where('tamount', '>', 0)->sum('tamount') : 0.0;
            $total_withdrawn_poll = DB::table('customer_withdraws')
                ->where('csId', $sender->id)
                ->where('pname', 'pollincome')
                ->whereIn('status', ['0', '1'])
                ->select(DB::raw('SUM(amount + fuel) as total'))
                ->first()->total ?? 0.0;
            $maxmnt = $total_poll_income - $total_withdrawn_poll;
            if ($maxmnt < 0) {
                $maxmnt = 0;
            }
        } else {
            $tAllincome = DB::table('customer_transactions')
                ->where('csId', $sender->id)
                ->get();
            $totBalance = $tAllincome->sum('tAmount');

            if (isset($prs['trnfrc']) && $prs['trnfrc'] == '1') {
                $maxmnt = DB::table('customer_transfers')->where('csId', $sender->id)->get()->sum('tAmount');
            } else {
                $maxmnt = $totBalance + DB::table('customer_transfers')->where('csId', $sender->id)->get()->sum('tAmount');
            }
        }

        if ($total_deducted > $maxmnt) {
            return redirect()->back()->withInput($rqs->all())->withErrors([
                'image' => 'No Enough Balance (including 10% admin fee)',
            ]);
        }

        // Ensure wthId column exists in customer_poll_transactions before starting transaction (DDL implicitly commits transaction in MySQL)
        if ($isAutoPoll && !\Illuminate\Support\Facades\Schema::hasColumn('customer_poll_transactions', 'wthId')) {
            \Illuminate\Support\Facades\Schema::table('customer_poll_transactions', function ($table) {
                $table->unsignedBigInteger('wthId')->nullable();
            });
        }

        DB::beginTransaction();
        try {
            $thisdate = date('Y-m-d H:i:s');

            // ── ONE shared transfer record ──────────────────────────────────
            // fuserid = sender, tuserid = recipient, tAmount = credit amount.
            // Both parties see this via their fuserid / tuserid columns.
            // csId is set to recipient so their transfer-wallet balance is aware.
            DB::table('customer_transfers')->insert([
                'csId' => $recipient->id,
                'tType' => 'transfer',
                'fuserid' => $sender->id,
                'tuserid' => $recipient->id,
                'tAmount' => strval($amnt),
                'fee' => $isAutoPoll ? strval($fee) : null,
                'tStatus' => '1',
                'wStatus' => '0',
                'created_at' => $thisdate,
                'updated_at' => $thisdate,
            ]);

            if ($isAutoPoll) {
                // Insert a completed withdraw record for pollincome
                $wthId = DB::table('customer_withdraws')->insertGetId([
                    'csId' => $sender->id,
                    'pname' => 'pollincome',
                    'amount' => strval($amnt),
                    'fuel' => strval($fee),
                    'type' => '1',
                    'status' => '1', // completed immediately
                    'msg' => $prs['msg'] ?? ('Auto Poll Transfer to User ' . $recipient->uid),
                    'created_at' => $thisdate,
                    'updated_at' => $thisdate,
                ]);

                // Insert negative record in customer_poll_transactions
                DB::table('customer_poll_transactions')->insert([
                    'wthId' => $wthId,
                    'csId' => $sender->id,
                    'tamount' => strval(-$total_deducted),
                    'tStatus' => '1',
                    'wStatus' => '1',
                    'tType' => 'pollincome',
                    'created_at' => $thisdate,
                    'updated_at' => $thisdate,
                ]);
            } else {
                // ── Deduct total_deducted (amount + fee) from sender's balance ──
                // First drain transfer wallet, then spill into transactions wallet.
                $twalletAmnt = DB::table('customer_transfers')
                    ->where('csId', $sender->id)
                    ->where('tStatus', '1')
                    ->get()
                    ->sum('tAmount');

                if ($total_deducted <= $twalletAmnt) {
                    // Enough in transfer wallet – deduct all from there
                    DB::table('customer_transfers')->insert([
                        'csId' => $sender->id,
                        'tType' => 'transfer_fee',
                        'fuserid' => $sender->id,
                        'tuserid' => $sender->id,
                        'tAmount' => strval(-$total_deducted),
                        'fee' => strval($fee),
                        'tStatus' => '1',
                        'wStatus' => '1',
                        'created_at' => $thisdate,
                        'updated_at' => $thisdate,
                    ]);
                } else {
                    // Drain transfer wallet first
                    if ($twalletAmnt > 0) {
                        DB::table('customer_transfers')->insert([
                            'csId' => $sender->id,
                            'tType' => 'transfer_fee',
                            'fuserid' => $sender->id,
                            'tuserid' => $sender->id,
                            'tAmount' => strval(-$twalletAmnt),
                            'fee' => strval($fee),
                            'tStatus' => '1',
                            'wStatus' => '1',
                            'created_at' => $thisdate,
                            'updated_at' => $thisdate,
                        ]);
                    }
                    // Remainder from transactions wallet
                    $remainder = $total_deducted - $twalletAmnt;
                    DB::table('customer_transactions')->insert([
                        'csId' => $sender->id,
                        'tType' => 'transfer',
                        'tAmount' => strval(-$remainder),
                        'tStatus' => '1',
                        'wStatus' => '1',
                        'created_at' => $thisdate,
                        'updated_at' => $thisdate,
                    ]);
                }
            }

            DB::commit();

            // Notify both parties
            try {
                $fcad = new FcmController;
                $fcad->sendFCMMessageToTopic('c_' . $sender->id, "Transfer Successful", "Directly transferred " . $amnt . " USDT to User " . $recipient->uid);
                $fcad->sendFCMMessageToTopic('c_' . $recipient->id, "Transfer Received", "Received " . $amnt . " USDT from User " . $sender->uid);
            } catch (\Exception $e) {
                // ignore notification errors to ensure transaction goes through
            }

            return redirect()->back()->withErrors([
                'success' => "Successfully transferred " . $amnt . " USDT directly to " . $recipient->uid,
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput($rqs->all())->withErrors([
                'image' => 'Transfer failed: ' . $e->getMessage(),
            ]);
        }
    }

    /**
     * Perform free credit transfer (admin only).
     */
    public function transferFree(Request $rqs)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        if (!isset($_SESSION['id']) || !Auth::check()) {
            return redirect('/login');
        }

        // Verify admin
        if (!isAdmin()) {
            abort(404);
        }

        $sender = DB::table('customers')->where('id', $_SESSION['id'])->first();
        if ($sender == null) {
            return redirect('/login');
        }

        $prs = json_decode(json_encode($rqs->input(), true), true);

        // Verify transaction password
        if (isset($prs['tpassword'])) {
            if (!Hash::check($prs['tpassword'], $sender->tpassword)) {
                return redirect()->back()->withInput($rqs->all())->withErrors([
                    'image' => 'Wrong transaction password',
                ]);
            }
        } else {
            return redirect()->back()->withInput($rqs->all())->withErrors([
                'image' => 'Transaction password is required',
            ]);
        }

        // Verify recipient UID
        if (!isset($prs['tuserid']) || empty(trim($prs['tuserid']))) {
            return redirect()->back()->withInput($rqs->all())->withErrors([
                'image' => 'Recipient User ID is required',
            ]);
        }

        $recipient = DB::table('customers')->where('uid', trim($prs['tuserid']))->first();
        if ($recipient == null) {
            return redirect()->back()->withInput($rqs->all())->withErrors([
                'image' => 'No User Found',
            ]);
        }

        $amnt = (float) $prs['amount'];
        if ($amnt <= 0) {
            return redirect()->back()->withInput($rqs->all())->withErrors([
                'image' => 'Amount must be greater than 0',
            ]);
        }

        DB::beginTransaction();
        try {
            $thisdate = date('Y-m-d H:i:s');

            // Credit the recipient's transfers balance ONLY
            DB::table('customer_transfers')->insert([
                'csId' => $recipient->id,
                'tType' => 'transfer',
                // 'fuserid' => $sender->id,
                'tuserid' => $recipient->id,
                'tAmount' => strval($amnt),
                'tStatus' => '1',
                'wStatus' => '0',
                'created_at' => $thisdate,
                'updated_at' => $thisdate,
            ]);

            DB::commit();

            // Notify recipient
            try {
                $fcad = new FcmController;
                $fcad->sendFCMMessageToTopic('c_' . $recipient->id, "Transfer Received", "Received " . $amnt . " USDT from Admin");
            } catch (\Exception $e) {
                // ignore notification errors
            }

            return redirect()->back()->withErrors([
                'success' => "Successfully transferred " . $amnt . " USDT directly to " . $recipient->uid . " without deducting from balance",
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput($rqs->all())->withErrors([
                'image' => 'Transfer failed: ' . $e->getMessage(),
            ]);
        }
    }
}
