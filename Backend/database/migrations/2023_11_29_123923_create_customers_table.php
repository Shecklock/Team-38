<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('CustomerID');
            $table->unsignedBigInteger('user_id'); // Add this line to create a user_id column
            $table->string('FirstName',50);
            $table->string('LastName',50)->nullable()->default('');
            $table->string('Email',100);
            $table->string('Phone', 11)->nullable()->default('');
            $table->string('Address', 255)->nullable()->default('');
            $table->string('City', 100)->nullable()->default('');
            $table->string('State', 50)->nullable()->default('');
            $table->string('Postcode', 10)->nullable()->default('');
            $table->string('Country', 50)->nullable()->default('');

            $table->timestamps();

            // Foreign key constraint referencing the 'users' table
            $table->foreign('UserID')->references('id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
