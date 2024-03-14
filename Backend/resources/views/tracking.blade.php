<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Tracking</title>
</head>
<body>
    <h1>Order Tracking</h1>
    
    @if ($orders->isEmpty())
        <p>No orders found for this customer.</p>
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
</body>
</html>
