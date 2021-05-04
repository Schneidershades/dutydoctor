<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class LedgerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $ledger_entry2 = DB::table('ledgers')->insertGetId([
            'money_to' => 'source',
            'money_from' => 'customer - customer2@lender.ng',
            'reason' => "Wallet funding",
            'credit' => 10000.00,
            'debit' => 0,
            'current_balance' => 10000.00,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        $ledger_entry1 = DB::table('ledgers')->insertGetId([
            'money_from' => 'source',
            'money_to' => 'customer - customer2@lender.ng',
            'reason' => "Payment disbursement",
            'debit' => 8500.00,
            'credit' => 0,
            'current_balance' => 1500,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        $ledger_entry3 = DB::table('ledgers')->insertGetId([
            'money_to' => 'paystack',
            'money_from' => 'source',
            'reason' => "SMS Sending Charge",
            'credit' => 0,
            'debit' => 2.50,
            'current_balance' => 1490.00,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

    }
}
