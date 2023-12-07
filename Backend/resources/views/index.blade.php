<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home-Page</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style2.css') }}">
    <script src="{{ asset('js/contact.js') }}"></script>
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
                        <li><a href="Home">Home</a></li>
                        <li><a href="a">Products</a></li>
                        <li class="active"><a href="contact_us">Contact Us</a></li>
                        <li><a href="about_us.html">About Us</a></li>
                        <li><a href="a">Account</a></li>
                        <li><a href="basket"><i class="fa-solid fa-basket-shopping"></i></a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                   <i class="mdi mdi-logout text-primary"></i> {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
            </div>
                    </ul>
                    <!-- Nav Bar -->
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
            <div class="productItem">
                <img src="{{ asset('assets/sources/shoes.jpg') }}" alt="" class="productImg" height="100px">
                <div class="productDetails">
                    <h1 class="productTitle">Product Title 1</h1>
                    <h2 class="productPrice">$99</h2>
                    <p class="productDesc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac urna eu felis dapibus condimentum.</p>
                    <button class="productButton">BUY NOW!</button>
                </div>
            </div>

            <div class="productItem">
                <img src="{{ asset('assets/sources/sports bag.jpeg') }}" alt="" class="productImg" height="100px">
                <div class="productDetails">
                    <h1 class="productTitle">Product Title 2</h1>
                    <h2 class="productPrice">$129</h2>
                    <p class="productDesc">Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
                    <button class="productButton">BUY NOW!</button>
                </div>
            </div>
        </div>
    </nav>

    <footer>
        <p>
            <a href="{{ url('contact_us.html') }}">Contact us</a><br>
            Telephone: +44 123435390 <br>
            Email: sportifypromax@gmail.com
        </p>
        <p>
            <a href="{{ url('about_us.html') }}">About us </a><br>
            Address: Aston St, Birmingham B4 7ET
        </p>
        <p>
            <a href="{{ url('faqs.html') }}">FAQs</a><br>
            <a href="https://www.instagram.com/">Instagram</a><br>
            <a href="https://en-gb.facebook.com/">Facebook</a><br>
            <a href="https://twitter.com/login">X</a>
        </p>
    </footer>
</body>
</html>
