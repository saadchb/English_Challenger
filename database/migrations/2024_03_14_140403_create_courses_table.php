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
            $table->text('description');
            $table->float('sale_price')->nullable();
            $table->float('regular_price')->nullable();
            $table->dateTime('sale_start_dates')->nullable();
            $table->dateTime('sale_end_dates')->nullable();
            $table->string('course_view')->nullable();
            $table->boolean('there_is_no_enrollment_requirement')->default(false);
            $table->integer('passing_grade')->nullable();
            $table->string('evaluation')->nullable();
            $table->integer('duration')->nullable();
            $table->boolean('blocked_content_by_duration')->default(false);
            $table->boolean('blocked_content_by_student')->default(true);
            $table->boolean('allow_repurchase')->default(false);
            $table->string('repurchase_action')->nullable();
            $table->string('level')->nullable();
            $table->integer('fake_students_enrolled')->nullable();
            $table->boolean('finish_button')->default(true);
            $table->boolean('add_to_featured_list')->default(false);
            $table->string('external_link')->nullable();
            $table->boolean('students_list')->default(false);
            $table->string('re_take_course')->nullable();
            $table->integer('max_student')->nullable();
            $table->text('featured_review')->nullable();
            $table->string('duration_gauge')->default('Minute(s)');
            $table->softDeletes();

            $table->unsignedBigInteger('id_school')->nullable();
            $table->foreign('id_school')->references('id')->on('schools')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("courses", function (Blueprint $table){
            $table->softDeletes();
        });

    }
};
