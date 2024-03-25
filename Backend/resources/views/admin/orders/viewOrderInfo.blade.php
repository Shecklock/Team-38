@extends('layouts.admin')
<link href="{{ asset('assets/css/OrderInfo.css') }}" rel="stylesheet">
@section('content')
<div class="container">
   
    <div class="OrderDetails">
        <table>
			 <h3>Order #{{ $order->OrderID }}</h3>
             <h2>Made by User ID: #{{ $order->UserID }}</h2>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Price (£)</th>
                    <th>Quantity</th>
                    <th>Size</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orderProducts as $product)
                <tr>
                    <td><img src="{{ asset('uploads/product/' . $product->image) }}" alt="{{ $product->ProductName }}" class="img-fluid"></td>
                    <td>{{ $product->ProductName }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->Quantity }}</td>
                    <td>{{ $product->size ?? 'N/A' }}</td>
                    <td>{{ $product->Subtotal }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
		<div class="total">
        	<p>Total: £{{ $overallTotal }}</p>
    	</div>
    </div>
    
</div>

<div class="button-container"> 
	<td class="button-container">
    	<a href="{{ route('admin.orders.edit', $order->OrderID) }}" class="edit-button">Edit Status</a>
    	<a href="{{ url('/admin/orders') }}" class="back-button">Back to Orders</a>
	</td>
</div>



@endsection
