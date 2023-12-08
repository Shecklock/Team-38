<!-- resources/views/search.blade.php -->


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



<nav>
    <div class="product" id="product">
        @foreach($search as $product)
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

