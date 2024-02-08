<!DOCTYPE html>
<html lang="en">
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
    
<iframe src="header.html" width="100%" height="100" frameborder="0" scrolling="no"></iframe>

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
    <a href="{{ url('/search?search=Men') }}"><h3 class="menuItem">Men</h3></a>
    <a href="{{ url('/search?search=Women') }}"><h3 class="menuItem">Women</h3></a>
    <a href="{{ url('/search?search=Trainers') }}"><h3 class="menuItem">Trainers</h3></a>
    <a href="{{ url('/search?search=Accessories') }}"><h3 class="menuItem">Accessories</h3></a>
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

    <nav>
    <div class="product" id="product">
        @foreach($products as $product)
            <div class="productItem">
                <div class="productDetails">
                <img src="{{ asset('uploads/product/' . $product->image) }}" alt="" class="productImg" height="100px">
                    <h1 class="productTitle">{{ $product->ProductName }}</h1>
                    <h2 class="productPrice">£{{ $product->Price }}</h2>
                    <p class="productDesc">{{ $product->Description }}</p>

                    <button class="productButton">
                    <a href="{{ route('add-to-basket', ['productId' => $product->ProductID]) }}">BUY NOW!</a>
                    </button>

                </div>
            </div>
        @endforeach
    </div>
</nav>

<script>
    function redirectToBasket() {
        window.location.href = "{{ route('basket') }}";
    }
</script>


<<footer>
    <p>
        <a href="contact-us">Contact Us</a> <br>
        Telephone: +44 123435390
        Email: sportifypromax@gmail.com
    </p>
    <p>
        <a href="{{ route('about_us') }}">About Us</a> <br>
         Address: Aston St, Birmingham B4 7ET
    </p>
    <p>
        <a href="{{ url('faqs') }}">FAQs</a><br>
        <a href="https://www.instagram.com/">Instagram</a><br>
        <a href="https://en-gb.facebook.com/">Facebook</a><br>
        <a href="https://twitter.com/login">X</a>
    </p>
</footer>

</body>
</html>
