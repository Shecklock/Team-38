@extends('layouts.admin')

@section('content')
    
<div class="card" style="margin:20px;">
  <div class="card-header">Edit Order</div>
  <div class="card-body">
        <form action="{{ url('admin/orders/update', $order->OrderID) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="OrderID" id="OrderID" value="{{$order->OrderID}}" id="OrderID" />
            <label>Status</label></br>
            <input type="text" name="Status" id="Status" value="{{$order->Status}}" class="form-control"></br>
            <input type="submit" value="Update" class="btn btn-success"></br>
        </form>
    </div>
</div>
  
@endsection
