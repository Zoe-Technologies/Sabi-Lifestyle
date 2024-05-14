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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id');
            $table->foreignId('product_id');
            $table->string('price_small')->nullable();
            $table->string('price_medium')->nullable();
            $table->string('price_large')->nullable();
            $table->string('price_xlarge')->nullable();
            $table->string('price_xxlarge')->nullable();
            $table->string('price_xxxlarge')->nullable();
            $table->string('quantity_small')->nullable();
            $table->string('quantity_medium')->nullable();
            $table->string('quantity_large')->nullable();
            $table->string('quantity_xlarge')->nullable();
            $table->string('quantity_xxlarge')->nullable();
            $table->string('quantity_xxxlarge')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
