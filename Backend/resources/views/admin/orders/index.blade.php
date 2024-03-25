@extends('layouts.admin')

@section('content')

    <div class="pull-left">
        <h2>Order Status System</h2>
    </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                @include('admin.components.search_form_order') {{-- Make sure the path matches your structure --}}
            </div>
        </div>
    </div>

    <!-- Creates a table where all previous orders can be displayed -->
            


    <table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>OrderID</th>
            <th>Name</th>
            <th>Total Price (£)</th>
            <th>Order Status</th>
            <th>Ordered at</th>
            <th>Updated at</th>
            <th>Actions</th> <!-- Add a header for the actions column -->
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
            <tr>
                <td><a href="{{ route('admin.orders.edit', $order->OrderID) }}">{{ $order->OrderID }}</a></td>
                <td>{{ $order->customer->name }}</td>
                <td>{{ $order->TotalAmount }}</td>
                <td>{{ $order->Status }}</td>
                <td>{{ $order->OrderDate }}</td>
                <td>{{ $order->updated_at }}</td>
                <td>
                    <!-- Add a button in the new column for each order -->
                    <a href="{{ route('orders.showMore', ['orderId' => $order->OrderID]) }}" class="btn btn-info btn-sm">View More</a>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
            

