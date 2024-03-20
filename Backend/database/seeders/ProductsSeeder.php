<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get CategoryID for each category 
        $tshirtCategoryID = Category::where('CategoryName', 'T-shirts')->value('CategoryID');
        $tracksuitCategoryID = Category::where('CategoryName', 'Tracksuits')->value('CategoryID');
        $jacketsCategoryID = Category::where('CategoryName', 'Jackets')->value('CategoryID');
        $shoesCategoryID = Category::where('CategoryName', 'Shoes')->value('CategoryID');
        $bagsCategoryID = Category::where('CategoryName', 'Bags')->value('CategoryID');

        // Array of tuples, each representing a single product
        $productsData = [
            // T-shirts
            [
                'ProductName' => 'Puma T-shirt',
                'Description' => 'White Puma T-shirt',
                'Price' => '10.99',
                'StockQuantity' => '50',
                'image' => 'puma_tshirt.jpg',
                'CategoryID' => $tshirtCategoryID
            ], 
            [
                'ProductName' => 'Nike T-shirt',
                'Description' => 'Black Nike T-Shirt',
                'Price' => '15.99',
                'StockQuantity' => '30',
                'image' => 'nike_tshirt.webp',
                'CategoryID' => $tshirtCategoryID
            ], 
            [
                'ProductName' => 'Adidas T-shirt',
                'Description' => 'Blue Adidas T-Shirt',
                'Price' => '16.99',
                'StockQuantity' => '45',
                'image' => 'Adidas_tshirt.jpg',
                'CategoryID' => $tshirtCategoryID
            ], 
            [
                'ProductName' => 'Lacoste T-shirt',
                'Description' => 'Pink Lacoste T-Shirt',
                'Price' => '7.99',
                'StockQuantity' => '90',
                'image' => 'lacoste_tshirt.jpg',
                'CategoryID' => $tshirtCategoryID
            ], 
            [
                'ProductName' => 'Under Armour T-shirt',
                'Description' => 'Light blue Under Armour T-Shirt',
                'Price' => '17.99',
                'StockQuantity' => '10',
                'image' => 'underarmour_tshirt.webp',
                'CategoryID' => $tshirtCategoryID
            ], 
            
            // Tracksuits
            [
                'ProductName' => 'Champion Tracksuit',
                'Description' => 'Black, red and white Champion Tracksuit',
                'Price' => '35.99',
                'StockQuantity' => '35',
                'image' => 'champion_tracksuit.jpg',
                'CategoryID' => $tracksuitCategoryID
            ], 
            [
                'ProductName' => 'Donnay Tracksuit',
                'Description' => 'Pink and black Donnay Tracksuit',
                'Price' => '19.99',
                'StockQuantity' => '25',
                'image' => 'donnay_tracksuit.jpg',
                'CategoryID' => $tracksuitCategoryID
            ], 
            [
                'ProductName' => 'Adidas Tracksuit',
                'Description' => 'Black Adidas Tracksuit',
                'Price' => '30.99',
                'StockQuantity' => '15',
                'image' => 'Adidas_tracksuit.jpg',
                'CategoryID' => $tracksuitCategoryID
            ], 
            [
                'ProductName' => 'Trapstar Tracksuit',
                'Description' => 'Beige Trapstar Tracksuit',
                'Price' => '10.99',
                'StockQuantity' => '40',
                'image' => 'trapstar_tracksuit.jpg',
                'CategoryID' => $tracksuitCategoryID
            ], 
            [
                'ProductName' => 'Nike Tracksuit',
                'Description' => 'Grey Nike Tracksuit',
                'Price' => '25.99',
                'StockQuantity' => '42',
                'image' => 'nike_tracksuit.webp',
                'CategoryID' => $tracksuitCategoryID
            ], 
            
            // Jackets
            [
                'ProductName' => 'Columbia Jacket',
                'Description' => 'Blue Columbia Jacket',
                'Price' => '25.99',
                'StockQuantity' => '14',
                'image' => 'columbia_jacket.jpg',
                'CategoryID' => $jacketsCategoryID
            ], 
            [
                'ProductName' => 'The North Face Jacket',
                'Description' => 'Black The North Face Puffer Jacket',
                'Price' => '35.99',
                'StockQuantity' => '35',
                'image' => 'northface_jacket.jpg',
                'CategoryID' => $jacketsCategoryID
            ], 
            [
                'ProductName' => 'Nike Tracksuit',
                'Description' => 'Grey Nike Tracksuit',
                'Price' => '25.99',
                'StockQuantity' => '42',
                'image' => 'nike_tracksuit.webp',
                'CategoryID' => $jacketsCategoryID
            ], 
            [
                'ProductName' => 'Nike Tracksuit',
                'Description' => 'Grey Nike Tracksuit',
                'Price' => '25.99',
                'StockQuantity' => '42',
                'image' => 'nike_tracksuit.webp',
                'CategoryID' => $jacketsCategoryID
            ], 
            [
                'ProductName' => 'Nike Tracksuit',
                'Description' => 'Grey Nike Tracksuit',
                'Price' => '25.99',
                'StockQuantity' => '42',
                'image' => 'nike_tracksuit.webp',
                'CategoryID' => $jacketsCategoryID
            ], 
            
            // Shoes
            [
                'ProductName' => 'Nike Dunk',
                'Description' => 'Black with blue Nike Dunk',
                'Price' => '80.99',
                'StockQuantity' => '18',
                'image' => 'dunk.jpg',
                'CategoryID' => $shoesCategoryID
            ], 
            [
                'ProductName' => 'Black Jordans',
                'Description' => 'Black with red and blue Jordan',
                'Price' => '75.99',
                'StockQuantity' => '12',
                'image' => 'jordans.jpg',
                'CategoryID' => $shoesCategoryID
            ], 
            [
                'ProductName' => 'Nike Airmax',
                'Description' => 'Black with green Nike Airmax',
                'Price' => '85.99',
                'StockQuantity' => '14',
                'image' => 'airmax.jpg',
                'CategoryID' => $shoesCategoryID
            ], 
            [
                'ProductName' => 'New Balance',
                'Description' => 'White New Balance 530',
                'Price' => '99.99',
                'StockQuantity' => '8',
                'image' => 'newbalance.jpg',
                'CategoryID' => $shoesCategoryID
            ], 
            [
                'ProductName' => 'Converse',
                'Description' => 'Black Converse',
                'Price' => '60.99',
                'StockQuantity' => '2',
                'image' => 'converse.jpg',
                'CategoryID' => $shoesCategoryID
            ], 
            
            // Bags
            [
                'ProductName' => 'Nike Tracksuit',
                'Description' => 'Grey Nike Tracksuit',
                'Price' => '25.99',
                'StockQuantity' => '42',
                'image' => 'nike_tracksuit.webp',
                'CategoryID' => $bagsCategoryID
            ], 
            [
                'ProductName' => 'Nike Tracksuit',
                'Description' => 'Grey Nike Tracksuit',
                'Price' => '25.99',
                'StockQuantity' => '42',
                'image' => 'nike_tracksuit.webp',
                'CategoryID' => $bagsCategoryID
            ], 
            [
                'ProductName' => 'Nike Tracksuit',
                'Description' => 'Grey Nike Tracksuit',
                'Price' => '25.99',
                'StockQuantity' => '42',
                'image' => 'nike_tracksuit.webp',
                'CategoryID' => $bagsCategoryID
            ], 
            [
                'ProductName' => 'Nike Tracksuit',
                'Description' => 'Grey Nike Tracksuit',
                'Price' => '25.99',
                'StockQuantity' => '42',
                'image' => 'nike_tracksuit.webp',
                'CategoryID' => $bagsCategoryID
            ], 
            [
                'ProductName' => 'Nike Tracksuit',
                'Description' => 'Grey Nike Tracksuit',
                'Price' => '25.99',
                'StockQuantity' => '42',
                'image' => 'nike_tracksuit.webp',
                'CategoryID' => $bagsCategoryID
            ], 
            
        ];

        // Loop through each tuple and create a record in the database
        foreach ($productsData as $data) {
            Product::create($data);
        }
    }
}
