<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

         public function index()
         {
             $products = Product::all(); // Fetch all products from the database
             $categories = Category::all(); // Fetch all categories from the database
         	
             return view('home', ['products' => $products, 'categories' => $categories]);
         }

    public function filterByPrice(Request $request)
    {
        try {
            $minPrice = $request->input('min_price');
            $maxPrice = $request->input('max_price');
        	
        	if (!$minPrice) { $minPrice = 0; }
        	if (!$maxPrice) { $maxPrice = 9999; }

            // Validation
            $request->validate([
                'min_price' => 'nullable|numeric',
                'max_price' => 'nullable|numeric',
            ]);

            // Debug
            Log::info('Min Price: ' . $minPrice);
            Log::info('Max Price: ' . $maxPrice);

            $products = Product::whereBetween('price', [$minPrice, $maxPrice])->get();

            // Debug
            Log::info('Products Count: ' . count($products));

            return view('products', ['products' => $products]);
        } catch (\Exception $e) {
            // Log any errors for debugging
            Log::error($e->getMessage());
            return back()->withError('An error occurred while filtering products.');
        }
    }
}

