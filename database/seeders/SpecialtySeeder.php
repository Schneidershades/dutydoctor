<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;


class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $listMap = [
            'Accident and emergency medicine'=>'',
            'Allergology'=>'',
            'Anaesthetics'=>'',
            'Biological hematology'=>'',
            'Cardiology'=>'',
            'Child psychiatry'=>'',
            'Clinical biology'=>'',
            'Clinical chemistry'=>'',
            'Clinical neurophysiology'=>'',
            'Craniofacial surgery'=>'',
            'Dental, oral and maxillo-facial surgery'=>'Nigerian Dental Association (NDA)',
            'Dermato-venereology'=>'',
            'Dermatology'=>'',
            'Endocrinology'=>'',
            'Family and General Medicine'=>'',
            'Gastro-enterologic surgery'=>'',
            'Gastroenterology'=>'',
            'General hematology'=>'',
            'General Practice'=>'Nigerian Medical Association (NMA)',
            'General Surgery'=>'Nigerian Medical Association (NMA)',
            'Geriatrics'=>'',
            'Immunology'=>'',
            'Infectious diseases'=>'',
            'Internal medicine'=>'',
            'Laboratory medicine'=>'',
            'Maxillo-facial surgery'=>'',
            'Microbiology'=>'',
            'Nephrology'=>'',
            'Neuro-psychiatry'=>'',
            'Neurology'=>'',
            'Neurosurgery'=>'',
            'Nuclear medicine'=>'',
            'Obstetrics and gynecology'=>'',
            'Occupational medicine'=>'',
            'Ophthalmology'=>'',
            'Orthopaedics'=>'',
            'Otorhinolaryngology'=>'',
            'Paediatric surgery'=>'',
            'Paediatrics'=>'',
            'Pathology'=>'',
            'Pharmacology'=>'',
            'Plastic surgery'=>'',
            'Podiatric Surgery'=>'',
            'Psychiatry'=>'',
            'Public health and Preventive Medicine'=>'',
            'Radiation Oncology'=>'',
            'Radiology'=>'',
            'Respiratory medicine'=>'',
            'Rheumatology'=>'',
            'Stomatology'=>'',
            'Thoracic surgery'=>'',
            'Tropical medicine'=>'',
            'Urology'=>'',
            'Vascular surgery'=>'',
            'Venereology'=>''
        ];
        
        foreach($listMap as $speciality=>$body){
            DB::table('specialties')->insertGetId([
                'short_name' => $speciality,
                'accreditation_body' => $body,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }

    }
}
