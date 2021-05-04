<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('telephone');
            $table->string('title')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('gender')->nullable();

            $table->dateTime('last_loggedin_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();

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

            $table->string('bank_name')->nullable();
            $table->string('bank_account_name')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('paystack_bank_code')->nullable();
            $table->text('paystack_bank_account_verification_details')->nullable();
            $table->string('paystack_recipient_code')->nullable();
            $table->text('paystack_recipient_details')->nullable();
            $table->boolean('is_bank_account_verified')->default(false);
            $table->dateTime('bank_account_verified_at')->nullable();

            $table->boolean('is_disabled')->default(false);
            $table->text('disable_reason')->nullable();
            $table->dateTime('disabled_at')->nullable();
            $table->integer('disabling_user_id')->unsigned()->nullable();
            $table->foreign('disabling_user_id')->references('id')->on('users');

            $table->binary('profile_image')->nullable();
            
            $table->integer('userable_id')->nullable();
            $table->string('userable_type')->nullable();

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        DB::update("ALTER TABLE users AUTO_INCREMENT = 8701;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
