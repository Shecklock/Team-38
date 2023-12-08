<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BasketController extends Controller
{
    /**
     * Display the contents of the basket.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // You can retrieve and display the basket contents here
        return view('basket');
    }

    /**
     * Show the basket with product data.
     *
     * @return \Illuminate\Http\Response
     */
    public function showBasket()
    {
        $productId = request('productId');
        $products = DB::table('products')->get(); // Adjust this based on your database structure
        
        return view('basket', compact('products'));
    }
    
    
}
