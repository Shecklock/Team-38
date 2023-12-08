<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basket</title>
    <link href="{{ asset('assets/css/style2.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/155df07167.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="header">
        <div class="container1">
            <nav>
                <a href="{{ url('index.html') }}"><img src="{{ asset('sources/logo2.png') }}" class="logo"></a>
                <ul>
                    <!-- Nav Bar -->
                    <li><input type="text" placeholder="Search.."></li>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Products</a></li>
                    <li class="active"><a href="{{ url('contact_us.html') }}">Contact Us</a></li>
                    <li><a href="{{ url('about_us.html') }}">About Us</a></li>
                    <li><a href="#">Account</a></li>
                    <li><a href="{{ url('basket.html') }}"><i class="fa-solid fa-basket-shopping"></i></a></li>
                    <!-- Nav Bar -->
                </ul>
            </nav>
        </div>
    </div>

    <div class="container">
        <span class="big-circle"></span>

        <div class="form_basket">
            

                <h3 class="title">Your Basket</h3>


                <div class="total">
                    <p>Total:</p>
                    <button class="btn_basket" onclick="redirectToCheckout()">Proceed to Checkout</button>

                    <script>
                        function redirectToCheckout() {
                            window.location.href = "{{ url('checkout.html') }}";
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
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
