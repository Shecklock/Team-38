@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Product Sizes</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product ID</th>
                    <th>Size ID</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productSizes as $productSize)
                    <tr>
                        <td>{{ $productSize->id }}</td>
                        <td>{{ $productSize->product_id }}</td>
                        <td>{{ $productSize->size_id }}</td>
                        <td>{{ $productSize->quantity }}</td> <!-- Display the quantity -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
