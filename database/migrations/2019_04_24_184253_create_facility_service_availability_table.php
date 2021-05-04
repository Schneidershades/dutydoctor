<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilityServiceAvailabilityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility_service_availability', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('facility_id')->unsigned();
            $table->foreign('facility_id')->references('id')->on('facilities');
            
            $table->integer('facility_location_id')->unsigned()->nullable();
            $table->foreign('facility_location_id')->references('id')->on('facility_locations');
            
            $table->integer('service_offering_id')->unsigned();
            $table->foreign('service_offering_id')->references('id')->on('service_offerings');

            //specific days
            $table->boolean('is_available_monday')->default(true);
            $table->boolean('is_available_tuesday')->default(true);
            $table->boolean('is_available_wednesday')->default(true);
            $table->boolean('is_available_thursday')->default(true);
            $table->boolean('is_available_friday')->default(true);
            $table->boolean('is_available_saturday')->default(true);
            $table->boolean('is_available_sunday')->default(true);
            
            //specific times
            $table->time('specific_time_open')->nullable();
            $table->time('specific_time_close')->nullable();

            //currently_availability
            $table->boolean('is_currently_unavailable')->default(false);

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
        Schema::dropIfExists('facility_service_availability');
        Schema::enableForeignKeyConstraints();
    }
}
