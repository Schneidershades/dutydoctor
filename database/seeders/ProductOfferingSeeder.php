<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProductOfferingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_offerings')->insertGetId([
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

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('product_offerings')->insertGetId([
            'product_name' => 'Fabric Adhesive Bandages for Wound Care and First Aid',
            'brand_name' => 'Band-Aid',
            'manufacturer' => 'Band-Aid',
            'upc_code' => '381371150786',
            'description' => 'Each bandage features a Quilt-Aid Comfort Pad designed to cushion painful wounds while you heal which may help to prevent re-injury. Made with a Hurt-Free Pad, these comfortable bandages won\'t stick to the wound as they wick away blood and fluids, allowing for gentle removal.',
            'unit_of_measure' => 'pcs',
            'is_drug' => false,
            'has_sale_restrictions' => false,
            'profile_image' => null,
            'default_price_markup_pct'=>0,

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('product_offerings')->insertGetId([
            'product_name' => '8 Hour Arthritis Pain Tablets with 950 mg Acetaminophen',
            'brand_name' => 'Tylenol',
            'manufacturer' => 'Tylenol',
            'upc_code' => '300450838216',
            'description' => 'Tylenol 8 Hour Arthritis Pain Extended Release Caplets temporarily relieves the minor pain of arthritis. The bi-layer design delivers fast-acting, effective pain relief that lasts up to 8 hours. With 650 milligrams of acetaminophen per caplet, this pain medicine also temporarily relieves aches and pains associated with muscular aches, backache, premenstrual and menstrual cramps, the common cold, headache, and toothache.',
            'unit_of_measure' => 'pcs',
            'is_drug' => true,
            'has_sale_restrictions' => true,
            'profile_image' => null,
            'default_price_markup_pct'=>0,

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

    }
}
