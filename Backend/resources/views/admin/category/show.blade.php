@extends('layouts.admin')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header"><h2>Category Information Page<h2></div></br></br>
  <div class="card-body">
        
  
 
  <div class="card-body">
            <h4 class="card-ID">ID : {{ $category->CategoryID }}</h4>
            <h4 class="card-Name">Name : {{ $category->CategoryName }}</h4>
            <h4 class="card-Created">Time Created : {{ $category->created_at }}</h4>
            <h4 class="card-Created">Last Update : {{ $category->updated_at }}</h4>


    </hr>
    <a href="{{ url('admin/category')}}" class="btn btn-primary btn-sm text-white float-end">BACK</a>
  </div>
</div>
@stop