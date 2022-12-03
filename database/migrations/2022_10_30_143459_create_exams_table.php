<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('exam_name',100)->default('');
            $table->string('subject',100)->default('');
            $table->time('duration')->default(0);
            $table->integer('question_no')->default(0);
            $table->smallInteger('mark')->default(0);
            $table->string('instructor_name',100)->default('');
            $table->string('co_instructor_name',100)->default('');
            $table->smallInteger('room_no')->default('0');
            $table->smallInteger('credits')->default(0);
            $table->string('image_src',255)->default('');
            $table->smallInteger('state')->default(0);
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
        Schema::dropIfExists('exams');
    }
};
