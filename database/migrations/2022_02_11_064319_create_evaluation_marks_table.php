<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation_marks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained();
            $table->foreignId('parent_category_id')->constrained('categories')->comment('Last category not the root category');
            $table->foreignId('test_id')->constrained();
            $table->integer('total_question');
            $table->integer('attended_question');
            $table->string('correct_answer');
            $table->string('wrong_answer');
            $table->double('total_marks');
            $table->double('recived_marks');
            $table->integer('percent_of_correct_answer');
            $table->string('total_time', 32);
            $table->string('utilize_time', 32);
            $table->string('average_time', 32);
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
        Schema::dropIfExists('evaluation_marks');
    }
}
