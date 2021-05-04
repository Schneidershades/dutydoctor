<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilityLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility_locations', function (Blueprint $table) {
            $table->increments('id');

            $table->string('location_name')->nullable();

            $table->integer('facility_id')->unsigned()->nullable();
            $table->foreign('facility_id')->references('id')->on('facilities');

            $table->string('location_address_house_number')->nullable();
            $table->string('location_address_street_name')->nullable();
            $table->string('location_address_suburb')->nullable();
            $table->string('location_address_city')->nullable();
            $table->string('location_address_state')->nullable();
            $table->string('gps_location_name')->nullable();
            $table->string('gps_long')->nullable();
            $table->string('gps_lat')->nullable();
            $table->string('gps_city')->nullable();
            $table->string('gps_state')->nullable();            

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
        Schema::dropIfExists('facility_locations');
        Schema::enableForeignKeyConstraints();
    }
}
