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
            $table->string('email')->unique();
            $table->string('phone_no', 11)->unique()->nullable();
            $table->string('account_password');
            $table->string('phone_verify_otp', 11)->nullable();
            $table->string('email_verify_token', 64)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->dateTime('date_of_birth')->nullable();
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->string('address_line_1', 128)->nullable();
            $table->string('address_line_2', 128)->nullable();
            $table->string('division_id', 64)->nullable();
            $table->string('zip_code', 10)->nullable();
            $table->string('country_id', 64)->nullable();
            $table->enum('status', [ 0, 1])->nullable();
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
        Schema::dropIfExists('customers');
    }
}
