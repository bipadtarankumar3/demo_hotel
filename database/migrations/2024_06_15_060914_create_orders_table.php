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
           
            $table->integer('customer_id')->nullable(); 
            $table->integer('item_id')->nullable(); 
            $table->float('price')->nullable(); 
            $table->integer('quantity')->nullable(); 
            
            $table->float('total')->nullable(); 
            $table->float('sub_total')->nullable(); 
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
