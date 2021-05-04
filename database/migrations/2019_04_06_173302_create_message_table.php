<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sender')->nullable();
            $table->string('destination');
            $table->text('title')->nullable();
            $table->text('content')->nullable();
            $table->string('msg_type')->nullable();
            $table->string('status')->default('not-sent');
            $table->boolean('is_processed')->default(false);
            $table->boolean('is_cancelled')->default(false);
            $table->boolean('is_failed')->default(false);
            $table->boolean('is_system')->default(false);
            $table->dateTime('sent_at')->nullable();
            $table->dateTime('requested_at')->nullable();
            $table->integer('send_attempts')->default(0);
  

            $table->integer('invoice_id')->nullable()->unsigned();
            $table->foreign('invoice_id')->references('id')->on('invoices');

            $table->integer('disbursement_id')->nullable()->unsigned();
            $table->foreign('disbursement_id')->references('id')->on('disbursements');

            $table->integer('customer_id')->nullable()->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers');

            $table->integer('professional_id')->nullable()->unsigned();
            $table->foreign('professional_id')->references('id')->on('professionals');

            $table->integer('facility_id')->unsigned()->nullable();
            $table->foreign('facility_id')->references('id')->on('facilities');

            $table->integer('specialty_accreditation_id')->unsigned()->nullable();
            $table->foreign('specialty_accreditation_id')->references('id')->on('accreditations');

            $table->integer('service_request_id')->unsigned()->nullable();
            $table->foreign('service_request_id')->references('id')->on('customer_service_requests');

            $table->integer('product_request_id')->unsigned()->nullable();
            $table->foreign('product_request_id')->references('id')->on('customer_product_requests');

            $table->integer('professional_service_id')->unsigned()->nullable();
            $table->foreign('professional_service_id')->references('id')->on('professional_service_offerings');

            $table->integer('facility_service_id')->unsigned()->nullable();
            $table->foreign('facility_service_id')->references('id')->on('facility_service_offerings');

            $table->integer('facility_product_id')->unsigned()->nullable();
            $table->foreign('facility_product_id')->references('id')->on('facility_product_offerings');

  
            $table->string('event_name')->nullable();
            $table->integer('sender_user_id')->default(0);
            $table->integer('destination_customer_id')->nullable();
            $table->integer('destination_professional_id')->nullable();
            $table->integer('destination_facility_id')->nullable();
  
            $table->string('destination_email')->nullable();
            $table->string('destination_phone')->nullable();
  
            $table->text('processing_response')->nullable();
        });
        Schema::enableForeignKeyConstraints();
        DB::update("ALTER TABLE messages AUTO_INCREMENT = 9984;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('messages');
        Schema::enableForeignKeyConstraints();
    }
}
