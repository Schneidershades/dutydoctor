<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Facility;
use App\Models\FacilityUser;
use App\Models\FacilityLocation;

use App\Models\Specialty;
use App\Models\ProductOffering;
use App\Models\ServiceOffering;
use App\Models\Professional;

class FacilitySeeder extends Seeder
{

    public function run()
    {
        $cedarCrestFacility = Facility::where('short_name','Cedarcrest')->first();
        if ($cedarCrestFacility == null){
            $facility1_id = DB::table('facilities')->insertGetId([
                'public_code' => 'SP'.time(),
                'telephone' => '07063320222',
                'website' => 'https://www.cedarcresthospitals.com/',
                'primary_email' => 'manager@cedarcrest.ng',
                'primary_telephone' => '07061120222',
                'full_name' => 'Cedarcrest Hospitals Limited',
                'short_name' => 'Cedarcrest',
                'profile_description' => 'Cedarcrest Hospitals is a modern specialist medical care center located in the heart of Abuja, Nigeria.With an aim to provide high standard healthcare services.',
                'year_established' => 1995,

                'account_balance' => 15000.00,
                'bank_name' => 'GTB',
                'bank_account_name' => 'Cedarcrest Hospitals Ltd.',
                'bank_account_number' => '1116535111',
                'is_bank_account_verified' => false,

                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
            $cedarCrestFacility = Facility::find($facility1_id);

            $facility_location1_id = DB::table('facility_locations')->insertGetId([
                'location_name' => 'Abuja Apo',
                'facility_id' => $facility1_id,

                'location_address_house_number' => '1',
                'location_address_street_name' => 'Sam Mbakwe Street',
                'location_address_suburb' => 'Apo',
                'location_address_city' => 'Abuja',
                'location_address_state' => 'FCT',

                'gps_long' => '7.4858146',
                'gps_lat' => '8.992529',
                'gps_city' => 'Abuja',
                'gps_state' => 'FCT',

                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            $facility_location1_id = DB::table('facility_locations')->insertGetId([
                'location_name' => 'Lagos Victoria Island',
                'facility_id' => $facility1_id,

                'location_address_house_number' => '25A',
                'location_address_street_name' => 'Kofo Abayomi Street',
                'location_address_suburb' => 'Victoria Island',
                'location_address_city' => 'Lagos',
                'location_address_state' => 'Lagos',

                'gps_long' => '3.4182389',
                'gps_lat' => '6.4356878',
                'gps_city' => 'Victoria Island',
                'gps_state' => 'Lagos',

                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

        }
    

        if (User::where('email','manager@cedarcrest.ng')->first()==null){
            $facilityUser_id1 = DB::table('users')->insertGetId([
                'email' => 'manager@cedarcrest.ng',
                'password' => Hash::make('password'),
                'telephone' => '08086707122',
                'first_name' => 'Manager',
                'last_name' => 'CedarCrest',
                'middle_name' => '',
                'gender' => 'male',
                'location_address_city' => 'Abuja',
                'location_address_state' => 'FCT',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }

        $usr = User::where('email','manager@cedarcrest.ng')->first();
        if ($usr != null){
            $facilityUser = FacilityUser::create([
            'public_code'=>'FU1'.time(),
            'facility_id'=>$cedarCrestFacility->id,
            ]);
            $facilityUser->user()->save($usr);
        }


        if (User::where('email','scheduler@cedarcrest.ng')->first()==null){
            $facilityUser_id1 = DB::table('users')->insertGetId([
                'email' => 'scheduler@cedarcrest.ng',
                'password' => Hash::make('password'),
                'telephone' => '08086707122',
                'first_name' => 'Scheduler',
                'last_name' => 'CedarCrest',
                'middle_name' => '',
                'gender' => 'male',
                'location_address_city' => 'Abuja',
                'location_address_state' => 'FCT',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }

        $usr = User::where('email','scheduler@cedarcrest.ng')->first();
        if ($usr != null){
            $facilityUser = FacilityUser::create([
            'public_code'=>'FU2'.time(),
            'facility_id'=>$cedarCrestFacility->id,
            ]);
            $facilityUser->user()->save($usr);
        }
        

        //**************************************************************/
        //Seed Accreditation
        $spec = Specialty::where('short_name','General Practice')->first();
        $accreditationId = DB::table('accreditations')->insertGetId([
            'facility_id' => $cedarCrestFacility->id,
            'specialty_id' => $spec->id,
            'short_name' => $spec->short_name,
            'accreditation_number' => 'NMA-88552345',
            'accreditation_body' => $spec->accreditation_body,
            'issue_date' => Carbon::now()->addDays(-100)->format('Y-m-d H:i:s'),
            'expire_date' => Carbon::now()->addDays(100)->format('Y-m-d H:i:s'),
            'is_verified' => false,
            'verification_status' => 'not-verified',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        //Seed Accreditation Verification Task
        $work_item_id = DB::table('work_items')->insertGetId([
            'facility_id' => $cedarCrestFacility->id,
            'specialty_accreditation_id' => $accreditationId,
            'work_item_type' => 'accreditation-verification',
            'status' => 'new',
            'title' => 'Verification of Professional Accreditation',
            'description' => 'Review professional details, verify accreditation with relevant accrediting body.',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        //Assign the task to Professionals Officer
        $primaryAdminEmail = 'admin@hd-platform.ng';
        $assignedUserEmail = 'professional-officer@hd-platform.ng';

        $primaryUser = User::where('email',$primaryAdminEmail)->first();
        $assignedUser = User::where('email',$assignedUserEmail)->first();

        if ($primaryUser!=null && $assignedUser!=null){
            $work_item_assignment_id = DB::table('work_item_assignments')->insertGetId([
                'assigner_user_id' => $primaryUser->id,
                'assigned_user_id' => $assignedUser->id,
                'work_item_id' => $work_item_id,
                'status' => 'assigned',
                'is_accepted' => true,
                'is_current' => true,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }

        //**************************************************************/
        //Seed Facility Service Offering
        $service_id = DB::table('facility_service_offerings')->insertGetId([
            'facility_id' => $cedarCrestFacility->id,
            'service_offering_id' => ServiceOffering::where('offer_name','Consultation')->first()->id,
            'offer_name' => 'Consultation',
            'description' => 'Consultation on general health at hospital.',
            'delivery_mode' => 'onsite',
            'offer_unit_price' => 5000.00,
            'unit_of_measure' => 'lot',
            'profile_image' => null,
            'default_price_markup_pct'=>0,

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        //Seed Service Offering Verification Task
        $work_item_id = DB::table('work_items')->insertGetId([
            'facility_id' => $cedarCrestFacility->id,
            'facility_service_id' => $service_id,
            'work_item_type' => 'service-offering-verification',
            'status' => 'new',
            'title' => 'Verification of Service Offering',
            'description' => 'Review service offer details, verify price, etc.',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        //Assign the task to Professionals Officer
        $primaryAdminEmail = 'admin@hd-platform.ng';
        $assignedUserEmail = 'professional-officer@hd-platform.ng';


        $primaryUser = User::where('email',$primaryAdminEmail)->first();
        $assignedUser = User::where('email',$assignedUserEmail)->first();

        if ($primaryUser!=null && $assignedUser!=null){
            $work_item_assignment_id = DB::table('work_item_assignments')->insertGetId([
                'assigner_user_id' => $primaryUser->id,
                'assigned_user_id' => $assignedUser->id,
                'work_item_id' => $work_item_id,
                'status' => 'assigned',
                'is_accepted' => true,
                'is_current' => true,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }


        //**************************************************************/
        //Seed Facility Product Offering
        $product_id = DB::table('facility_product_offerings')->insertGetId([
            'facility_id' => $cedarCrestFacility->id,
            'product_offering_id' => ProductOffering::where('product_name','Ibuprofen Tablets')->first()->id,

            'product_name' => 'Ibuprofen Tablets',
            'brand_name' => 'Advil',
            'manufacturer' => 'Bayer',
            'upc_code' => '370030114184',
            'description' => 'Ibuprofen Tablets 200 mg active ingredient is 200 mg of ibuprofen, pain reliever/fever reducer and a nonsteroidal anti-inflammatory drug (NSAID) for adults and children 12 years and over. These coated tablets temporarily relieve minor aches and pains due to headache, muscular aches, minor pain of arthritis, toothache, backache, the common cold, and menstrual cramps. This product is gluten free.',
            'unit_of_measure' => 'pcs',
            'is_drug' => true,
            'has_sale_restrictions' => false,
            'profile_image' => null,
            'default_price_markup_pct'=>0,
            'offer_unit_price'=>1500.00,
            'qty_available'=>100,

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        //Seed Product Offering Verification Task
        $work_item_id = DB::table('work_items')->insertGetId([
            'facility_id' => $cedarCrestFacility->id,
            'facility_product_id' => $product_id,
            'work_item_type' => 'product-offering-verification',
            'status' => 'new',
            'title' => 'Verification of Product Offering',
            'description' => 'Review product offer details, verify price, etc.',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        //Assign the task to Professionals Officer
        $primaryAdminEmail = 'admin@hd-platform.ng';
        $assignedUserEmail = 'professional-officer@hd-platform.ng';
        
        $primaryUser = User::where('email',$primaryAdminEmail)->first();
        $assignedUser = User::where('email',$assignedUserEmail)->first();

        if ($primaryUser!=null && $assignedUser!=null){
            $work_item_assignment_id = DB::table('work_item_assignments')->insertGetId([
                'assigner_user_id' => $primaryUser->id,
                'assigned_user_id' => $assignedUser->id,
                'work_item_id' => $work_item_id,
                'status' => 'assigned',
                'is_accepted' => true,
                'is_current' => true,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }






    }

}
