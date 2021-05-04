<?php


use Carbon\Carbon;
use App\Models\Specialty;
use Illuminate\Database\Seeder;

class ServiceOfferingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_offerings')->insertGetId([
            'offer_name' => 'Home Care Physiotherapist',
            'description' => 'Providing physiotherapy services at customer premises.',
            'delivery_mode' => 'offsite',
            'unit_of_measure' => 'hours',
            'specialty_id' => Specialty::where('short_name','Orthopaedics')->first()->id,
            'profile_image' => null,
            'default_price_markup_pct'=>0,

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('service_offerings')->insertGetId([
            'offer_name' => 'Consultation',
            'description' => 'Consultation on general health at hospital.',
            'delivery_mode' => 'onsite',
            'unit_of_measure' => 'lot',
            'specialty_id' => Specialty::where('short_name','General Practice')->first()->id,
            'profile_image' => null,
            'default_price_markup_pct'=>0,

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('service_offerings')->insertGetId([
            'offer_name' => 'Home Care Consultation',
            'description' => 'Consultation on general health at customer premises.',
            'delivery_mode' => 'offsite',
            'unit_of_measure' => 'hours',
            'specialty_id' => Specialty::where('short_name','General Practice')->first()->id,
            'profile_image' => null,
            'default_price_markup_pct'=>0,

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('service_offerings')->insertGetId([
            'offer_name' => 'Urology Consultation',
            'description' => 'Consultation on Urology (Erectile Dysfunction) at customer premises.',
            'delivery_mode' => 'offsite',
            'unit_of_measure' => 'hours',
            'specialty_id' => Specialty::where('short_name','Urology')->first()->id,
            'profile_image' => null,
            'default_price_markup_pct'=>0,

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);


    }
}
