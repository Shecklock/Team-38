<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Change the CustomerID column to unsignedBigInteger to match the users table
            $table->unsignedBigInteger('CustomerID')->change();
            
            // Add a foreign key constraint to CustomerID referencing the users table
            $table->foreign('CustomerID')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['CustomerID']);
            
            // Optionally, revert the CustomerID column type if needed
            // $table->integer('CustomerID')->change();
        });
    }
};
