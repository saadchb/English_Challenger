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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('school_name');
            $table->text('school_logo')->nullable();
            $table->text('type')->nullable();
            $table->text('school_photo')->nullable();
            $table->string('phone_number');
            $table->string('email');
            $table->string('password');

            // $table->string('linkdin');
            $table->string('name_headmaster');
            $table->string('phone_number_headmaster');
            $table->string('school_city');
            $table->string('adresse');
            $table->text('description');
            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
