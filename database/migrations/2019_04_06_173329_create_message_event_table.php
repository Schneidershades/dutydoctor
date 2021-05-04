<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('message_events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('event_name')->nullable();
            $table->integer('template_id');
            // $table->integer('frequency_days')->default(0);
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
        DB::update("ALTER TABLE message_events AUTO_INCREMENT = 1841;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('message_events');
        Schema::enableForeignKeyConstraints();
    }
}
