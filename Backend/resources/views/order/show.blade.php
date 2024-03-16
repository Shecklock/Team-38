@extends('layouts.app')

@section('content')
    <h1>Order Details</h1>

    <p>Order ID: {{ $order->id }}</p>
    <!-- Add more information as needed -->

    <h2>Items Ordered</h2>
    <ul>
        @foreach($order->items as $item)
            <li>
                Item: {{ $item->name }} | Quantity: {{ $item->pivot->quantity }}
                <!-- Assuming you have a relationship setup between orders and items -->
            </li>
        @endforeach
    </ul>
@endsection
