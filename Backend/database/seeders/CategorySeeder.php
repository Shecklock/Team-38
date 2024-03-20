<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

// php artisan db:seed --class=CategorySeeder
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Array of categories 
        $categories = [
            'T-shirts',
            'Tracksuits',
            'Jackets',
            'Shoes',
            'Bags'
        ];

        foreach ($categories as $category) {
            Category::create(['CategoryName' => $category]);
        }
    }
}
