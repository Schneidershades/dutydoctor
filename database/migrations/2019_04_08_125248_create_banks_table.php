<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value');
            $table->string('key');
            $table->string('routing_number')->nullable();
            $table->string('paystack_bank_code')->nullable();
            $table->text('paystack_bank_details')->nullable();
            $table->timestamps();
        });

        DB::update("ALTER TABLE banks AUTO_INCREMENT = 3754;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banks');
    }
}
