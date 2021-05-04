<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerProductRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_product_requests', function (Blueprint $table) {
            $table->increments('id');

            $table->string('location_address_house_number')->nullable();
            $table->string('location_address_street_name')->nullable();
            $table->string('location_address_suburb')->nullable();
            $table->string('location_address_city')->nullable();
            $table->string('location_address_state')->nullable();
            $table->string('gps_location_name')->nullable();
            $table->string('gps_long')->nullable();
            $table->string('gps_lat')->nullable();
            $table->string('gps_city')->nullable();
            $table->string('gps_state')->nullable();

            $table->string('status');
            $table->integer('requested_qty');
            $table->boolean('is_canceled_by_customer')->default(false);
            $table->boolean('is_canceled_by_service_provider')->default(false);
            $table->text('cancellation_reason')->nullable();
            $table->text('customer_request_notes')->nullable();

            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('users');

            $table->integer('facility_product_id')->unsigned();
            $table->foreign('facility_product_id')->references('id')->on('facility_product_offerings');

            $table->string('originator')->nullable();
            $table->integer('originator_id')->unsigned()->nullable();

            $table->float('unit_price', 10, 2);
            $table->float('vat_amount', 10, 2);
            $table->float('price_markup_pct', 10, 2)->default(0);
            $table->float('final_unit_price', 10, 2);

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
        Schema::dropIfExists('customer_product_requests');
        Schema::enableForeignKeyConstraints();
        
    }
}
