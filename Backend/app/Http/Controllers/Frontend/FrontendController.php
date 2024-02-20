<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontEndController extends Controller 
{
    public function products($products)
    {
        $product = Product::where('products', $categories)->first();
        if($categories) {
            return view('products.index', compact('categories'));
        } else {
            return redirect()->back();
        }
    }

    public function productView(Product $product) 
    {
            return view('viewproduct', ['product' => $product]);
    }
}

