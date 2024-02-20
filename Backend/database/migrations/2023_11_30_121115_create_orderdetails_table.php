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
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->increments('OrderDetailId');
            $table->integer('OrderID')->references('OrderID')->on('orders');
            $table->integer('ProductID')->references('ProductID')->on('products');
            $table->integer('Quantity');
            $table->decimal('Price', $precision=10, $scale=2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderdetails');
    }
};
