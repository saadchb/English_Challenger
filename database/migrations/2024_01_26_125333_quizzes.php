<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->integer('duration');
            $table->enum('duration_unit', ['day','hour', 'Minutes', 'week']);
            $table->integer('passing_grade');
            $table->boolean('instant_check')->nullable();
            $table->boolean('negative_marking')->nullable();
            $table->boolean('minus_for_skip')->nullable();
            $table->integer('retake')->nullable();
            $table->integer('pagination')->nullable();
            $table->boolean('review')->default(1);
            $table->boolean('show_correct_answer')->default(1);
            $table->unsignedBigInteger('curriculum_id')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
