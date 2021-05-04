<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_records', function (Blueprint $table) {
            $table->id();

            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('users');

            $table->integer('professional_id')->unsigned();
            $table->foreign('professional_id')->references('id')->on('users');

            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('blood_pressure')->nullable();
            $table->text('known_disability')->nullable();
            $table->text('known_drug_interactions')->nullable();
            $table->text('previous_health_issues')->nullable();

            $table->text('presentation_notes')->nullable();
            $table->text('consultation_notes')->nullable();
            $table->text('drug_prescription')->nullable();
            $table->text('prescription_notes')->nullable();
            $table->string('reported_by'); // customer or professional
            $table->string('record_type'); // lab-test-result, xray-image, ultrasound-video, image, video

            $table->string('external_file_url')->nullable();
            $table->string('external_file_type')->nullable();

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
        Schema::dropIfExists('medical_records');
    }
}
