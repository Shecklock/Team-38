@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Category Controller </h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('admin/category/create') }}" class="btn btn-success btn-sm" title="Add New Student">
                            Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Options</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($category as $item)
                                    <tr>
                                        <td>{{ $item->CategoryID }}</td>
                                        <td>{{ $item->CategoryName }}</td>
                                        <div class = "Option buttons float-right">
                                            <td>
                                                <a href="{{ url('admin/category/show/' . $item->CategoryID) }}" title="View Categories"><button class="btn btn-info btn-md"></i> View</button></a>
                                                <a href="{{ url('admin/category/edit/' . $item->CategoryID) }}" title="Edit Categories"><button class="btn btn-success btn-md"></i> Edit</button></a>
        
                                                <form action="{{ route('admin/category/destroy/', $item->CategoryID) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    

                                                    <button type="submit" class="btn btn-danger btn-md">Delete</button>
                                                </form>

                                            </td>
                                        </div>
                                                    
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
  
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection