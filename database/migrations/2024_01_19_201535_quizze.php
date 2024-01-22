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
        Schema::create("quizzes",function(Blueprint $table){
            $table->id();
            $table->string('title');
            $table->text('description');

            $table->unsignedBigInteger('id_question');
            $table->foreign('id_question')->references('id')->on('questions')->onDelete('cascade');

            $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
