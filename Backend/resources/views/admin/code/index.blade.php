@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Registration Codes</h1>
    <a href="{{ route('admin.code.create') }}" class="btn btn-primary">Generate New Code</a>
    <table class="table">
        <thead>
            <tr>
                <th>Code</th>
                <th>Expires At</th>
                <th>Used</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($codes as $code)
            <tr>
                <td>{{ $code->code }}</td>
                <td>{{ $code->expires_at }}</td>
                <td>{{ $code->used ? 'Yes' : 'No' }}</td>
                <td><a href="{{ route('admin.code.show', $code->id) }}">View</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
