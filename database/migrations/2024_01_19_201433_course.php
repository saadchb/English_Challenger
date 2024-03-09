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
        Schema::create("courses", function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('img');
            $table->float('price_sale');
            $table->float('regular_price');
            $table->string('course_view');
            $table->string('evaluation');
            $table->dateTime('duration');
            $table->string('level');
            $table->integer('max_student');
            $table->text('featured_review');

            $table->unsignedBigInteger('id_categori');
            $table->foreign('id_categori')->references('id')->on('categoris')->onDelete('cascade');

            $table->unsignedBigInteger('id_tag');
            $table->foreign('id_tag')->references('id')->on('tags')->onDelete('cascade');

            // $table->unsignedBigInteger('id_school');
            // $table->foreign('id_school')->references('id')->on('schools')->onDelete('cascade');

            $table->unsignedBigInteger('id_curriculm');
            $table->foreign('id_curriculm')->references('id')->on('curriculms')->onDelete('cascade');

            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
