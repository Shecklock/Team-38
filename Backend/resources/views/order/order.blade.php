<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style2.css') }}">
</head>
<body>
    <div class="container">
        <h1>My Orders</h1>
        @foreach ($orders as $order)
            <div class="order">
                <h2>Order #{{ $order->id }}</h2>
                <div class="order-items">
                    @foreach ($order->orderItems as $item)
                        <div class="order-item">
                            <img src="{{ asset('uploads/product/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="order-item-img">
                            <div class="order-item-info">
                                <h3>{{ $item->product->name }}</h3>
                                <p>Quantity: {{ $item->quantity }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
               
