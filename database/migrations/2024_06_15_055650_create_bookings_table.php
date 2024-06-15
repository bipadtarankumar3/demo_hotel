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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id')->nullable();
            $table->integer('room_type')->nullable();               
            $table->integer('room_id')->nullable();               
            $table->float('adults')->nullable();                  
            $table->float('child')->nullable();                  
            $table->float('price')->nullable();                  
            $table->date('checkin_date')->nullable();               
            $table->date('checkout_date')->nullable();               
            $table->string('payment_type')->nullable(); 
            $table->float('due_amount')->nullable(); 
            $table->string('b_status')->nullable(); 
            $table->integer('created_by')->nullable(); 
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
