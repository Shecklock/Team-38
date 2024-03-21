<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('ProductID');
            $table->string('ProductName');
            $table->longText('Description');
            $table->double('Price');
            $table->integer('StockQuantity')->default(0); // Removed quotes from default value
            $table->string('image')->nullable();
            $table->unsignedInteger('CategoryID')->nullable(); // Changed to unsignedInteger
            $table->foreign('CategoryID')->references('CategoryID')->on('categories');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
