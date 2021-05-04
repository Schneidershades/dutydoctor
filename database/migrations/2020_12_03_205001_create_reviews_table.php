<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('users');

            $table->integer('professional_id')->unsigned();
            $table->foreign('professional_id')->references('id')->on('users');

            $table->string('status');
            $table->text('comments');

            $table->integer('score')->default(0);

            $table->boolean('is_published')->default(false);
            $table->boolean('is_reviewed_by_professional')->default(false);
            $table->boolean('is_flagged_for_review')->default(false);
            $table->boolean('is_removed')->default(false);

            $table->text('removal_reason')->nullable();
            $table->dateTime('removed_at')->nullable();

            $table->text('professional_complaint_notes')->nullable();


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
        Schema::dropIfExists('reviews');
    }
}
