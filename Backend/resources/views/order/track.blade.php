<!DOCTYPE html>
<html lang="en">

<header>
@include('header')
</header>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basket</title>
    <link href="{{ asset('assets/css/basket.css') }}" rel="stylesheet">
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
        <h1 class="title"> Your Order </h1>

    
    @if ($orders->isEmpty())
        <p>You haven't placed any order yet.</p>
    @else
        <ul>
            @foreach ($orders as $order)
                <li>
                    Order ID: {{ $order->OrderID }}<br>
                    Status: {{ $order->Status }}<br>
                    <!-- Add more order details here as needed -->
                </li>
            @endforeach
        </ul>
    @endif

    <footer>
    @include('footer')
    </footer>

</body>
</html>
