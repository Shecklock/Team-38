<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="{{ asset('assets/css/checkout.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/155df07167.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        @include('header')
    </header>

    <div class="checkout-container">
        <span class="big-circle"></span>

        <h3 class="title">Confirming Your Order</h3>
        <div class="Confirm Items">
            <ul>
            <div class="checkout-info">
        <h3 class="title">Please review your order</h3>

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
                <p>£{{ $item['price'] ?? 'Unknown' }}</p>
                <p>Subtotal: £{{ ($item['price'] ?? 0) * ($item['quantity'] ?? 1) }}</p>

                    
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
            <p>Total: £{{ $totalPrice }}</p>
        </div>
    @else
        <p>No items in the basket</p>
    @endif
</div>

            </ul>
        </div>

        <form action="{{ route('checkout.process') }}" method="post">
            @csrf
            <button type="submit">Confirm Order</button>
        </form>
    </div>

    <footer>
        @include('footer')
    </footer>
    
</body>
</html>
