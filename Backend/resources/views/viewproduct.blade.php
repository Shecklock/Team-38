<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $product->ProductName }} Details</title>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/viewproducts.css') }}"> <!-- Update with your correct path -->
</head>
<body>

<header>
    @include('header') <!-- Ensure this includes your site's header -->
</header>

<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <!-- Product Details Section -->
            <div class="product-view-container">
                <!-- Product Image -->
                <div class="product-image-container">
                    <img src="{{ asset('uploads/product/' . $product->image) }}" alt="{{ $product->ProductName }}" class="img-fluid">
                </div>

                <!-- Product Purchasing Details -->
                <div class="product-details">
                    <h1>{{ $product->ProductName }}</h1>
                    @if($product->StockQuantity > 0)
                        <span class="label-stock bg-success">In Stock ({{ $product->StockQuantity }} available)</span>
                    @else
                        <span class="label-stock bg-danger">Out of Stock</span>
                    @endif
                    <div><span class="productPrice">£{{ $product->Price }}</span></div>
                    <p class="productDesc">{{ $product->Description }}</p>
                    
                    <!-- Quantity Selection and Add to Basket Form -->
                    <div class="add-to-basket-container">
                        <form action="{{ route('add-to-basket', ['productId' => $product->ProductID]) }}" method="POST">
                            @csrf
                            <input type="number" name="quantity" value="1" min="1" max="{{ $product->StockQuantity }}" class="input-quantity">
                            <button type="submit" class="add-to-basket-button"><i class="fa fa-shopping-cart"></i> Add To Cart</button>
                        </form>
                    </div>
                </div>

            <!-- Review Submission Column -->
            
        </div>
        
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

        <!-- Customer Reviews Row -->
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
    </div>
</div>

<footer>
    @include('footer') <!-- Ensure this includes your site's footer -->
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('#review-form .star-rating .star');

        stars.forEach(function(star, index) {
            star.addEventListener('mouseover', function() {
                // Highlight all stars up to the hovered one
                for (let i = 0; i <= index; i++) {
                    stars[i].classList.add('filled');
                }
                // Unhighlight stars beyond the hovered one
                for (let i = index + 1; i < stars.length; i++) {
                    stars[i].classList.remove('filled');
                }
            });

            star.addEventListener('click', function() {
                document.getElementById('rating').value = index + 1;
            });
        });

        document.getElementById('review-form').addEventListener('mouseleave', function() {
            let currentRating = document.getElementById('rating').value || 0;
            // Update stars to reflect the current rating
            stars.forEach((star, i) => {
                if (i < currentRating) {
                    star.classList.add('filled');
                } else {
                    star.classList.remove('filled');
                }
            });
        });
    });
</script>
</body>
</html>

