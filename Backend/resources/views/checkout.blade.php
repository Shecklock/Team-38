<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
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

        <div class="form">
            <div class="checkout-info">
                <h1 class="title"><a href="basket" class="title-link"><i class="fa-solid fa-arrow-left"></i> Back to Basket</a></h1>

                <h3 class="title">Billing Information</h3>
                <div class="billing-info">
                    <div class="input-container">
                        <input type="text" name="name" placeholder="Full Name" class="input_billing" required>
                        <span>Name</span>
                    </div>
                    <div class="input-container">
                        <input type="text" name="address" placeholder="Billing Address" class="input_billing" required>
                        <span>Address</span>
                    </div>
                    <div class="input-container">
                        <input type="text" name="city" placeholder="City" class="input_billing" required>
                        <span>City</span>
                    </div>
                    <div class="input-container">
                        <input type="text" name="postcode" placeholder="Post Code" class="input_billing" required>
                        <span>PostCode</span>
                    </div>
                    <div class="input-container">
                        <input type="email" name="email" placeholder="Email" class="input_billing" required>
                        <span>Email</span>
                    </div>
                </div>

                <div class="social-media">
                    <p>Accepted Payment Methods :</p>
                    <!-- Social Media Icons -->
                    <div class="social-icons">
                        <a href="#">
                            <i class="fa-brands fa-cc-mastercard"></i>
                        </a>
                        <a href="#">
                            <i class="fa-brands fa-cc-visa"></i>
                        </a>
                        <a href="#">
                            <i class="fa-brands fa-paypal"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="checkout-form">
                <span class="circle one"></span>
                <span class="circle two"></span>

                <form action="checkout" autocomplete="off">
                    <h3 class="title">Card Details</h3>
                    <div class="input-container">
                        <input type="text" name="name" placeholder="Name On Card" class="input" required>
                        <span>Name</span>
                    </div>
                    <div class="input-container">
                        <input type="text" name="carddetails" placeholder="Card Number" class="input" required>
                        <span>Card Details</span>
                    </div>
                    <div class="input-container">
                        <input type="text" name="expirydate" placeholder="Expiration Date: MM/YY" class="input" required>
                        <span>Expiration Date</span>
                    </div>
                    <div class="input-container">
                        <input type="text" name="cvv" placeholder="CVV" class="input" required>
                        <span>CVV</span>
                    </div>
                    <input type="submit" value="Proceed" class="btn" />
                </form>
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
