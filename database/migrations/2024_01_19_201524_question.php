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
        Schema::create("questions",function(Blueprint $table){
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->integer('points');
            $table->text('hint');
            $table->text('explanation');

            $table->unsignedBigInteger('id_answer');
            $table->foreign('id_answer')->references('id')->on('answers')->onDelete('cascade');

            $table->unsignedBigInteger('id_detail');
            $table->foreign('id_detail')->references('id')->on('details')->onDelete('cascade');

            $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
