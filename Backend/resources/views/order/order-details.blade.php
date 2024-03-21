{{-- order-details.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details - {{ $order->OrderID }}</title>
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet"> <!-- Adjust the CSS path as necessary -->
</head>
<body>
    <div class="container">
        <h2>Order Details (ID: {{ $order->OrderID }})</h2>
        <p>Status: {{ $order->Status }}</p>
        <p>Total Price: £{{ $order->TotalAmount }}</p> <!-- Ensure your Order model has a TotalAmount attribute -->

        <h3>Items in this Order:</h3>
        <ul>
            @if($order->orderDetails->isNotEmpty())
                @foreach($order->orderDetails as $detail)
                    <li>
                        Product ID: {{ $detail->product_id }} - 
                        Product Name: {{ $detail->product->ProductName }} - 
                        Quantity: {{ $detail->Quantity }} - 
                        Price: £{{ $detail->Price }}
                    </li>
                @endforeach
            @else
                <li>No items ordered.</li>
            @endif
        </ul>
        <a href="{{ route('order.track', ['customer_id' => Auth::id()]) }}">Back to Orders</a>
    </div>
</body>
</html>
