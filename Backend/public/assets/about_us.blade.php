<!DOCTYPE html>
<html lang="en">

<head>
    <title>About Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/about.css') }}">
    <script src="https://kit.fontawesome.com/155df07167.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <div id="header">
            <div class="container1">
                <nav>
                    <a href="{{ url('/') }}"><img src="{{ asset('sources/logo2.png') }}" class="logo"></a>
                    <ul>
                        <!-- Nav Bar -->
                        <li><input type="text" placeholder="Search.."></li>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Products</a></li>
                        <li class="active"><a href="{{ route('contact') }}">Contact Us</a></li>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="#">Account</a></li>
                        <li><a href="{{ url('basket.html') }}"><i class="fa-solid fa-basket-shopping"></i></a></li>
                    </ul>
                    <!-- Nav Bar -->
                </nav>
            </div>
        </div>
    </header>

    <div class="About-Us">
        <h2>About Our Company</h2>
        <hr size="5"><br><br>
        <h3>Who we are and what we do</h3>
        <p>Founded in 2019, we are the ultimate destination for sports enthusiasts,
            offering a curated selection of top-quality sneakers, apparel, and equipment<br>
            We're here to elevate your game, whether you're a seasoned pro athlete or just starting out<br>
            Our commitment is simple: to equip your passion and provide top-quality products for all our athletes..
        </p>
    </div>

    <div class="team-section">
        <div class="container">
            <div class="row">
                <div class="Our-team">
                    <h1>Our team</h1>
                    <hr size="5">
                </div>
            </div>
            <div class="team-profiles">
                <!-- Team members section (similar structure) -->
            </div>
        </div>
    </div>

    <footer>
        <p>
            <a href="{{ route('contact') }}">Contact us</a><br>
            Telephone: +44 123435390 <br>
            Email: sportifypromax@gmail.com

        </p>
        <p>
            <a href="{{ route('about') }}">About us</a><br>
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
