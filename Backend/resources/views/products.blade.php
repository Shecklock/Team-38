<!DOCTYPE html>
<html lang="en">

<head>
    <title>Products</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/products.css') }}">
    <script src="https://kit.fontawesome.com/155df07167.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <div id="header">
            <div class="container1">
                <nav>
                    <a href="{{ url('index') }}"><img src="sources/logo2.png" class="logo"></a>
                    <ul>
                        <!-- Nav Bar -->
                        <li><input type="text" placeholder="Search.."></li>
                        <li><a href="{{ url('a') }}">Home</a></li>
                        <li><a href="{{ url('a') }}">Products</a></li>
                        <li class="active"><a href="{{ url('contact_us') }}">Contact Us</a></li>
                        <li><a href="{{ url('about_us') }}">About Us</a></li>
                        <li><a href="{{ url('a') }}">Account</a></li>
                        <li><a href="{{ url('basket') }}"><i class="fa-solid fa-basket-shopping"></i></a></li>
                    </ul>
                    <!-- Nav Bar -->
                </nav>
            </div>
        </div>
    </header>
    <section class="Product-Intro">
        <h1>New arrivals</h1><br>
        <p>Newest arrivals for the winter season</p><br>
        <img src="sources/productPageImage.png" height="300"><br><br>
        <button>Shop now</button>
    </section>

    <section class="pro">
        <h1 class="pheading">Our products</h1>
        <div class="products">
            <!-- card start -->
            @for ($i = 0; $i < 6; $i++)
                <div class="card">
                    <div class="img"><img src="sources/productPageImage.png"></div>
                    <div class="description">Item1</div>
                    <div class="title">Lady items</div>
                    <div class="box">
                        <div class="price">£56</div>
                        <button class="btn">Buy</button>
                    </div>
                </div>
            @endfor
            <!-- card end -->
        </div>
    </section>

    <footer>
        <p>
            <a href="{{ url('contact_us') }}">Contact us</a><br>
            Telephone: +44 123435390 <br>
            Email: sportifypromax@gmail.com
        </p>
        <p>
            <a href="{{ url('about_us') }}">About us </a><br>
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
