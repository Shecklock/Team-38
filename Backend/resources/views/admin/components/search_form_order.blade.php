<form action="{{ route('orders.index') }}" method="GET" class="form-inline">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Search orders..." value="{{ request()->query('search') }}">

        <!-- Dropdown for selecting order status -->
        <select name="status" class="form-control ml-2">
            <option value="">Select Status</option>
            <option value="Pending" {{ request()->query('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
            <option value="Processing" {{ request()->query('status') == 'Processing' ? 'selected' : '' }}>Processing</option>
            <option value="Shipped" {{ request()->query('status') == 'Shipped' ? 'selected' : '' }}>Shipped</option>
            <option value="Delivered" {{ request()->query('status') == 'Delivered' ? 'selected' : '' }}>Delivered</option>
            <option value="Cancelled" {{ request()->query('status') == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
            <option value="Refunded" {{ request()->query('status') == 'Refunded' ? 'selected' : '' }}>Refunded</option>
            <option value="On hold" {{ request()->query('status') == 'On hold' ? 'selected' : '' }}>On hold</option>
            <option value="Returned" {{ request()->query('status') == 'Returned' ? 'selected' : '' }}>Returned</option>
        </select>

        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </div>
    </div>
</form>
