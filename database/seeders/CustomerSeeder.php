<?php


use Carbon\Carbon;
use App\Models\User;
use App\Models\Customer;

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $customer_id1 = DB::table('users')->insertGetId([
            'email' => 'customer@hdp.ng',
            'password' => Hash::make('1234'),
            'telephone' => '08186707122',
            'first_name' => 'Onyinye',
            'last_name' => 'Carter',
            'middle_name' => 'S',
            'gender' => 'female',
            'location_address_city' => 'Abuja',
            'location_address_state' => 'FCT',
            'bank_name' => 'GTB',
            'bank_account_name' => 'Carter, Stella',
            'bank_account_number' => '0006535262',
            'paystack_bank_code' => '058',
            'is_bank_account_verified' => true,
            'bank_account_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'paystack_bank_account_verification_details' => '{
                "status": true,
                "message": "Account number resolved",
                "data": {
                  "account_number": "0006535262",
                  "account_name": "Carter, Stella"
                }
              }',
            'paystack_recipient_code' => 'RCP_vcyjkji5w1rppqc',
            'paystack_recipient_details' => '{
                "status": true,
                "message": "Transfer recipient created successfully",
                "data": {
                  "active": true,
                  "createdAt": "2019-04-15T14:16:55.000Z",
                  "currency": "NGN",
                  "description": "Loan Disbursement",
                  "domain": "test",
                  "email": null,
                  "id": 1507598,
                  "integration": 129014,
                  "metadata": null,
                  "name": "Carter, Stella",
                  "recipient_code": "RCP_vcyjkji5w1rppqc",
                  "type": "nuban",
                  "updatedAt": "2019-04-15T14:18:48.000Z",
                  "is_deleted": false,
                  "details": {
                    "authorization_code": null,
                    "account_number": "0006535262",
                    "account_name": null,
                    "bank_code": "058",
                    "bank_name": "Guaranty Trust Bank"
                  }
                }
              }',
            'gps_city' => 'Lagos',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        $usr = User::where('email','customer@hdp.ng')->first();
        if ($usr != null){
          $customerUser = Customer::create([
            'public_code'=>'CC'.time(),
            'account_balance'=>10000.00,
          ]);
          $customerUser->user()->save($usr);
        }

    }


}
