<!DOCTYPE html>
<html lang="en">

<header>
    @include('header')
</header>


<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home-Page</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style2.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="{{ asset('js/contact.js') }}"></script>
    <script src="https://kit.fontawesome.com/155df07167.js" crossorigin="anonymous"></script>
</head>
<body>
    


<!-- Add a slider section at the top -->
<div class="slider-container">
    <div class="slider">
        <div class="slider-item"><img src="{{ asset('admin/images/tracksuit.jpg') }}" alt="Banner 1" height="150px" class="center"></div>
        <div class="slider-item"><img src="{{ asset('admin/images/womens tracksuit.jpg') }}" alt="Banner 2" height="150px"></div>
        <div class="slider-item"><img src="{{ asset('admin/images/jacket.jpg') }}" alt="Banner 3" height="150px"></div>
        <!-- Add more banner images as needed -->
    </div>
</div>

<!-- Rest of your existing content -->

<div class="navBottom">
	@foreach ($categories as $category)
		<a href="{{ url('/search?search=' . $category->CategoryName) }}"><h3 class="menuItem">{{ $category->CategoryName }}</h3></a>
	@endforeach
</div>




<script>
    // Initialize the slider with dots set to false
    $(document).ready(function(){
        $('.slider').slick({
            autoplay: true,
            dots: false, // Hide the dots
            infinite: true,
            speed: 500,
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: true,
            centerPadding: '0', // Adjust this value to control space around the centered image
        });
    });
</script>

    
    <div class="product" id="product">
        @foreach($products as $product)
			@if ($loop->iteration >5)
				@break
			@else
            <div class="productItem">
                <div class="productDetails">
                    <a href="{{ route('productshow', ['product' => $product] )}}">
                    <img src="{{ asset('uploads/product/' . $product->image) }}" alt="" class="productImg" height="100px">
                    </a>
                    <h1 class="productTitle">{{ $product->ProductName }}</h1>
                    <h2 class="productPrice">£{{ $product->Price }}</h2>
                    <p class="productDesc">{{ $product->Description }}</p>

                    <a href="{{ route('productshow', ['product' => $product] )}}" class="productButton">BUY NOW!</a>

                </div>
            </div>
			@endif
        @endforeach
    </div>


<script>
    function redirectToBasket() {
        window.location.href = "{{ route('basket') }}";
    }
</script>

<footer>
    
    @include('footer')
</footer>

</body>
</html>
