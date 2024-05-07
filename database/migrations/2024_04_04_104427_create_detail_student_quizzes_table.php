<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_student_quizzes', function (Blueprint $table) {  // this tabale sktcok the information about student quizzes with check about if it subscriber or not
            $table->id();
            $table->float('grade');
            $table->boolean('pass');
            $table->integer('retaking')->nullable();
            $table->unsignedBigInteger('deatils_student_id');
            $table->foreign('deatils_student_id')->references('id')->on('details_students');

            $table->unsignedBigInteger('quiz_id');
            $table->foreign('quiz_id')->references('id')->on('quizzes');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_student_quizzes');
    }
};
