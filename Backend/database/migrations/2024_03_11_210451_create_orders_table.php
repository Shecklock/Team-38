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
            $table->unsignedBigInteger('UserID'); // Foreign key referencing the users table
            $table->foreign('UserID')->references('UsersID')->on('users');
            // Add any other columns you need for your orders table
            // For example:
            // $table->string('order_description');
            $table->timestamps();
        });

        // add a foreign key referencing the products table
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('ProductID'); // Foreign key referencing the products table
            $table->foreign('ProductID')->references('ProductID')->on('products');
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
