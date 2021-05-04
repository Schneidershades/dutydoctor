<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilityServiceOfferingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility_service_offerings', function (Blueprint $table) {
            $table->increments('id');

            $table->string('offer_name');
            $table->string('description');
            $table->string('unit_of_measure');
            $table->string('delivery_mode');
            $table->binary('profile_image')->nullable();
            
            $table->float('offer_unit_price', 10, 2)->default(0);
            $table->float('default_price_markup_pct', 10, 2)->default(0);

            $table->integer('facility_id')->unsigned()->nullable();
            $table->foreign('facility_id')->references('id')->on('facilities');

            $table->integer('service_offering_id')->unsigned()->nullable();
            $table->foreign('service_offering_id')->references('id')->on('service_offerings');

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
        Schema::dropIfExists('facility_service_offerings');
        Schema::enableForeignKeyConstraints();
    }
}
