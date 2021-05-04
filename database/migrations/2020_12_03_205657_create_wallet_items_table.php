<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet_items', function (Blueprint $table) {
            $table->id();

            $table->integer('professional_id')->unsigned();
            $table->foreign('professional_id')->references('id')->on('users');

            // Schema::disableForeignKeyConstraints();
            
            // $table->integer('consultation_id')->unsigned()->nullable();
            // $table->foreign('consultation_id')->references('id')->on('consultations');

            // Schema::enableForeignKeyConstraints();

            
            $table->string('title');
            $table->decimal('amount', 13, 2)->default(0);

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
        Schema::dropIfExists('wallet_items');
        Schema::enableForeignKeyConstraints();
    }
}
