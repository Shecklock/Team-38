@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Product Stock Report</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.dashboard') }}" method="GET" class="mb-4">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" name="search" placeholder="Search products..." value="{{ request('search') }}">
                            </div>
                            <div class="col">
@if ($showWarning)
    <div class="alert alert-warning">
        Showing items that are low in stock or out of stock. Adjust the filters to refine your view.
    </div>
@endif
<!-- Added onChange attribute to call handleFilterChange(this) -->
<select name="filter" class="form-control" onchange="handleFilterChange(this)">
    <option value="">All Products</option>
    <option value="lowStock" {{ $filter == 'lowStock' ? 'selected' : '' }}>Low Stock</option>
    <option value="outOfStock" {{ $filter == 'outOfStock' ? 'selected' : '' }}>Out of Stock</option>
</select>
                                <input type="hidden" name="all_products" id="all_products">
                            </div>
                            <div class="col">
                                <button class="btn btn-primary" type="submit">Filter</button>
                            </div>
                        </div>
                    </form>

                    @if($stockItems->isNotEmpty())
<!-- Place this before the table to debug -->
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Product Name</th>
                                    <th>Stock Quantity</th>
									<th>Stock Level</th>
                                </tr>
                            </thead>
                                @foreach($stockItems as $item)
                                    <tr>
                                        <td>{{ $item->ProductID }}</td>
                                        <td>{{ $item->ProductName }}</td>
                                        <td>{{ $item->StockQuantity }}</td>
										<!-- if you have another way to do this feel free -->
										@php
											$stockLevel = "";
											if($item->StockQuantity == 0) { $stockLevel = "Out of stock"; }
                                            elseif($item->StockQuantity <= 10) { $stockLevel = "Low stock"; }
                                            else { $stockLevel = "High stock"; }
										@endphp
										<td>{{ $stockLevel }}</td>
                                    </tr>
                                @endforeach
                        </table>
                    @else
                        <div class="alert alert-warning">No items match the condition, please try again.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function handleFilterChange(select) {
        var allProductsInput = document.getElementById('all_products');
        if (select.value === '') {
            allProductsInput.value = '1';
        } else {
            allProductsInput.value = '';
        }
        // Submit the form automatically when the filter changes
        select.form.submit();
    }
</script>
@endsection
