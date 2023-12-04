@extends('layouts.admin')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header"><h1>Category Information Page<h1></div></br></br>
  <div class="card-body">
        
  
 
  <div class="card-body">
            <h2 class="card-ID">ID : {{ $category->CategoryID }}</h2>
            <h2 class="card-Name">Name : {{ $category->CategoryName }}</h2>
            <h2 class="card-Created">Time Created : {{ $category->created_at }}</h2>
            <h2 class="card-Created">Last Update : {{ $category->updated_at }}</h2>


    </hr>
    <a href="{{ url('admin/category')}}" class="btn btn-primary btn-sm text-white float-end">BACK</a>
  </div>
</div>
@stop