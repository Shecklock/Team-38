@extends('layouts.admin')

@section('content')
    
<div class="card" style="margin:20px;">
  <div class="card-header">Edit Order</div>
    <div class="card-body">
        <!-- Starts a form where the Admin can update an orders Status -->
        <form action="{{ url('admin/orders/update', $order->OrderID) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="OrderID" id="OrderID" value="{{$order->OrderID}}" id="OrderID" />
            <label>Status</label><br><br>
            <select name="Status" id="Status" value="{{$order->Status}}" class="form-control">
                <!-- The predefined values for what an Order Statuses can be -->
                <option value="Pending">Pending</option>
                <option value="Processing">Processing</option>
                <option value="Shipped">Shipped</option>
                <option value="Delivered">Delivered</option>
                <option value="Cancelled">Cancelled</option>
                <option value="Refunded">Refunded</option>
                <option value="On hold">On hold</option>
                <option value="Returning">Returning</option>
            </select><br>
            <input type="submit" value="Update" class="btn btn-success"></br>
        </form>
    </div>
</div>
  
@endsection
