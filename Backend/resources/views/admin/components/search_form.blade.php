<form action="{{ route('products.index') }}" method="GET" class="form-inline">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Search for products..." value="{{ request()->query('search') }}">
        <span class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </span>
    </div>
</form>
