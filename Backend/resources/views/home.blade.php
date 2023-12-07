<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home-Page</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style2.css') }}">
    <script src="{{ asset('assets/js/contact.js') }}"></script>
    <script src="https://kit.fontawesome.com/155df07167.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div id="header">
            <div class="container1">
                <nav>
                    <a href="home"><img src="{{ asset('assets/sources/logo2.png') }}" class="logo"></a>
                    <ul>
                    <!-- Nav Bar -->
                    <li><input type="text" placeholder="Search.."></li>
                    <li><a href="home">Home</a></li>
                    <li><a href="#">Products</a></li>
                    <li class="active"><a href="contact-us">Contact Us</a></li>
                    <li><a href="about-us">About Us</a></li>
                    <li><a href="#">Account</a></li>
                    <li><a href="basket"><i class="fa-solid fa-basket-shopping"></i></a></li>
                    <!-- Nav Bar -->
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <div class="navBottom">
        <h3 class="menuItem">Men</h3>
        <h3 class="menuItem">Women</h3>
        <h3 class="menuItem">Children</h3>
        <h3 class="menuItem">Gym & Equipment</h3>
        <h3 class="menuItem">Accessories</h3>
    </div>


    <nav>
    <div class="product" id="product">
        @foreach($products as $product)
            <div class="productItem">
                <div class="productDetails">
                <img src="{{ asset('uploads/product/' . $product->image) }}" alt="" class="productImg" height="100px">
                    <h1 class="productTitle">{{ $product->ProductName }}</h1>
                    <h2 class="productPrice">${{ $product->Price }}</h2>
                    <p class="productDesc">{{ $product->Description }}</p>
                    <button class="productButton">BUY NOW!</button>
                </div>
            </div>
        @endforeach
    </div>
</nav>

    <footer>
        <p>
            <a href="contact-us">Contact us</a><br>
            Telephone: +44 123435390 <br>
            Email: sportifypromax@gmail.com
        </p>
        <p>
            <a href="about-us">About us</a><br>
            Address: Aston St, Birmingham B4 7ET
        </p>
        <p>
            <a href="faqs">FAQs</a><br>
            <a href="https://www.instagram.com/">Instagram</a><br>
            <a href="https://en-gb.facebook.com/">Facebook</a><br>
            <a href="https://twitter.com/login">X</a>
        </p>
    </footer>
</body>
</html>
