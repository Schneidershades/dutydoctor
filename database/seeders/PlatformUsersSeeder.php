<?php

use Carbon\Carbon;
use App\Models\User;
use App\Models\PlatformUser;

use Illuminate\Database\Seeder;

class PlatformUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if (User::where('email','customer-officer@hd-platform.ng')->first() == null){
          $platform_user1_id = DB::table('users')->insertGetId([
              'email' => 'customer-officer@hd-platform.ng',
              'telephone' => '07033320222',
              'password' => Hash::make('password'),
              'first_name' => 'Cust',
              'last_name' => 'Officer',
              'last_loggedin_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
          ]);
        }
  
        $usr = User::where('email','customer-officer@hd-platform.ng')->first();
        if ($usr != null){
          $usr->assignRole('customer-officer');
  
          $platformUser = PlatformUser::create(['job_title'=>'Customer Officer']);
          $platformUser->user()->save($usr);
        }


        if (User::where('email','professional-officer@hd-platform.ng')->first() == null){
            $platform_user1_id = DB::table('users')->insertGetId([
                'email' => 'professional-officer@hd-platform.ng',
                'telephone' => '07083320222',
                'password' => Hash::make('password'),
                'first_name' => 'Pro',
                'last_name' => 'Officer',
                'last_loggedin_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
          }
    
          $usr = User::where('email','professional-officer@hd-platform.ng')->first();
          if ($usr != null){
            $usr->assignRole('professional-officer');
    
            $platformUser = PlatformUser::create(['job_title'=>'Professional Officer']);
            $platformUser->user()->save($usr);
          }


          if (User::where('email','product-officer@hd-platform.ng')->first() == null){
            $platform_user1_id = DB::table('users')->insertGetId([
                'email' => 'product-officer@hd-platform.ng',
                'telephone' => '07073320222',
                'password' => Hash::make('password'),
                'first_name' => 'Prod',
                'last_name' => 'Officer',
                'last_loggedin_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
          }
    
          $usr = User::where('email','product-officer@hd-platform.ng')->first();
          if ($usr != null){
            $usr->assignRole('product-officer');
    
            $platformUser = PlatformUser::create(['job_title'=>'Product Officer']);
            $platformUser->user()->save($usr);
          }


          if (User::where('email','service-officer@hd-platform.ng')->first() == null){
            $platform_user1_id = DB::table('users')->insertGetId([
                'email' => 'service-officer@hd-platform.ng',
                'telephone' => '07123320222',
                'password' => Hash::make('password'),
                'first_name' => 'Prod',
                'last_name' => 'Officer',
                'last_loggedin_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
          }
    
          $usr = User::where('email','service-officer@hd-platform.ng')->first();
          if ($usr != null){
            $usr->assignRole('service-officer');
    
            $platformUser = PlatformUser::create(['job_title'=>'Service Officer']);
            $platformUser->user()->save($usr);
          }
          

    }
}
