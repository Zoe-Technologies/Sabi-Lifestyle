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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->string('name');
            $table->string('description');
            $table->string('images');
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
            $table->string('discount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
