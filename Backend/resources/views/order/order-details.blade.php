@include('header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Tracking</title>
    <link href="{{ asset('assets/css/OrderDetails.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/155df07167.js" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<div class="container">
    <h1>Order Details</h1>
    <div class="order-details">
        <p><strong>Last Updated:</strong> {{ $order->updated_at->format('d-m-Y H:i:s') }}</p>
        <p><strong>Order Status:</strong> {{ $order->Status }}</p>

        <h2>Products in Order</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Product Name</th>
        			<th>Size</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @php $totalPrice = 0; @endphp
             
                @foreach($order->products as $product)
                    
                    @php
                        $subtotal = $product->pivot->Quantity * $product->Price;
                        $totalPrice += $subtotal;
                        $uniqueKey = $product->id . '_' . $product->pivot->size_id;
                    @endphp
                    <tr>
                        <td>{{ $product->ProductName }}</td>
                    	<td>{{ $sizes[$uniqueKey] ?? 'Size Not Specified' }}</td>
                        <td>£{{ number_format($product->Price, 2) }}</td>
                        <td>{{ $product->pivot->Quantity }}</td>
                        <td>£{{ number_format($subtotal, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4" style="text-align:right">Total Price:</th>
                    <th>£{{ number_format($totalPrice, 2) }}</th>
                </tr>
                    @if($order->Status == 'Pending')
                    <a href="{{ route('pay.options', ['orderId' => $order->OrderID]) }}" class="btn btn-primary">Pay Now</a>
                    <a href="{{ route('order.cancel', ['orderId' => $order->OrderID]) }}" class="btn btn-primary" style="margin-left: 10px;">Cancel order</a>
                    @elseif($order->Status == 'Processing')
					<a href="{{ route('order.cancel', ['orderId' => $order->OrderID]) }}" class="btn btn-primary">Cancel order</a>
                    @elseif($order->Status == 'Delivered')
                    	<a href="{{ route('order.refund', ['orderId' => $order->OrderID]) }}"class="btn btn-primary">Return order</a>
                    @endif
            </tfoot>
        </table>
                    
    </div>
</div>
                    <a href="{{ route('order.track', ['user_id' => Auth::user()->id]) }}" class="btn btn-primary">Back to Orders</a>
@include('footer')