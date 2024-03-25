{{-- resources/views/admin/codes/create.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Generate New Registration Code</h1>
    <form action="{{ route('admin.code.store') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success">Generate</button>
    </form>
</div>
@endsection
