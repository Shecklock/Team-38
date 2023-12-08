<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/basket.css') }}">
    <script src="{{ asset('assets/js/contact.js') }}"></script>
    <script src="https://kit.fontawesome.com/155df07167.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <div id="header">
            <div class="container1">
                <nav>
                    <a href="{{ url('/') }}"><img src="{{ asset('assets/sources/logo2.png') }}" class="logo"></a>
                    <ul>
                        <!-- Nav Bar -->
                        <li><input type="text" placeholder="Search.."></li>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('/products') }}">Products</a></li>
                        <li class="active"><a href="{{ url('contact_us.html') }}">Contact Us</a></li>
                        <li><a href="{{ url('about_us.html') }}">About Us</a></li>
                        <li><a href="{{ url('/account') }}">Account</a></li>
                        <li><a href="{{ url('/basket') }}"><i class="fa-solid fa-basket-shopping"></i></a></li>
                        <!-- Nav Bar -->
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- basket.blade.php -->

<div class="my-bag" id="product">>
    <h2>My Bag </h2>

    @foreach($products as $product)
        <div class="bag-item">
            <img src="{{ asset('uploads/product/' . $product->image) }}" alt="{{ $product->ProductName }}">
            <div class="item-info">
                <h3>{{ $product->ProductName }}</h3>
                <p>{{ $product->Description }}</p>
            </div>
            <button class="remove-btn">Remove</button>
        </div>
    @endforeach

    <div class="delivery-info">
        <h3>Checkout securely</h3>
        <p>Basket Total: £280.00</p>
        <a href="#" class="btn-btn-primary">Proceed to Checkout</a>
    </div>
</div>
</body>

<footer>
    <p>
        <a href="{{ url('contact_us.html') }}">Contact us</a><br>
        Telephone: +44 123435390 <br>
        Email: sportifypromax@gmail.com
    </p>
    <p><a href="{{ url('about_us.html') }}">About us </a><br>
        Address: Aston St, Birmingham B4 7ET</p>
    <p>
        <a href="{{ url('faqs.html') }}">FAQs</a><br>
        <a href="https://www.instagram.com/">Instagram</a><br>
        <a href="https://en-gb.facebook.com/">Facebook</a><br>
        <a href="https://twitter.com/login">X</a>
    </p>
</footer>
</html>
