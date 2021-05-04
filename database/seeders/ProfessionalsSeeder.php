<?php

use Carbon\Carbon;
use App\Models\User;
use App\Models\Specialty;
use App\Models\ServiceOffering;
use App\Models\Professional;

use Illuminate\Database\Seeder;

class ProfessionalsSeeder extends Seeder
{

    public function run()
    {

        $professional_id1 = DB::table('users')->insertGetId([
            'email' => 'professional@hdp.ng',
            'password' => Hash::make('1234'),
            'telephone' => '08086707122',
            'first_name' => 'Donald',
            'last_name' => 'Eneh',
            'middle_name' => 'O',
            'gender' => 'male',
            'location_address_city' => 'Abuja',
            'location_address_state' => 'FCT',
            'bank_name' => 'GTB',
            'bank_account_name' => 'Eneh, Donald O.',
            'bank_account_number' => '1116535262',
            'is_bank_account_verified' => false,
            'gps_city' => 'Lagos',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        $usr = User::where('email','professional@hdp.ng')->first();
        if ($usr != null){
            $professionalUser = Professional::create([
                'public_code'=>'CC'.time(),
                'account_balance'=>12000.00,
            ]);
            $professionalUser->user()->save($usr);
        }
        
        //Seed Accreditation
        $spec = Specialty::where('short_name','General Practice')->first();
        $accreditationId = DB::table('accreditations')->insertGetId([
            'professional_id' => $professional_id1,
            'specialty_id' => $spec->id,
            'short_name' => $spec->short_name,
            'accreditation_number' => 'NMA-1123345',
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
            'professional_id' => $professional_id1,
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

        //Seed Professional Service Offering
        $service_id = DB::table('professional_service_offerings')->insertGetId([
            'professional_id' => $professional_id1,
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
            'professional_id' => $professional_id1,
            'professional_service_id' => $service_id,
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


    }
}
