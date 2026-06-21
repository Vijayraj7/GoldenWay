<?php

namespace Tests\Feature;

use Tests\TestCase;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Http\Controllers\Income\StakeIncomeController;

class StakeIncomeTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Create temporary tables in SQLite memory DB
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->timestamps();
        });

        Schema::create('customer_plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('csId');
            $table->decimal('pamount', 15, 2);
            $table->timestamps();
        });

        Schema::create('customer_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('csId');
            $table->string('tType');
            $table->string('tAmount'); // string type matching strval()
            $table->string('tStatus')->default('1');
            $table->string('wStatus')->default('0');
            $table->timestamps();
        });
    }

    protected function tearDown(): void
    {
        Schema::dropIfExists('customers');
        Schema::dropIfExists('customer_plans');
        Schema::dropIfExists('customer_transactions');
        parent::tearDown();
    }

    public function test_no_stake_income_inserted_on_saturday_and_sunday()
    {
        $customerId = DB::table('customers')->insertGetId([
            'email' => 'test@example.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('customer_plans')->insert([
            'csId' => $customerId,
            'pamount' => 1000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 1. Saturday check
        Carbon::setTestNow(Carbon::parse('2026-06-20 12:00:00')); // Saturday
        $controller = new StakeIncomeController();
        $result = $controller->stakeincome();

        $this->assertEquals("stake", $result);
        $this->assertEquals(0, DB::table('customer_transactions')->count());

        // 2. Sunday check
        Carbon::setTestNow(Carbon::parse('2026-06-21 12:00:00')); // Sunday
        $result = $controller->stakeincome();
        $this->assertEquals("stake", $result);
        $this->assertEquals(0, DB::table('customer_transactions')->count());

        Carbon::setTestNow();
    }

    public function test_inserts_stake_income_on_monday_shifting_from_friday()
    {
        $customerId = DB::table('customers')->insertGetId([
            'email' => 'test@example.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('customer_plans')->insert([
            'csId' => $customerId,
            'pamount' => 1000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert last transaction on Friday 12:00 PM
        DB::table('customer_transactions')->insert([
            'tType' => 'stake_income',
            'created_at' => '2026-06-19 12:00:00', // Friday
            'csId' => $customerId,
            'tAmount' => '5.00',
            'tStatus' => '1',
            'wStatus' => '0',
        ]);

        // Run the script on Monday at 12:00 PM
        Carbon::setTestNow(Carbon::parse('2026-06-22 12:00:00')); // Monday

        $controller = new StakeIncomeController();
        $controller->stakeincome();

        // Check if a new transaction was inserted
        $transactions = DB::table('customer_transactions')
            ->where('csId', $customerId)
            ->get();

        $this->assertCount(2, $transactions);
        
        // The new transaction should be dated Monday 12:00 PM
        $newTransaction = $transactions->sortBy('created_at')->last();
        $this->assertEquals('2026-06-22 12:00:00', $newTransaction->created_at);

        Carbon::setTestNow();
    }

    public function test_inserts_stake_income_capping_to_current_time_on_early_monday_run()
    {
        $customerId = DB::table('customers')->insertGetId([
            'email' => 'test@example.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('customer_plans')->insert([
            'csId' => $customerId,
            'pamount' => 1000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert last transaction on Friday 12:00 PM
        DB::table('customer_transactions')->insert([
            'tType' => 'stake_income',
            'created_at' => '2026-06-19 12:00:00', // Friday
            'csId' => $customerId,
            'tAmount' => '5.00',
            'tStatus' => '1',
            'wStatus' => '0',
        ]);

        // Run the script on Monday at 10:00 AM (earlier than Friday's 12:00 PM)
        Carbon::setTestNow(Carbon::parse('2026-06-22 10:00:00')); // Monday 10:00 AM

        $controller = new StakeIncomeController();
        $controller->stakeincome();

        // Check if a new transaction was inserted
        $transactions = DB::table('customer_transactions')
            ->where('csId', $customerId)
            ->get();

        $this->assertCount(2, $transactions);
        
        // The new transaction should be capped to Monday 10:00 AM
        $newTransaction = $transactions->sortBy('created_at')->last();
        $this->assertEquals('2026-06-22 10:00:00', $newTransaction->created_at);

        Carbon::setTestNow();
    }
}
