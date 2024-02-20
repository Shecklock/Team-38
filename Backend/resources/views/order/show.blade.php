<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style2.css') }}">
</head>
<body>
    <div class="container">
        <h1>Order Details</h1>
        <div class="order-details">
            <p><strong>Order ID:</strong> {{ $order->id }}</p>
            <p><strong>Status:</strong> {{ $order->status }}</p>
            <p><strong>Date Placed:</strong> {{ $order->created_at->format('d M Y') }}</p>
            <p><strong>Estimated Arrival Date:</strong> {{ $order->estimated_arrival }}</p>
        </div>
        <div class="products">
            <h2>Products</h2>
            @foreach ($order->products as $product)
                <div class="product">
                    <img src="{{ asset('uploads/product/' . $product->image) }}" alt="{{ $product->name }}" class="product-img">
                    <div class="product-info">
                        <h3>{{ $product->name }}</h3>
                        <p>{{ $product->description }}</p>
                        <p>Price: £{{ $product->price }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <a href="{{ route('orders.index') }}" class="btn">Back to Orders</a>
    </div>
</body>
</html>
