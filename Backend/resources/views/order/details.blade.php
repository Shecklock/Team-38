@extends('layouts.app')

@section('content')
    <h1>Order Details</h1>
    <p>Order ID: {{ $order->id }}</p>

    <h2>Items Ordered</h2>
    <ul>
        @if($order->products && $order->products->count() > 0)
            @foreach($order->products as $product)
                <li>Item: {{ $product->name }} | Quantity: {{ $product->pivot->quantity }}</li>
            @endforeach
        @else
            <p>No items found for this order.</p>
        @endif
    </ul>
@endsection
