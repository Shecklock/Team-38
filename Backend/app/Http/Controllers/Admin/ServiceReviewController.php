<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceReview; // Make sure to use your ServiceReview model

class ServiceReviewController extends Controller
{
    // Store a new review
    public function store(Request $request)
    {
        $request->validate([
            'reviewer-name' => 'required|string|max:255',
            'review-text' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $review = new ServiceReview();
        $review->reviewer_name = $request->input('reviewer-name');
        $review->review_text = $request->input('review-text');
        $review->rating = $request->input('rating');
        $review->save();

        return back()->with('success', 'Review submitted successfully!');
    }

    // Fetch and display reviews
    public function index()
    {
       // Fetch the latest service reviews
     $serviceReviews = ServiceReview::latest()->get(); // Or use paginate() for lots of reviews.
    return view('about_us', ['serviceReviews' => $serviceReviews]);
    }
}
