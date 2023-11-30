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
        <tr>
            <th>ProductID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Image</th>
            <th>Price</th>
        </tr>
        @foreach($products as $products)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $products->ProductName }}</td>
                <td>{{ $products->Description }}</td>
                <td>{{ $products->image }}</td>
                <td>{{ $products->Price }}</td>
                <td>
                    <form action="{{ route('products.destroy', $products->ProductID) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('products.show', $products->ProductID) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('products.edit', $products->ProductID) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection
