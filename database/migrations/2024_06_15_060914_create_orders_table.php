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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable(); 
            $table->integer('bottle_id')->nullable(); 
            $table->float('bottle_price')->nullable(); 
            $table->integer('bottle_quantity')->nullable(); 
            $table->float('bottle_total')->nullable(); 
           
            $table->integer('thali_id')->nullable(); 
            $table->float('thali_price')->nullable(); 
            $table->integer('thali_quantity')->nullable(); 
            
            $table->float('thali_total')->nullable(); 
            $table->float('sub_total')->nullable(); 
            $table->float('bottle_minus_price')->nullable(); 
            $table->float('grand_total')->nullable(); 
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
        Schema::dropIfExists('orders');
    }
};
