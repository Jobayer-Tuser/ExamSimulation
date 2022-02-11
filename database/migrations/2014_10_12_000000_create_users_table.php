<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email_address')->unique();
            $table->string('phone_no', 11)->unique();
            $table->string('account_password', 32);
            $table->string('phone_verify_otp', 11);
            $table->string('email_verify_token', 64);
            $table->timestamp('email_verified_at')->nullable();
            $table->dateTime('date_of_birth');
            $table->enum('gender', ['Male', 'Female']);
            $table->string('address_line_1', 128);
            $table->string('address_line_2', 128);
            $table->string('division_id', 64);
            $table->string('zip_code', 10);
            $table->string('country_id', 64);
            $table->enum('status', [ 0, 1]);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
