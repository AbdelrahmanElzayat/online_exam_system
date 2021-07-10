<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamResultTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->unSignedBigInteger('user_id');
            $table->string('yes_ans')->nullable();
            $table->string('no_ans')->nullable();
            $table->string('result_json')->nullable();
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('exam_result', function (Blueprint $table) {
            $table->unSignedBigInteger('exam_id');
            $table->unSignedBigInteger('result_id');
            $table->foreign('exam_id')
            ->references('id')
            ->on('exams')
            ->onDelete('cascade');
            $table->foreign('result_id')
            ->references('id')
            ->on('results')
            ->onDelete('cascade');
            $table->primary(['exam_id','result_id']);
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
        Schema::dropIfExists('exam_result_tables');
    }
}
