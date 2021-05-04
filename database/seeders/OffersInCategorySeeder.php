<?php

use Carbon\Carbon;
use App\Models\OfferingCategory;
use App\Models\OfferingInCategory;
use App\Models\ProductOffering;
use App\Models\ServiceOffering;
use Illuminate\Database\Seeder;


class OffersInCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('offers_in_category')->insertGetId([
            'category_id' => OfferingCategory::where('category_name','Consultation')->first()->id,
            'service_offering_id' => ServiceOffering::where('offer_name','Consultation')->first()->id,
        ]);
        DB::table('offers_in_category')->insertGetId([
            'category_id' => OfferingCategory::where('category_name','Urology')->first()->id,
            'service_offering_id' => ServiceOffering::where('offer_name','Urology Consultation')->first()->id,
        ]);

        
        DB::table('offers_in_category')->insertGetId([
            'category_id' => OfferingCategory::where('category_name','Scars & Wounds')->first()->id,
            'product_offering_id' => ProductOffering::where('upc_code','381371150786')->first()->id,
        ]);
        DB::table('offers_in_category')->insertGetId([
            'category_id' => OfferingCategory::where('category_name','Non-Aspirin')->first()->id,
            'product_offering_id' => ProductOffering::where('upc_code','370030114184')->first()->id,
        ]);
        DB::table('offers_in_category')->insertGetId([
            'category_id' => OfferingCategory::where('category_name','Cold & Flu Relief')->first()->id,
            'product_offering_id' => ProductOffering::where('upc_code','370030114184')->first()->id,
        ]);

    }
}
