{{-- resources/views/users/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>User Details</h1>

    <!-- User Information -->
    <p><strong>Name:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>

    <!-- Phone Information -->
    @if($user->phone)
    <h2>Phone Information</h2>
    <p><strong>Phone Number:</strong> {{ $user->phone->phone_number }}</p>
    <p><strong>Type:</strong> {{ $user->phone->type }}</p>
    <p><strong>Is Primary:</strong> {{ $user->phone->is_primary ? 'Yes' : 'No' }}</p>
    @else
    <p>No phone information available.</p>
    @endif

    <!-- Address Information -->
    @if($user->address)
    <h2>Address Information</h2>
    <p><strong>Address:</strong> {{ $user->address->address }}</p>
    <p><strong>City:</strong> {{ $user->address->city }}</p>
    <p><strong>State:</strong> {{ $user->address->state }}</p>
    <p><strong>Postcode:</strong> {{ $user->address->postcode }}</p>
    <p><strong>Country:</strong> {{ $user->address->country }}</p>
    @else
    <p>No address information available.</p>
    @endif

    <!-- Back to Users List Button -->
    <button onclick="window.location.href='{{ route('admin.users.index') }}'">Back to Users List</button>
</div>
@endsection
{{-- resources/views/users/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>User Details</h1>
    <p>Name: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
