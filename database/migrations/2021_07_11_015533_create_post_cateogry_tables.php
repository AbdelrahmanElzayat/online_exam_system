<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostCateogryTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_post', function (Blueprint $table) {
                $table->unSignedBigInteger('post_id');
                $table->unSignedBigInteger('course_id');
                $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade');
                $table->foreign('course_id')
                ->references('id')
                ->on('courses')
                ->onDelete('cascade');
                $table->primary(['post_id','course_id']);
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
        Schema::dropIfExists('post_cateogry_tables');
    }
}
