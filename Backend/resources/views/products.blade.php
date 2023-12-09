@extends('shop')

@section('content')

<body>
    <header>
        <div id="header">
            <div class="container1">
                <nav>
                    <a href="{{ route('home') }}"><img src="{{ asset('assets/sources/logo2.png') }}" class="logo"></a>
                    <ul>
                        <li><input type="text" placeholder="Search.."></li>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="#">Products</a></li>
                        <li><a href="{{ route('about_us') }}">About Us</a></li>
                        <li><a href="a">Account</a></li>
                        <li><a href="{{ route('basket') }}"><i class="fa-solid fa-basket-shopping"></i></a></li>
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
<div class="row"  id="product">
    @foreach($products as $product)
        <div class="col-md-3 col-6 mb-4">
            <div class="card">
                <img src="{{  asset('uploads/products/' .$product->images) }}" class="card-img-top" alt="{{ $product->name }} Image"/>
                <div class="card-body">
                    <h4 class="card-title">{{ $product->ProductName }}</h4>
                    <p>{{ $product->Description }}</p>
                    <p class="card-text"><strong>Price:</strong> ${{ $product->price }}</p>
                    <button class="productButton">
                        <a href="{{ route('add-to-basket', ['productId' => $product->ProductID]) }}">BUY NOW!</a>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </nav>

@endsection

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
