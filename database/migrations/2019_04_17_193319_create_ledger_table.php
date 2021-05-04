<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLedgerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ledgers', function (Blueprint $table) {
            $table->increments('id');

            $table->string('money_to')->nullable();
            $table->string('money_from')->nullable();
            $table->text('reason');
            $table->float('credit', 10, 2)->default(0);
            $table->float('debit', 10, 2)->default(0);
            $table->float('current_balance', 10, 2);

            $table->integer('expenditure_id')->unsigned()->nullable();
            $table->foreign('expenditure_id')->references('id')->on('customer_expenditures');

            $table->integer('customer_id')->unsigned()->nullable();
            $table->foreign('customer_id')->references('id')->on('users');

            $table->integer('disbursement_id')->unsigned()->nullable();
            $table->foreign('disbursement_id')->references('id')->on('disbursements');
            
            $table->integer('pay_id')->unsigned()->nullable();
            $table->foreign('pay_id')->references('id')->on('pay_attempts');
            
            $table->timestamps();
        });
        DB::update("ALTER TABLE ledgers AUTO_INCREMENT = 6301;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('ledgers');
        Schema::enableForeignKeyConstraints();
    }
}
