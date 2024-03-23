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
            </tr>
        </thead>
        @foreach($orders as $order)
            <tr>
                <td><a href="{{ route('admin.orders.edit', $order->OrderID) }}">{{ $order->OrderID }}</a></td>
                <td>{{ $order->customer->name}}</td>
                <td>{{ $order->TotalAmount}}</td>
                <td>{{ $order->Status}}</td>
                <td>{{ $order->OrderDate}}</td>
                <td>{{ $order->updated_at}}</td>
            </tr>
        @endforeach
    </table>
@endsection
