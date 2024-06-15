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
        Schema::create('order_itmes', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->nullable(); 
            $table->integer('item_id')->nullable(); 
            $table->float('price')->nullable(); 
            $table->float('count')->nullable(); 
            $table->integer('total')->nullable(); 
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
        Schema::dropIfExists('order_itmes');
    }
};
