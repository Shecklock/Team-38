{{-- resources/views/admin/codes/show.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Registration Code Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Code: {{ $code->code }}</h5>
            <p class="card-text"><strong>Expires At:</strong> {{ $code->expires_at->toDayDateTimeString() }}</p>
            <p class="card-text"><strong>Used:</strong> {{ $code->used ? 'Yes' : 'No' }}</p>
        </div>
    </div>
    <a href="{{ route('admin.code.index') }}" class="btn btn-link mt-3">Back to List</a>
</div>
@endsection
