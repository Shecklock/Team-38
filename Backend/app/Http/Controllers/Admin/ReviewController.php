<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Review; // Import the Review model

class ReviewController extends Controller
{
    public function store(Request $request, $product_id)
    {
    // Validate the request data
    $validatedData = $request->validate([
        'reviewer-name' => 'required|max:255',
        'review-text' => 'required',
        'rating' => 'required|integer|min:1|max:5', // Add validation for rating
    ]);

    // Create a new review instance and set its properties
    $review = new Review();
    $review->product_id = $product_id;
    $review->reviewer_name = $request->input('reviewer-name');
    $review->review_text = $request->input('review-text');
    $review->rating = $request->input('rating'); 

    // Save the review to the database
    $review->save();

    // Redirect back to the previous page with a success message
    return back()->with('success', 'Review submitted successfully.');
    }   



    public function show($product_id)
{
    $product = Product::with('reviews')->findOrFail($product_id);
    return view('product.show', compact('product'));
}


}
