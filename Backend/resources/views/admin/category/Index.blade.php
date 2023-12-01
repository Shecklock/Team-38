@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12"> 
        <div class="card">
            <div class="Card-header">
                <h4>Category
                    <a href="{{ url('admin/category/create') }}" class="btn btn-primary float-end">Add Category</a>
                </h4>
            </div>
            <div class = "card-body">
            
            </div>
        </div>
    </div>
</div>

@endsection

