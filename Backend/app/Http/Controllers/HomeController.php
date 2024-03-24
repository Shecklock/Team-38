<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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
             
             return view('home', ['products' => $products]);
         }

         public function filterByPrice(Request $request)
        {
             $minPrice = $request->input('min_price');
             $maxPrice = $request->input('max_price');

             $products = Product::whereBetween('price', [$minPrice, $maxPrice])->get();

             return view('home', ['products' => $products]);
        }
      }
     
