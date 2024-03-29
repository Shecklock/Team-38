<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        if (!Schema::hasTable('reviews')) {
            Schema::create('reviews', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('product_id'); // Changed to unsignedInteger to match ProductID in products table

                $table->string('reviewer_name');
                $table->text('review_text');
                $table->unsignedTinyInteger('rating');
                $table->timestamps();

                $table->foreign('product_id')->references('ProductID')->on('products')->onDelete('cascade');
            });
        }
    }


    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
