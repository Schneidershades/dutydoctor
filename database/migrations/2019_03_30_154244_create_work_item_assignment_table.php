<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkItemAssignmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('work_item_assignments', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('parent_id')->nullable();

            $table->integer('expected_duration_days')->default(1);
            $table->integer('actual_duration_days')->default(1);

            $table->integer('assigner_user_id')->unsigned()->nullable();
            $table->foreign('assigner_user_id')->references('id')->on('users');

            $table->integer('assigned_user_id')->unsigned();
            $table->foreign('assigned_user_id')->references('id')->on('users');

            $table->integer('work_item_id')->unsigned()->nullable();
            $table->foreign('work_item_id')->references('id')->on('work_items');

            $table->boolean('is_current')->default(false);
            $table->boolean('is_accepted')->default(false);
            $table->boolean('is_rejected')->default(false);
            $table->boolean('is_completed')->default(false);

            $table->dateTime('accepted_date')->nullable();
            $table->dateTime('completed_date')->nullable();

            //new, assigned, completed, rejected
            $table->string('status')->default("new");

            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
        DB::update("ALTER TABLE work_item_assignments AUTO_INCREMENT = 9918;");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('work_item_assignments');
        Schema::enableForeignKeyConstraints();
    }
}
