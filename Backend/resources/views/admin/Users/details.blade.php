@extends('layouts.admin') {{-- Assuming you have an admin layout --}}

@section('content')
<div class="container">
    <h1>User Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $user->email }}</h6>

            {{-- Display user details --}}
            <p class="card-text">Address: {{ $user->address->address ?? 'N/A' }}</p>
            <p class="card-text">Phone: {{ $user->phone->phone_number ?? 'N/A' }}</p>

            {{-- Add more details as needed --}}
            
            <a href="{{ route('admin.users.edit', $user->id) }}" class="card-link">Edit</a>
        </div>
    </div>
</div>
@endsection
