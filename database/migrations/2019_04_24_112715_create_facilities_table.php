<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facilities', function (Blueprint $table) {
            $table->increments('id');

            $table->string('public_code')->nullable()->unique();
            $table->string('telephone')->nullable()->unique();

            $table->string('short_name')->nullable()->unique();
            $table->string('full_name')->nullable();
            $table->text('profile_description')->nullable();
            $table->integer('year_established')->default(0);

            $table->string('primary_email')->nullable()->unique();
            $table->string('primary_telephone')->nullable()->unique();
            $table->string('website')->nullable();

            $table->float('account_balance', 10, 2)->default(0);
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
            $table->binary('profile_image1')->nullable();
            $table->binary('profile_image2')->nullable();
            $table->binary('profile_image3')->nullable();
            $table->binary('profile_image4')->nullable();
            $table->binary('profile_image5')->nullable();

            $table->float('default_price_markup_pct', 10, 2)->default(0);

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
        Schema::dropIfExists('facilities');
        Schema::enableForeignKeyConstraints();
    }
}
