<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilityProductOfferingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility_product_offerings', function (Blueprint $table) {
            $table->increments('id');

            $table->string('product_name');

            $table->string('brand_name');
            $table->string('manufacturer');
            $table->string('upc_code');

            $table->integer('qty_available')->default(0);
            $table->dateTime('product_availability_date')->nullable();

            $table->text('description');
            $table->string('unit_of_measure');
            $table->boolean('is_drug')->default(false);
            $table->boolean('has_sale_restrictions')->default(false);
            $table->binary('profile_image')->nullable();

            $table->float('offer_unit_price', 10, 2)->default(0);
            $table->float('default_price_markup_pct', 10, 2)->default(0);

            $table->integer('product_offering_id')->unsigned()->nullable();
            $table->foreign('product_offering_id')->references('id')->on('product_offerings');

            $table->integer('facility_id')->unsigned()->nullable();
            $table->foreign('facility_id')->references('id')->on('facilities');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('facility_product_offerings');
        Schema::enableForeignKeyConstraints();
        
    }
}
