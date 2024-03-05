@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Order Details: #{{ $order->id }}</h1>
    <p>Order Date: {{ $order->created_at->format('M d, Y') }}</p>

    <div class="products">
        @foreach ($order->products as $product)
            <div class="product">
                <h2>{{ $product->name }}</h2>
                @if($product->photos->isNotEmpty())
                    <img src="{{ $product->photos->first()->path }}" alt="Product Image" style="max-width: 100px;">
                @endif
                <p>Price: ${{ $product->price }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection
