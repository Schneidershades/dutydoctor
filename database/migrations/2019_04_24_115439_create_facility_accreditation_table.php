<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilityAccreditationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accreditations', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('facility_id')->unsigned()->nullable();
            $table->foreign('facility_id')->references('id')->on('facilities');

            $table->integer('professional_id')->unsigned()->nullable();
            $table->foreign('professional_id')->references('id')->on('users');

            $table->integer('specialty_id')->unsigned()->nullable();
            $table->foreign('specialty_id')->references('id')->on('specialties');

            $table->string("short_name");
            $table->string("accreditation_number")->nullable();
            $table->string("accreditation_body")->nullable();

            $table->dateTime("issue_date")->nullable();
            $table->dateTime("expire_date")->nullable();

            $table->boolean('is_verified')->default(false);
            $table->string('verification_status')->nullable();
            $table->dateTime('verified_at')->nullable();
            $table->integer('verifying_user_id')->unsigned()->nullable();
            $table->foreign('verifying_user_id')->references('id')->on('users');            

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
        Schema::dropIfExists('facility_accreditation');
        Schema::enableForeignKeyConstraints();
    }
}
