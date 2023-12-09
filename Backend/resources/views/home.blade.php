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
    <header>
        
            
                <div id="header">
                    <div class="container1">
                        <nav>
                            <a href="{{ route('home') }}"><img src="{{ asset('assets/sources/logo2.png') }}" class="logo"></a>
                            
                                <ul>
                                    <li>    <form action="{{ url('/search') }}" method="GET" role="search">
                                            <div class="input-group">                                  
                                                <input type="search" name="search" placeholder=" Products...">
                                                <button class="btn bg-white" type="submit">
                                                    <i>search<i>
                                            </div>
                                        </form>
                                    </li>
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li><a href="#">Products</a></li>
                                    <li class="active"><a href="contact-us">Contact Us</a></li>
                                    <li><a href="{{ route('about_us') }}">About Us</a></li>
                                
                                    @guest
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    @if (Route::has('register'))
                                        <li><a href="{{ route('register') }}">Register</a></li>
                                    @endif
                                    @else
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="mdi mdi-logout text-primary"></i> Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                    <li><a href="a">Account</a></li>
                                    @endguest
                                
                                <li><a href="{{ route('basket') }}"><i class="fa-solid fa-basket-shopping"></i></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
        </header>

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
    <h3 class="menuItem">Men</h3>
    <h3 class="menuItem">Women</h3>
    <h3 class="menuItem">Children</h3>
    <h3 class="menuItem">Gym & Equipment</h3>
    <h3 class="menuItem">Accessories</h3>
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
                    <h2 class="productPrice">${{ $product->Price }}</h2>
                    <p class="productDesc">{{ $product->Description }}</p>
                    <button class="productButton" onclick="redirectToBasket()">BUY NOW!</button>
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

<footer>
            <p>
                <a href="contact_us.html">Contact us</a><br>
                Telephone: +44 123435390 <br>
                Email: sportifypromax@gmail.com
                
            </p>
        <p>
            <a href="{{ route('about_us') }}">About us</a><br>
            Address: Aston St, Birmingham B4 7ET
        </p>
        <p>
            
            <a href="https://www.instagram.com/">Instagram</a><br>
            <a href="https://en-gb.facebook.com/">Facebook</a><br>
            <a href="https://twitter.com/login">X</a>
        </p>
    </footer>
</body>
</html>
