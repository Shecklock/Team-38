@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Products</h2>
        </div>

        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route("products.index") }}">Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input. <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ProductName:</strong>
                <input type="text" name="ProductName" class="form-control" placeholder="ProductName">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <input type="text" name="Description" class="form-control" placeholder="Description">
            </div>
        </div>

        <div class="form-group">
            <label for="image">Product Image</label>
            <input type="file" name="image" class="form-control" accept="image/jpeg, image/png, image/jpg, image/gif">
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            @if (isset($product) && $product->image)
                <img src="{{ asset('admin/images/' . $product->image) }}" alt="Product Image">
            @endif
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price:</strong>
                <input type="double" name="Price" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Category:</strong>
        <select name="CategoryID" class="form-control">
            <option value="">Select a category</option>
            @foreach($categories as $category)
                <option value="{{ $category->CategoryID }}">{{ $category->CategoryName }}</option>
            @endforeach
        </select>
    </div>
</div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>

@endsection
