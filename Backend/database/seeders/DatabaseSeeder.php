<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Calls other seeders to run 
        $this->call([
            CategorySeeder::class,
            ProductsSeeder::class,
            ReviewSeeder::class,
            SizesSeeder::class,
            ProductSizesSeeder::class,
            ServiceReviews::class,
        ]);
    }
}
