@extends('layouts.admin')

@section('content')

<!-- Creates the entry fields or the category name and number -->

<div class="row">
    <div class="col-md-12"> 
        <div class="card">
            <div class="Card-header">
                <h4>Add Category
                    <a href="{{ url('admin/category/create')}}" class="btn btn-primary btn-sm text-white float-end">BACK</a>
                </h4>
            </div>
            <div class = "card-body">
                <form action ="">

                <div class="CatNameClass">
                    <label>Category Name</lable>
                    <input type="text" name="CGNa" class="form-control"/></br></br>
                </div>

                <div class="CatNuClass">
                    <label>Category Number</lable>
                    <input type="text" name="CGNu" class="form-control"/>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

