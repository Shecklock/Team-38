<!DOCTYPE html>
<html lang="en">

<header>
    @include('header')
</header>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="{{ asset('assets/css/style2.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/155df07167.js" crossorigin="anonymous"></script>
</head>
<header>
        


    <div class="container">
        <span class="big-circle"></span>

        <div class="form">
            <div class="checkout-info">
                <h1 class="title"><a href="{{ route('basket') }}" class="title-link"><i class="fa-solid fa-arrow-left"></i> Back to Basket</a></h1>

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

                <form action="{{ url('checkout.html') }}" autocomplete="off">
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
                    <button type="submit">Proceed to Checkout</button>
                </form>
            </div>
        </div>
    </div>
    <footer>
        @include('footer')
    </footer>

</body>
</html>
