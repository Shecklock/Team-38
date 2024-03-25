@extends('layouts.admin')

@section('content')
<div class="container">
    <form action="{{ route('admin.dashboard') }}" method="GET">
        <select name="filter" onchange="this.form.submit()">
            <option value="">Summary</option>
            <option value="all" {{ $filter === 'all' ? 'selected' : '' }}>All Orders</option>
            <option value="outgoing" {{ $filter === 'outgoing' ? 'selected' : '' }}>Outgoing Orders</option>
            <option value="incoming" {{ $filter === 'incoming' ? 'selected' : '' }}>Incoming Orders</option>
        </select>
    </form>

    @if($filter === 'all' || $filter === 'outgoing' || $filter === 'incoming')
        <h2>{{ ucfirst($filter) }} Orders</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>User ID</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                    <tr>
                        <td>{{ $order->OrderID }}</td>
                        <td>{{ $order->UserID }}</td>
                        <td>{{ $order->created_at->format('Y-m-d') }}</td>
                        <td>{{ $order->Status }}</td>
                        <td><a href="{{ route('orders.showMore', ['orderId' => $order->OrderID]) }}" class="btn btn-info btn-sm">View More</a></td>
                    </tr>
                @empty
                    <tr><td colspan="5">No orders found.</td></tr>
                @endforelse
            </tbody>
        </table>
    @else
        <div class="summaries">
            <div class="outgoing-summary">
    <h3>Recent Outgoing Orders</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>User ID</th>
                <th>Date</th>
                <th>Status</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($outgoingOrdersSummary as $order)
                <tr>
                    <td>{{ $order->OrderID }}</td>
                    <td>{{ $order->UserID }}</td>
                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                    <td>{{ $order->Status }}</td>
                    <td>
                        <a href="{{ route('orders.showMore', ['orderId' => $order->OrderID]) }}" class="btn btn-info btn-sm">View More</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

            
            <div class="incoming-summary">
    <h3>Recent Incoming Orders</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>User ID</th>
                <th>Date</th>
                <th>Status</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($incomingOrdersSummary as $order)
                <tr>
                    <td>{{ $order->OrderID }}</td>
                    <td>{{ $order->UserID }}</td>
                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                    <td>{{ $order->Status }}</td>
                    <td>
                        <a href="{{ route('orders.showMore', ['orderId' => $order->OrderID]) }}" class="btn btn-info btn-sm">View More</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

    @endif
</div>
@endsection
