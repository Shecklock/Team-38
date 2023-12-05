@extends('layouts.admin')

@section('content')

    <div class="pull-left">
        <h2>Product Management System</h2>
    </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <a class="btn btn-success" href="{{ route('products.create') }}">Create new product</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ProductID</th>
                <th>Name</th>
                <th>CategoryID</th>
                <th>Description</th>
                <th>Image</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach($products as $product)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $product->ProductName }}</td>
                <td>{{ $product->CategoryID}}</td>
                <td>{{ $product->Description }}</td>
                <td>
                    @if($product->image)
                        <img src="{{ asset('admin/images/' . $product->image) }}" width="200px" height="200px" alt="Product Image">
                    @else
                        No Image
                    @endif
                </td>    
                <td>{{ $product->Price }}</td>
                <td>
                    <form onsubmit="return confirm('Are you sure you want to delete?')" action="{{ route('products.destroy', $product->ProductID) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('products.show', $product->ProductID) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('products.edit', $product->ProductID) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection
