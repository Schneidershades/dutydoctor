<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductOfferingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_offerings', function (Blueprint $table) {
            $table->increments('id');

            $table->string('product_name');

            $table->string('brand_name');
            $table->string('manufacturer');
            $table->string('upc_code');

            $table->text('description');
            $table->string('unit_of_measure');
            $table->boolean('is_drug')->default(false);
            $table->boolean('has_sale_restrictions')->default(false);
            $table->binary('profile_image')->nullable();

            $table->float('default_price_markup_pct', 10, 2)->default(0);
            
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
        Schema::dropIfExists('product_offerings');
        Schema::enableForeignKeyConstraints();
    }
}
