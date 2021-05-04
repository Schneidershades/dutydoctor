<?php

use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $banks = [
        'acs'=>'Access Bank',
        'cit'=>'Citibank',
        'dbl'=>'Diamond Bank',
        'eco'=>'Ecobank',
        'fid'=>'Fidelity Bank',
        'fbn'=>'First Bank of Nigeria (FBN)',
        'fcmb'=>'First City Monument Bank (FCMB)',
        'fsdh'=>'FSDH Merchant Bank',
        'gtb'=>'Guaranty Trust Bank (GTB)',
        'htb'=>'Heritage Bank',
        'kyb'=>'Keystone Bank',
        'skb'=>'Skye Bank',
        'sib'=>'Stanbic IBTC Bank',
        'scb'=>'Standard Chartered Bank',
        'stb'=>'Sterling Bank',
        'sun'=>'Suntrust Bank',
        'unb'=>'Union Bank',
        'uba'=>'United Bank for Africa (UBA)',
        'utb'=>'Unity Bank',
        'wmb'=>'Wema Bank',
        'znb'=>'Zenith Bank'
      ];

      foreach($banks as $key=>$value){
        DB::table('banks')->insert([
          'key' => $key,
          'value' => $value,
          'paystack_bank_code'=>( $key=='acs' ? '044' : '00'),
          'created_at' => '2017-06-05 00:00:00.0',
          'updated_at' => '2017-06-10 00:00:00.0'
        ]);
      }
    }


    
}
