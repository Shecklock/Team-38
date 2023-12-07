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

    <div class="container">
        <span class="big-circle"></span>

        <div class="form_basket">

            <div class="checkout-info">
                <h3 class="title">Your Basket</h3>

                <div class="total">
                    <p>Total:</p>
                    <button class="btn_basket" onclick="redirectToCheckout()">Proceed to Checkout</button>

                    <script>
                        function redirectToCheckout() {
                            window.location.href = "checkout";
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p>
            <a href="contact-us">Contact us</a><br>
            Telephone: +44 123435390 <br>
            Email: sportifypromax@gmail.com
        </p>
        <p>
            <a href="about-us">About us </a><br>
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
