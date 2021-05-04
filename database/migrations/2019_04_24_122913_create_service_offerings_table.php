<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceOfferingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_offerings', function (Blueprint $table) {
            $table->increments('id');

            $table->string('offer_name');
            $table->text('description')->nullable();
            $table->string('unit_of_measure');
            $table->string('delivery_mode');
            $table->binary('profile_image')->nullable();
            $table->float('default_price_markup_pct', 10, 2)->default(0);
            
            $table->integer('specialty_id')->unsigned()->nullable();
            $table->foreign('specialty_id')->references('id')->on('specialties');

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
        Schema::dropIfExists('service_offerings');
        Schema::enableForeignKeyConstraints();
        
    }
}
