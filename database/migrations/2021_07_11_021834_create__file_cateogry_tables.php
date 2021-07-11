<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileCateogryTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_file', function (Blueprint $table) {
            $table->unSignedBigInteger('file_id');
            $table->unSignedBigInteger('course_id');
            $table->foreign('file_id')
            ->references('id')
            ->on('files')
            ->onDelete('cascade');
            $table->foreign('course_id')
            ->references('id')
            ->on('courses')
            ->onDelete('cascade');
            $table->primary(['file_id','course_id']);
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
        Schema::dropIfExists('_file_cateogry_tables');
    }
}
