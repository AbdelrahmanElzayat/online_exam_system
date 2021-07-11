<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Questions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('question')->nullable();
            $table->string('ans')->nullable();
            $table->string('option')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
        Schema::create('exam_question', function (Blueprint $table) {
            $table->unSignedBigInteger('exam_id');
            $table->unSignedBigInteger('question_id');
            $table->foreign('exam_id')
            ->references('id')
            ->on('exams')
            ->onDelete('cascade');
            $table->foreign('question_id')
            ->references('id')
            ->on('questions')
            ->onDelete('cascade');
            $table->primary(['exam_id','question_id']);
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
        //
    }
}
