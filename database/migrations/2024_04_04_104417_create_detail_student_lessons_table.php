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
        Schema::create('detail_student_lessons', function (Blueprint $table) { // this tabale sktcok the information about student lesson with check about if it subscriber or not
            $table->id();
            $table->boolean('view');

            $table->unsignedBigInteger('deatils_student_id');
            $table->foreign('deatils_student_id')->references('id')->on('details_students');

            $table->unsignedBigInteger('lesson_id');
            $table->foreign('lesson_id')->references('id')->on('lessons');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_student_lessons');
    }
};
