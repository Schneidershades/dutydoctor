<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatepayattemptTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('pay_attempts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pay_attempt_code');
            $table->double('pay_amount',10,2);
  
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('users');

            $table->string('payment_gateway_reference_code')->nullable();
            $table->string('payment_gateway_name')->nullable();
            $table->text('payment_gateway_response')->nullable();
            $table->string('payment_instrument_type')->nullable();
            $table->string('payment_status')->nullable();
  
            $table->boolean('is_payment_verified')->default(false);
            $table->text('payment_gateway_verification')->nullable();
  
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
        DB::update("ALTER TABLE pay_attempts AUTO_INCREMENT = 2234;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('pay_attempts');
        Schema::enableForeignKeyConstraints();
    }
}
