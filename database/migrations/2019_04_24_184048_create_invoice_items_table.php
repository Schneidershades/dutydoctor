<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('invoice_id')->unsigned();
            $table->foreign('invoice_id')->references('id')->on('invoices');

            $table->integer('service_request_id')->unsigned()->nullable();
            $table->foreign('service_request_id')->references('id')->on('customer_service_requests');

            $table->integer('product_request_id')->unsigned()->nullable();
            $table->foreign('product_request_id')->references('id')->on('customer_product_requests');

            $table->integer('qty');
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
        Schema::dropIfExists('invoice_items');
        Schema::enableForeignKeyConstraints();
    }
}
