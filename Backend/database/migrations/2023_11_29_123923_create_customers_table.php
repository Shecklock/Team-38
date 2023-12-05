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
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('CustomerID');
            $table->string('FirstName',50);
            $table->string('LastName',50);
            $table->string('Email',100);
            $table->string('Phone', 11);
            $table->string('Address', 255);
            $table->string('City', 100);
            $table->string('State', 50);
            $table->string('Postcode', 10);
            $table->string('Country', 50);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
