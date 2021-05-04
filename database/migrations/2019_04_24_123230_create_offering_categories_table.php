<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferingCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offering_categories', function (Blueprint $table) {
            $table->increments('id');

            $table->string('category_name');
            $table->string('description')->nullable();
            $table->binary('profile_image')->nullable();
            $table->foreignId('parent_id')->nullable();

            $table->softDeletes();

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
        Schema::dropIfExists('offering_categories');
        Schema::enableForeignKeyConstraints();
    }
}
