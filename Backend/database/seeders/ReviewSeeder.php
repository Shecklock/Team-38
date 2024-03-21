<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;

// php artisan db:seed --class=ReviewSeeder
class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sets an array for names and different reviews
        $names = ['John', 'James', 'Jane', 'Alex', 'Mary'];
        $reviews = [
            ["Amazing!", 5],
            ["Very good!", 4],
            ["It's okay...", 3],
            ["Could be better...", 2],
            ["Bad.", 1]
        ];

        // Iterates through each name, randomly reviews 5 products from the array of reviews
        foreach ($names as $name) {
            // Randomly selects a product id
            $min = 1; $max = 25;
            $product = random_int($min, $max);

            // Randomly chooses a product
            $index = array_rand($reviews);

            // Creates a review
            Review::create([
                'product_id' => $product,
                'reviewer_name' => $name,
                'review_text' => $reviews[$index][0],
                'rating' => $reviews[$index][1]
            ]);
        }
    }
}
