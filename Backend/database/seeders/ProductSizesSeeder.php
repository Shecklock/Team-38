<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Model\Size;

class ProductSizesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Size::all();
        foreach($products as $product) {
            foreach($product->sizes as $size) {
                ProductSize::create([
                    'product_id' => $product->ProductID,
                    'size_id' => $size,
                    'Quantity' => 100
                ]);
            }
        }
    }
}
