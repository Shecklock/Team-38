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
            $table->id('OrderID');
            $table->unsignedBigInteger('UserID');
            $table->string('Status')->default('Pending'); // For example: Pending, Processing, Shipped, Delivered
            $table->timestamps();
            $table->string('productname');
            $table->integer('quantity');
            // Foreign key relation
            $table->foreign('UserID')->references('id')->on('users')->onDelete('cascade');
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
