<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('work_items', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('invoice_id')->nullable()->unsigned();
            $table->foreign('invoice_id')->references('id')->on('invoices');

            $table->integer('disbursement_id')->nullable()->unsigned();
            $table->foreign('disbursement_id')->references('id')->on('disbursements');

            $table->integer('customer_id')->nullable()->unsigned();
            $table->foreign('customer_id')->references('id')->on('users');

            $table->integer('professional_id')->nullable()->unsigned();
            $table->foreign('professional_id')->references('id')->on('users');

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

            //new, assigned, or completed
            $table->string('status')->default("new");

            //various tasks are available:
            //accreditation-verification, product-offering-verification, service-offering-verification, service-request-follow-up, product-request-follow-up
            $table->string('work_item_type')->nullable();

            $table->string('title')->nullable();
            $table->text('description')->nullable();

            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
        DB::update("ALTER TABLE work_items AUTO_INCREMENT = 4418;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('work_items');
        Schema::enableForeignKeyConstraints();
    }
}
