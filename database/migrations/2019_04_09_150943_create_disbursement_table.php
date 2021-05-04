<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisbursementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disbursements', function (Blueprint $table) {
            
            $table->increments('id');

            $table->double('amount',10,2);
            
            $table->integer('invoice_id')->nullable()->unsigned();
            $table->foreign('invoice_id')->references('id')->on('invoices');

            $table->integer('customer_id')->nullable()->unsigned();
            $table->foreign('customer_id')->references('id')->on('users');

            $table->integer('disburser_user_id')->nullable()->unsigned();
            $table->foreign('disburser_user_id')->references('id')->on('users');

            $table->string('status')->nullable();
            $table->string('transfer_code')->unique();
            $table->string('recipient_code')->nullable();
            $table->text('paystack_disbursement_details')->nullable();

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
        Schema::dropIfExists('disbursements');
        Schema::enableForeignKeyConstraints();
    }
}
