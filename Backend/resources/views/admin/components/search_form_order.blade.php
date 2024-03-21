<form action="{{ route('orders.index') }}" method="GET" class="form-inline">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Search orders..." value="{{ request()->query('search') }}">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </div>
    </div>
</form>
