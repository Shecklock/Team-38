<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('registration_codes', function (Blueprint $table) {
        $table->id();
        $table->string('code')->unique(); // Ensure each code is unique.
        $table->dateTime('expires_at'); // The expiration date and time of the code.
        $table->boolean('used')->default(false); // Whether the code has been used.
        $table->timestamps(); // Laravel's default timestamp fields.
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registration_codes');
    }
};
