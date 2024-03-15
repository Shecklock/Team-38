@extends('layouts.admin')

@section('content')

    <div class="pull-left">
        <h2>Order Status System</h2>
    </div>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>OrderID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Order Status</th>
                <th>Ordered at</th>
                <th>Updated at</th>
            </tr>
        </thead>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->OrderID }}</td>
                <td>{{ $order->customer->name}}</td>
                <td>{{ $order->TotalAmount}}</td>
                <td>{{ $order->Status}}</td>
                <td>{{ $order->OrderDate}}</td>
                <td>{{ $order->updated_at}}</td>
        @endforeach
@endsection
