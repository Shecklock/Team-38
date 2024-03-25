@extends('layouts.admin')

@section('content')

    <div class="pull-left">
        <h2>Order Refund System</h2>
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
            	<th>Action</th>
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
				@if ($order->Status == 'Returning')
					<div class = "Option buttons float-right">
						<td>
							<a href="{{ route('admin.orders.return', $order->OrderID) }}" title="Returned"><button class="btn btn-success btn-md"></i> Returned</button></a>
        				</td>
					</div>
				@else
					<div class = "Option buttons float-right">
						<td>
							<button class="btn btn-danger btn-md"></i> No action</button></a>
        				</td>
					</div>
				@endif
            </tr>
        @endforeach
    </table>
@endsection
