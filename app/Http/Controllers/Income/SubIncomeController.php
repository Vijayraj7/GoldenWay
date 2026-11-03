<?php

namespace App\Http\Controllers\Income;

use App\Http\Controllers\Controller;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;

class SubIncomeController extends Controller
{
    /**
     * Calculate and distribute sub income (binary income) using cumulative weaker-side volume.
     * Completely removes the customer_sub_transactions method.
     *
     * @return string
     */
    public function subincome()
    {
        $now = Carbon::now('Asia/Kolkata');
        if ($now->hour < 22) {
            // return "too early";
        }

        // Ensure necessary database schema columns exist
        $this->ensureSchema();

        $admin_config = DB::table('admin_config')->first();
        if ($admin_config && $admin_config->last_binary) {
            $last_run = Carbon::parse($admin_config->last_binary, 'Asia/Kolkata');
            if ($last_run->addHours(24)->gt($now)) {
                return "too early, less than 24 hours since last run";
            }
        }

        // 1. Preload all customers with left and right children and their last_weaker_sub
        $allCustomers = DB::table('customers')->get(['id', 'left', 'right', 'last_weaker_sub']);
        $tree = [];
        $customersById = [];
        foreach ($allCustomers as $c) {
            $tree[$c->id] = [
                'left' => $c->left,
                'right' => $c->right,
            ];
            $customersById[$c->id] = $c;
        }

        // 2. Preload total subscription volume per customer from customer_subs
        $userSubs = DB::table('customer_subs')
            ->where('status', 'completed')
            ->select('csId', DB::raw('SUM(sub_amount) as total_sub'))
            ->groupBy('csId')
            ->pluck('total_sub', 'csId')
            ->toArray();

        // 3. Process each customer
        foreach ($allCustomers as $user) {
            if (empty($user->left) || empty($user->right)) {
                continue;
            }

            // Calculate total cumulative subscription volume for Left and Right subtrees
            $left_amount = $this->getSubtreeVolume($user->left, $tree, $userSubs);
            $right_amount = $this->getSubtreeVolume($user->right, $tree, $userSubs);

            // Determine the current weaker side total volume
            $current_weaker_amount = min($left_amount, $right_amount);
            if ($current_weaker_amount <= 0) {
                continue;
            }

            // Retrieve the stored last weaker side amount
            $last_weaker_amount = (float) ($user->last_weaker_sub ?? 0);

            // If last_weaker_sub is 0 for an existing user, initialize it from their past sub_income transactions
            if ($last_weaker_amount == 0) {
                $past_paid = (float) DB::table('customer_transactions')
                    ->where('csId', $user->id)
                    ->where('tType', 'sub_income')
                    ->sum('tAmount');
                if ($past_paid > 0) {
                    $last_weaker_amount = $past_paid * 10;
                    DB::table('customers')->where('id', $user->id)->update([
                        'last_weaker_sub' => $last_weaker_amount
                    ]);
                }
            }

            // Calculate new matchable volume on the weaker leg
            $matchable_amount = $current_weaker_amount - $last_weaker_amount;
            if ($matchable_amount <= 0) {
                continue;
            }

            // Check the user's 2x balance cap
            $bal2x = balance2x($user->id);

            // When user balance2x is reached (bal2x <= 0):
            // User cannot get sub_income without increasing their balance2x.
            // Update weaker side current total amount so they only get sub income for new volume after this point.
            if ($bal2x <= 0) {
                DB::table('customers')->where('id', $user->id)->update([
                    'last_weaker_sub' => $current_weaker_amount
                ]);
                continue;
            }

            // User has 2x capacity: 10% binary commission on matchable volume
            $txnamount = $matchable_amount / 10;
            if ($txnamount > $bal2x) {
                $txnamount = $bal2x;
            }

            if ($txnamount > 0) {
                DB::table('customer_transactions')->insert([
                    'tType' => 'sub_income',
                    'created_at' => Carbon::now('Asia/Kolkata')->setTime(18, 0, 0)->format('Y-m-d H:i:s'),
                    'csId' => $user->id,
                    'tAmount' => strval($txnamount),
                    'tStatus' => '1',
                    'wStatus' => '0',
                ]);
            }

            // Update stored weaker side total amount
            DB::table('customers')->where('id', $user->id)->update([
                'last_weaker_sub' => $current_weaker_amount
            ]);
        }

        // 4. Update admin_config.last_binary timestamp
        if ($admin_config) {
            $new_last_binary = null;
            if ($admin_config->last_binary) {
                $new_last_binary = Carbon::parse($admin_config->last_binary, 'Asia/Kolkata')->addHours(24);
                $new_last_binary->setTime(22, 0, 0);

                // Prevent runaway catching up if the cron missed multiple days
                $today_10pm = Carbon::now('Asia/Kolkata')->setTime(22, 0, 0);
                if ($new_last_binary->lt($today_10pm)) {
                    $new_last_binary = $today_10pm;
                }
            } else {
                $new_last_binary = Carbon::now('Asia/Kolkata')->setTime(22, 0, 0);
            }

            DB::table('admin_config')
                ->where('id', $admin_config->id)
                ->update([
                    'last_binary' => $new_last_binary
                ]);
        }

        return "yes";
    }

    /**
     * Alias for subincome() for backwards-compatibility.
     */
    public function binaryincome()
    {
        return $this->subincome();
    }

    /**
     * Compute total subscription volume of a subtree using in-memory BFS queue.
     *
     * @param int|string|null $startId
     * @param array $tree
     * @param array $userSubs
     * @return float
     */
    public function getSubtreeVolume($startId, array &$tree, array &$userSubs): float
    {
        if (empty($startId)) {
            return 0.0;
        }

        $total = 0.0;
        $queue = [$startId];
        $visited = [];

        while (!empty($queue)) {
            $currId = array_shift($queue);
            if (isset($visited[$currId])) {
                continue;
            }
            $visited[$currId] = true;

            if (isset($userSubs[$currId])) {
                $total += (float) $userSubs[$currId];
            }

            if (isset($tree[$currId])) {
                if (!empty($tree[$currId]['left'])) {
                    $queue[] = $tree[$currId]['left'];
                }
                if (!empty($tree[$currId]['right'])) {
                    $queue[] = $tree[$currId]['right'];
                }
            }
        }

        return $total;
    }

    /**
     * Ensure database columns exist.
     */
    private function ensureSchema(): void
    {
        if (!Schema::hasColumn('customers', 'last_weaker_sub')) {
            Schema::table('customers', function (Blueprint $table) {
                $table->decimal('last_weaker_sub', 18, 8)->default(0);
            });
        }

        if (!Schema::hasColumn('admin_config', 'last_binary')) {
            Schema::table('admin_config', function (Blueprint $table) {
                $table->timestamp('last_binary')->nullable();
            });
        }
    }
}
