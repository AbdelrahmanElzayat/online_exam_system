<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamUserTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_user', function (Blueprint $table) {
            $table->unSignedBigInteger('user_id');
            $table->unSignedBigInteger('exam_id');
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            $table->foreign('exam_id')
            ->references('id')
            ->on('exams')
            ->onDelete('cascade');
            $table->primary(['user_id','exam_id']);
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
        Schema::dropIfExists('exam_user_tables');
    }
}
