@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        @if(session('message'))
                            <h2>{{ session('message') }},</h2>
                        @endif
                        <p class="mb-md-0">Product Details</p>
                    </div>
                    <div class="d-flex">
                        <!-- Breadcrumb or navigation links -->
                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Products&nbsp;/&nbsp;</p>
                        <p class="text-primary mb-0 hover-cursor">Product Details</p>
                    </div>
                </div>
                <!-- Additional buttons or actions if needed -->
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
                <a href="{{ route('products.edit', $product->ProductID) }}" class="btn btn-primary mt-3">Edit</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $product->ProductName }}</h4>
                    <p class="card-text">Product ID: {{ $product->ProductID }}</p>
                    <p class="card-text">Description: {{ $product->Description }}</p>
                    <p class="card-text">Price: ${{ $product->Price }}</p>
                    <p class="card-text">Stock Quantity: {{ $product->StockQuantity }}</p>
                    <!-- Display other relevant product details -->
                    @if($product->image)
                        <img src="{{ asset('admin/images/' . $product->image) }}" width="200px" height="200px" alt="Product Image">
                    @else
                        <p>No Image Available</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
