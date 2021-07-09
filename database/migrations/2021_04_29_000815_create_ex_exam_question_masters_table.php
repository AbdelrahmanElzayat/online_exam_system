<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExExamQuestionMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ex_exam_question_masters', function (Blueprint $table) {
            $table->id();
            $table->string('exam_id')->nullable();
            $table->string('question')->nullable();
            $table->string('ans')->nullable();
            $table->string('option')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('ex_exam_question_masters');
    }
}
