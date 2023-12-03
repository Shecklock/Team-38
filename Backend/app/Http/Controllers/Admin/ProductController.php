<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.products.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
{
    // Validate the request
    $request->validate([
        'ProductName' => 'required',
        'Description' => 'required',
        'image' => 'required|image',
        'Price' => 'required',
    ]);

    try {
        // Create a new product instance
        $product = new Product();
        $product->ProductName = $request->input('ProductName');
        $product->Description = $request->input('Description');
        $product->Price = $request->input('Price');

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $file->getClientOriginalName();
            $file->move('uploads/product/', $filename);
            $product->image = $filename;
        }

        // Save the product
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    } catch (\Exception $e) {
        // Handle exceptions (e.g., database errors) and redirect with an error message
        return redirect()->route('products.index')->with('error', 'Failed to create product: ' . $e->getMessage());
    }
}

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
