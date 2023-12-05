<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Log;


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
        $categories = Category::all(); // Fetch categories from the database
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
{
    // Validate the request
    $request->validate([
        'ProductName' => 'required',
        'Description' => 'required',
        'image' => 'required|image',
        'Price' => 'required',
        'CategoryID' => 'required',
    ]);

    try {
        // Create a new product instance
        $product = new Product();
        $product->ProductName = $request->input('ProductName');
        $product->Description = $request->input('Description');
        $product->Price = $request->input('Price');
        $product->CategoryID = $request->input('CategoryID');

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName(); // Consider renaming to avoid conflicts
            $file->move('uploads/product/', $filename); // Move the uploaded file to the desired location
            $product->image = 'uploads/product/' . $filename; // Store the path to the image in the database
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    } catch (\Exception $e) {
        Log::error('Failed to create product: ' . $e->getMessage());
        return redirect()->route('products.index')->with('error', 'Failed to create product: ' . $e->getMessage());
    }
}


    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all(); // Fetch categories from the database
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
{
    $request->validate([
        'ProductName' => 'required',
        'Description' => 'required',
        'Price' => 'required',
        'CategoryID' => 'required',
    ]);

    try {
        $product->ProductName = $request->input('ProductName');
        $product->Description = $request->input('Description');
        $product->Price = $request->input('Price');
        $product->CategoryID = $request->input('CategoryID');

        // Handle image update
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName(); // Consider renaming to avoid conflicts
            $file->move('uploads/product/', $filename); // Move the uploaded file to the desired location
            $product->image = 'uploads/product/' . $filename; // Update the path to the image in the database
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    } catch (\Exception $e) {
        Log::error('Failed to update product: ' . $e->getMessage());
        return redirect()->route('products.index')->with('error', 'Failed to update product: ' . $e->getMessage());
    }
}

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
