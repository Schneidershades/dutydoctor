<?php

use Carbon\Carbon;
use App\Models\OfferingCategory;
use App\Models\OfferingInCategory;
use App\Models\ProductOffering;
use App\Models\ServiceOffering;
use Illuminate\Database\Seeder;

class OfferCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $serviceMap = [
            'General Health'=>['Consultation',],
            'Child Care/Pediatric'=>['Immunization'],
            'Specailists & Consultants'=>['Diabetes','High Blood Pressure','Kidney Dialysis','Orthopaedic','Hearth/Cardiovascular','Cancer','Urology','Surgery'],
            'Women\'s Health'=>['Antenatal','Pregnancy','Family Planning','OB/GYN'],
            'Home Care'=>['Health Check','Home Nurse','Physiotherapist'],
            'Eye Care'=>['Eye Check','Opthamology','Lenses & Contacts'],
            'Dental Care'=>['Cleaning','Cavities & Filling','Crowns','Surgery'],
            'Weight & Wellness'=>['Nutritionist','Gym','Spa'],
            'Lab & Diagnosis'=>['X-Ray','MRI','CT Scan','Blood Test','TB Test','HIV Test'],
        ]; 

        $productMap = [
            'First Aid'=>['Antibiotics','Antiseptics','Scars & Wounds','First Aid Kits','Burn Care'],
            'Cough & Cold'=>['Cough & Sore Throat', 'Cold & Flu Relief', 'Chest Rubs'],
            'Digestion & Nausea'=>['Lactose Intolerance','Diarrhea Relief','Gas Relief','Laxatives','Antacids'],
            'Pain Relievers'=>['Rubs & Ointments','Hemorrhoid Care','Migraine Relief','Non-Aspirin','Aspirin'],
            'Allergy, Sinus & Asthma'=>['Allergy Medicine','Asthma Medicine','Sinus Medicine'],
            'Feminine Care'=>['Family Planning & Contraceptives','Tampons','Menopause'],
            'Diabetes'=>['Monitors & Kits','Test Strips','Lancets'],
            'Medical Supplies & Equipment'=>['Daily Living Aids','Health Monitors & Kits','Mobility Aids'],
        ]; 

        $root = new OfferingCategory(['category_name' => 'Root category']);
        $root->save();

        $prodRoot = $root->children()->create([
            'category_name' => 'Products',
            'description' => 'Health care products',
        ]);

        foreach($productMap as $parent => $children){
            $childObj = $prodRoot->children()->create([
                'category_name' => $parent
            ]); 
            foreach($children as $child){
                $childObj->children()->create([
                    'category_name' => $child
                ]); 
            }
        }
        
        $serviceRoot = $root->children()->create([
            'category_name' => 'Services',
            'description' => 'Health care services',
        ]);

        foreach($serviceMap as $parent => $children){
            $childObj = $serviceRoot->children()->create([
                'category_name' => $parent
            ]); 
            foreach($children as $child){
                $childObj->children()->create([
                    'category_name' => $child
                ]); 
            }
        }



    }
}
