<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageTemplateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('message_templates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('template_name');
            $table->text('content');
            $table->string('msg_type')->nullable();
            $table->text('template_description')->nullable();
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
        DB::update("ALTER TABLE message_templates AUTO_INCREMENT = 7784;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('message_templates');
        Schema::enableForeignKeyConstraints();
    }
}
