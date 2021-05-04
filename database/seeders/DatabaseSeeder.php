<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\PlatformUser;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

      // $this->call(SettingSeeder::class);

      if (User::where('email','admin@hd-platform.ng')->first() == null){
        $platform_user1_id = DB::table('users')->insertGetId([
            'email' => 'admin@hd-platform.ng',
            'telephone' => '07063320222',
            'password' => Hash::make('password'),
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'last_loggedin_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
      }

      // $usr = User::where('email','admin@hd-platform.ng')->first();
      // if ($usr != null){
      //   $usr->assignRole('admin');

      //   $platformUser = PlatformUser::create(['job_title'=>'Admin']);
      //   $platformUser->user()->save($usr);
      // }

      $this->call(PermissionTableSeeder::class);
      $this->call(SpecialtySeeder::class);
      $this->call(BankSeeder::class);
      $this->call(OfferCategorySeeder::class);
      $this->call(ServiceOfferingSeeder::class);
      $this->call(ProductOfferingSeeder::class);

      $this->call(CustomerSeeder::class);
      $this->call(ProfessionalsSeeder::class);
      $this->call(PlatformUsersSeeder::class);
      $this->call(FacilitySeeder::class);
      $this->call(MessagingSeeder::class);
      $this->call(LedgerTableSeeder::class);


      $this->call(OffersInCategorySeeder::class);

    }
}
