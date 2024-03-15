<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecommerce Product View Design</title>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/viewproducts.css') }}">
</head>


<header>
    @include('header')
</header>


<body>
        <div class="py-3 py-md-5 bg-light">
            <div class="container">
                <div class="row">
                    <!-- Product Image Column -->
                    <div class="col-md-4 mt-3">
                        <div class="bg-white border">
                            <img src="{{ asset('uploads/product/' . $product->image) }}" alt="" class="productImg" style="width: 100%; height: auto;">

                <!-- Product Purchasing Details Column -->
                <div class="col-md-4 mt-3">
                    <div class="product-view">
                        <h1 class="productTitle">{{ $product->ProductName }}
                            <label class="label-stock bg-success">In Stock</label>
                        </h1>
                        <hr>
                        <p class="product-path">
                            <a href="{{ url('/search?search=Men') }}" class="path-link">Men</a> /
                            <a href="{{ url('/search?search=Women') }}" class="path-link">Women</a> /
                            <a href="{{ url('/search?search=Trainers') }}" class="path-link">Trainers</a> /
                            <a href="{{ url('/search?search=Accessories') }}" class="path-link">Accessories</a>
                        </p>
                        <div>
                            <span class="productPrice">£{{ $product->Price }}</span>
                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1"><i class="fa fa-minus"></i></span>
                                {{-- <input type="text" value="1" class="input-quantity" /> --}}
                                <input type="number" name="quantity" class="input-quantity" value="{{ $item['quantity'] ?? 1 }}" min="1">
                                <span class="btn btn1"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <a href="{{ route('add-to-basket', ['productId' => $product->ProductID]) }}" class="btn btn1"> <i class="fa fa-shopping-cart"></i> Add To Cart</a>
                        </div>
                        <div class="mt-3">
                            <p class="productDesc">{{ $product->Description }}</p>

                        </div>
                    </div>
                    
                <!-- Previous Reviews Row -->
                <div class="row mt-3">
        <div class="col-12">
            <div class="reviews">
                <div class="CustomerRev">
                    <hr>
                    <h3>Customer Reviews</h3>
                    <hr>
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
                                            <span class="star filled" data-value="{{ $i }}">&#9733;</span>
                                        @else
                                            <span class="star" data-value="{{ $i }}">&#9733;</span>
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
</head>

<footer>
    @include('footer')
</footer>

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
