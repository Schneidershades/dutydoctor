<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffercategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers_in_category', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('category_id')->nullable()->unsigned();
            $table->foreign('category_id')->references('id')->on('offering_categories');

            $table->integer('service_offering_id')->unsigned()->nullable();
            $table->foreign('service_offering_id')->references('id')->on('service_offerings');

            $table->integer('product_offering_id')->unsigned()->nullable();
            $table->foreign('product_offering_id')->references('id')->on('product_offerings');

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
        Schema::dropIfExists('offers_in_category');
        Schema::enableForeignKeyConstraints();
    }
}
