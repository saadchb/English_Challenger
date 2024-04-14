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
            // $table->string('total_amount');
            // $table->foreignId('cart_id')->constrained();
            $table->foreignId('user_id')->constrained()->nullable(); 
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
