<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


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
            $product->image = $filename;
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

    public function update(Request $request, $id)
{
    $request->validate([
        'ProductName' => 'required|string',
        'Description' => 'required|string',
        'Price' => 'required|numeric',
        'CategoryID' => 'required|exists:categories,CategoryID',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $product = Product::find($id);
    $product->ProductName = $request->input('ProductName');
    $product->Description = $request->input('Description');
    $product->Price = $request->input('Price');
    $product->CategoryID = $request->input('CategoryID');

    // Check if a new image is uploaded
    if ($request->hasFile('image')) {
        // Delete the old image file
        if ($product->image) {
            Storage::delete('uploads/product/' . $product->image);
        }
        // Upload the new image file
        $file = $request->file('image');
        $filename = $file->getClientOriginalName(); // Consider renaming to avoid conflicts
        $file->move(public_path('uploads/product'), $filename);
        $product->image = $filename;
    }

    $product->save();

    return redirect()->route('products.index')->with('success', 'Product updated successfully.');
}


   public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }

   

   //search the product in the for the Customer side
   public function search(Request $request)
{
    $searchTerm = $request->input('search');

    if ($searchTerm) {
        $search = Product::where('ProductName', 'LIKE', '%' . $searchTerm . '%')
            ->orWhereHas('category', function ($query) use ($searchTerm) {
                $query->where('CategoryName', 'LIKE', '%' . $searchTerm . '%');
            })
            ->latest()
            ->paginate(15);
    } else {
        // The se
        $search = collect();
    }

    return view('search', compact('search', 'searchTerm'));
}
}




