<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductSize; // Import the ProductSize model

class ProductSizeController extends Controller
{ 
    public function index()
	{
    	$productSizes = ProductSize::with('product', 'size')->get(); // Retrieve all product sizes with associated products and sizes
   	    return view('products.sizes.index', compact('productSizes'));
	}
}
