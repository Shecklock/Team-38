<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {
            // Check if the 'ProductID' column exists before adding the foreign key constraint
            if (Schema::hasColumn('reviews', 'ProductID')) {
                // Ensure the ProductID column exists and then add the foreign key constraint
                $table->foreign('ProductID')->references('id')->on('products')->onDelete('cascade');
            }
        });
    }

    public function down()
    {
        Schema::table('reviews', function (Blueprint $table) {
            // Check if the 'ProductID' column exists before dropping the foreign key
            if (Schema::hasColumn('reviews', 'ProductID')) {
                // Drop the foreign key constraint
                // You may also need to drop the index if it doesn't get dropped automatically
                $table->dropForeign(['ProductID']); // Use the column name to reference the foreign key for dropping
                // $table->dropColumn('ProductID'); // Uncomment if you also want to drop the ProductID column
            }
        });
    }
};
