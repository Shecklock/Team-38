<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Rename table to follow naming conventions
        Schema::rename('orderdetails', 'order_details');

        Schema::table('order_details', function (Blueprint $table) {
            // Drop existing foreign keys and columns if you want to redefine them
            // $table->dropForeign(['OrderID']);
            // $table->dropForeign(['ProductID']);

            // Modify existing columns to unsignedInteger for proper foreign key referencing
            $table->unsignedInteger('OrderID')->change();
            $table->unsignedInteger('ProductID')->change();

            // Add foreign key constraints
            $table->foreign('OrderID')->references('OrderID')->on('orders')->onDelete('cascade');
            $table->foreign('ProductID')->references('ProductID')->on('products')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('order_details', function (Blueprint $table) {
            // Rollback foreign key constraints
            $table->dropForeign(['OrderID']);
            $table->dropForeign(['ProductID']);

            // Optionally, rollback the table name change if needed
            // Schema::rename('order_details', 'orderdetails');
        });
        Schema::dropIfExists('order_details');
    }
};
