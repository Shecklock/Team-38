<script src="{{ asset('js/reviews.js') }}"></script>

{{-- Review Submission Section --}}
<div class="col-md-4 mt-3">
    <div class="reviews">
        <h2>Write a Review</h2>
        <form id="review-form" action="{{ route('reviews.store', ['product_id' => $product->ProductID]) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="reviewer-name" class="form-label">Your Name</label>
                <input type="text" class="form-control" name="reviewer-name" required>
            </div>
            <div class="mb-3">
                <label for="review-text" class="form-label">Your Review</label>
                <textarea class="form-control" name="review-text" rows="3" required></textarea>
            </div>
            <div class="star-rating mb-3">
                @for ($i = 1; $i <= 5; $i++)
                    <span class="star" data-value="{{ $i }}">&#9733;</span>
                @endfor
                <input type="hidden" name="rating" id="rating" value="">
            </div>
            <button type="submit" class="btn btn-primary">Submit Review</button>
        </form>
    </div>
</div>

{{-- Customer Reviews Section --}}
<div class="row mt-3">
    <div class="col-12">
        <div class="reviews">
            <div class="CustomerRev">
                <h3>Customer Reviews</h3>
            </div>
            <div class="row">
                @forelse ($product->reviews()->latest()->take(3)->get() as $review)
                    <div class="col-md-4">
                        <div class="review">
                            <h4>{{ $review->reviewer_name }}</h4>
                            <div class="review-text">
                                <p>{{ $review->review_text }}</p>
                            </div>
                            <div class="previous-star-rating">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $review->rating)
                                        <span class="star filled">&#9733;</span>
                                    @else
                                        <span class="star">&#9733;</span>
                                    @endif
                                @endfor
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="col-12">No reviews yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
