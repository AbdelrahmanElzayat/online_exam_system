<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Courses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
        });
        Schema::create('course_exam', function (Blueprint $table) {
            $table->unSignedBigInteger('exam_id');
            $table->unSignedBigInteger('course_id');
            $table->foreign('exam_id')
            ->references('id')
            ->on('exams')
            ->onDelete('cascade');
            $table->foreign('course_id')
            ->references('id')
            ->on('courses')
            ->onDelete('cascade');
            $table->primary(['exam_id','course_id']);
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
