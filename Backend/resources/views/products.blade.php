@extends('shop')

@section('content')
<div class="row">
    @foreach($products as $product)
        <div class="col-md-3 col-6 mb-4">
            {{-- <div class="card">
                <img src="{{  asset('images/products/' .$product->photo) }}" class="card-img-top" alt="{{ $product->name }} Image"/>
                <div class="card-body">
                    <h4 class="card-title">{{ $product->name }}</h4>
                    <p>{{ $product->author }}</p>
                    <p class="card-text"><strong>Price:</strong> ${{ $product->price }}</p> --}}
                    <img src="{{ asset('uploads/product/' . $product->image) }}" alt="" class="productImg" height="100px">
                    <h1 class="productTitle">{{ $product->ProductName }}</h1>
                    <h2 class="productPrice">${{ $product->Price }}</h2>
                    <p class="productDesc">{{ $product->Description }}</p>

                    <p class="btn-holder">
                        <a href="{{ route('addproduct.to.cart', $productId->productId) }}" class="btn btn-outline-danger">
                            Add to Cart
                        </a>
                    </p>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
