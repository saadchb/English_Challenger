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
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->string('billing_first_name');
            $table->string('billing_last_name');
            $table->string('billing_company')->nullable();
            $table->string('billing_country');
            $table->string('billing_address_1');
            $table->string('billing_address_2')->nullable();
            $table->string('billing_city');
            $table->string('billing_postcode');
            $table->string('billing_state')->nullable();
            $table->string('billing_email');
            $table->text('order_notes')->nullable();
            $table->string('billing_phone');
            $table->string('order_comments')->nullable();
            $table->string('payment_method')->nullable();

            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');

            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('parents')->onDelete('cascade');

            $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');

            $table->unsignedBigInteger('school_id')->nullable();
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkouts');
    }
};
