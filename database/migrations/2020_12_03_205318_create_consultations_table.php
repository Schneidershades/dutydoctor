<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();

            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('users');

            $table->integer('professional_id')->unsigned();
            $table->foreign('professional_id')->references('id')->on('users');

            $table->string('type'); //video, voice
            $table->string('record_type')->nullable();
            $table->string('record_url')->nullable();

            $table->dateTime('started_at')->nullable();
            $table->dateTime('ended_at')->nullable();

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
        Schema::dropIfExists('consultations');
    }
}
