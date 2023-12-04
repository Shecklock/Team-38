@extends('layouts.admin')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Edit Category</div>
  <div class="card-body">

    
      <form action="{{ url('admin/category/update', $category->CategoryID) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="CategoryID" id="CategoryID" value="{{$category->CategoryID}}" id="CategoryID" />
        <label>Name</label></br>
        <input type="text" name="CategoryName" id="CategoryName" value="{{$category->CategoryName}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>

  
  </div>
</div>
  
@stop