<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();

            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('users');

            $table->integer('professional_id')->unsigned();
            $table->foreign('professional_id')->references('id')->on('users');

            $table->string('status'); //pending, confirmed, cancelled, rescheduled, past
            $table->string('consultation_type'); //video, voice

            $table->dateTime('proposed_date');
            $table->dateTime('rescheduled_date')->nullable();

            $table->text('customer_appointment_reason')->nullable();

            $table->text('customer_cancellation_notes')->nullable();
            $table->text('professional_cancellation_notes')->nullable();

            $table->text('customer_reschedule_notes')->nullable();
            $table->text('professional_reschedule_notes')->nullable();

            $table->boolean('is_accepted_by_customer')->default(false);
            $table->boolean('is_accepted_by_professional')->default(false);

            $table->boolean('is_cancelled_by_professional')->default(false);
            $table->boolean('is_rescheduled_by_professional')->default(false);

            $table->boolean('is_cancelled_by_customer')->default(false);
            $table->boolean('is_rescheduled_by_customer')->default(false);

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
        Schema::dropIfExists('appointments');
    }
}
