<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::disableForeignKeyConstraints();
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->default(0);

            $table->integer('work_item_id')->unsigned();
            $table->foreign('work_item_id')->references('id')->on('work_items');

            $table->integer('work_assignment_id')->unsigned()->nullable();
            $table->foreign('work_assignment_id')->references('id')->on('work_item_assignments');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->text('content');

            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
        DB::update("ALTER TABLE comments AUTO_INCREMENT = 8324;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('comments');
        Schema::enableForeignKeyConstraints();
    }
}
