<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Tracking</title>
    <link href="{{ asset('assets/css/track.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/155df07167.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/basket.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
</head>

<body>
@include('header')
<div class="track-page">
<div class="container">
    <span class="big-circle"></span>
    <div class="form_basket">
        <div class="checkout-info">
            <h1 class="title">Your Orders</h1>
            @if ($orders->isEmpty())
                <p>You haven't placed any orders yet.</p>
            @else
                <ul>
                    @foreach ($orders as $order)
                        <li>
                            Order ID: <a href="{{ route('order.details', ['id' => $order->OrderID]) }}">{{ $order->OrderID }}</a><br>
                            Status: {{ $order->Status }}<br>
                            <!-- Add more order details here as needed -->
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
    <a href="{{ route('profile.show') }}" class="btn">Back to Account</a>
</div>
</div>
@include('footer')
</body>
</html>
