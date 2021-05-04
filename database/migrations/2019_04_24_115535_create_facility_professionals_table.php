<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilityProfessionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility_professionals', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('professional_id')->unsigned()->nullable();
            $table->foreign('professional_id')->references('id')->on('users');

            $table->integer('facility_id')->unsigned()->nullable();
            $table->foreign('facility_id')->references('id')->on('facilities');

            $table->boolean('is_accepted_facility')->default(false);
            $table->boolean('is_accepted_professional')->default(false);
            
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
        Schema::dropIfExists('facility_professionals');
        Schema::enableForeignKeyConstraints();
    }
}
