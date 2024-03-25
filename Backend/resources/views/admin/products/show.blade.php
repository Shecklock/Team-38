@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        @if(session('message'))
                            <h2>{{ session('message') }},</h2>
                        @endif
                        <p class="mb-md-0">Product Details</p>
                    </div>
                    <div class="d-flex">
                        <!-- Breadcrumb or navigation links -->
                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Products&nbsp;/&nbsp;</p>
                        <p class="text-primary mb-0 hover-cursor">Product Details</p>
                    </div>
                </div>
                <!-- Additional buttons or actions if needed -->
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
                <a href="{{ route('products.edit', $product->ProductID) }}" class="btn btn-primary mt-3">Edit</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $product->ProductName }}</h4>
                	<table class="table table-bordered">
    					<thead class="thead-dark">
        					<tr>
								<th>Product ID</th>
                    			<th>Description</th>
                    			<th>Price (£)</td>
                				<th>Category</td>
                				<th>Image</td>
                    		</tr>
                    	</thead>
                		<tbody>
                			<tr>
                				<td>{{ $product->ProductID }}</td>
                				<td>{{ $product->Description }}</td>
                				<td>{{ $product->Price }}</td>
                				<td>{{ $product->category->CategoryName ?? 'Uncategorised' }}</td>
                				<td>
                					@if($product->image)
                        				<img src="{{ asset('uploads/product/' . $product->image) }}" width="200px" height="200px" alt="Product Image">
                    				@else
                        				No Image Available
                    				@endif
                				</td>
							</tr>
                		</tbody>
                	</table>
					<br>
                    <table class="table table-bordered">
    					<thead class="thead-dark">
        					<tr>
								<th>Size</th>
                    			<th>Stock Quantity</th>
                    			<th>Stock level</td>
                    		</tr>
                    	</thead>
                    	<tbody>
                    		@foreach($product->sizes as $size)
<tr>
    <td>{{ $size->size }}</td>
    <form action="{{ route('admin.products.updateStock', [$product->ProductID, $size->id]) }}" method="POST">
        @csrf
        @method('PATCH')
        <td>
            <input type="number" name="quantity" value="{{ $size->pivot->quantity }}" class="form-control" min="0">
        </td>
        <td>
            <button type="submit" class="btn btn-primary">Update</button>
        </td>
    </form>
    <td>
        @if($size->pivot->quantity == 0)
            Out of stock
        @elseif($size->pivot->quantity <= 10)
            Low stock
        @else
            High stock
        @endif
    </td>
</tr>
@endforeach

                    	</tbody>
					</table>
                </div>
            </div>
        </div>
    </div>

@endsection
