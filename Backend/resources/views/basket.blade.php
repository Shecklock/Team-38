<!DOCTYPE html>
<html lang="en">

<header>
@include('header')
</header>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basket</title>
    <link href="{{ asset('assets/css/style2.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/155df07167.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/basket.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</body>
</html>
    
</head>
<body>

    </div>

    <div class="container">
        <span class="big-circle"></span>

        <div class="form_basket">

    <div class="checkout-info">
        <h3 class="title">Your Basket</h3>

        <!-- Display basket items -->
        <div class="basket-items">
    @php
        $totalPrice = 0; // Initialize the total price variable
    @endphp

    @if(count($basketItems) > 0)
        @foreach($basketItems as $key => $item)
            @if(is_array($item))
                <div class="basket-item">
                    @if(isset($item['image']))
                    <img src="{{ asset('/uploads/product/' . $item['image']) }}" alt="{{ $item['name'] ?? 'Unknown' }}" class="item-image">
                @else
                    <p>No image available</p>
                @endif
                <p>{{ $item['name'] ?? 'Unknown' }}</p>
                <p>${{ $item['price'] ?? 'Unknown' }}</p>
                    <!-- Quantity Update Form -->
                    <form action="{{ route('updateQuantity', ['itemId' => $key]) }}" method="POST">
                        @csrf
                        <input type="number" name="quantity" value="{{ $item['quantity'] ?? 1 }}" min="1">
                        <button type="submit">Update Quantity</button>
                    </form>


                    <!-- Remove Item Form -->
                    <form action="{{ route('removeItem', ['itemId' => $key]) }}" method="POST" class="remove-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="productButton">Remove</button>
                    </form>
                </div>
                @php
                    $totalPrice += ($item['price'] ?? 0) * ($item['quantity'] ?? 1);
                @endphp
            @else
                <div class="basket-item">
                    <p>Item structure is invalid</p>
                </div>
            @endif
        @endforeach

        <!-- Display the total price -->
        <div class="total-price">
            <p>Total: ${{ $totalPrice }}</p>
        </div>
    @else
        <p>No items in the basket</p>
    @endif
</div>

</div>
        <div class="total">
            <!-- Button to proceed to checkout -->
            <button class="btn_basket" onclick="redirectToCheckout()">Proceed to Checkout</button>
            <script>
                function redirectToCheckout() {
                    window.location.href = "{{ route('checkout') }}";
                }
            </script>
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
