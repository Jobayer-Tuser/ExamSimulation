<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name', 128);
            $table->string('email', 64)->unique();
            $table->foreignId('admin_type_id')->constrained('admin_types')->cascadeOnUpdate()->restrictOnDelete();
            $table->string('password', 64);
            $table->enum('status', [0, 1])->comment('0 = Inactive, 1 = active');
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
        Schema::dropIfExists('admins');
    }
}
