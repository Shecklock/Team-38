{{-- resources/views/admin/users/show.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>User Details: {{ $user->name }}</h1>
    <p>Email: {{ $user->email }}</p>
    
    <h4>Address</h4>
    @if($user->address)
        <p>Address: {{ $user->address->address }}</p>
        {{-- Display other address details --}}
    @else
        <p>No address information available.</p>
    @endif
    
    @if($user->address)
        <p>Address: {{ $user->address->city }}</p>
        {{-- Display other address details --}}
    @else
        <p>No address information available.</p>
    @endif
    
    @if($user->address)
        <p>Address: {{ $user->address->address }}</p>
        {{-- Display other address details --}}
    @else
        <p>No address information available.</p>
    @endif
    
    @if($user->postcode)
        <p>Address: {{ $user->address->address }}</p>
        {{-- Display other address details --}}
    @else
        <p>No address information available.</p>
    @endif
    
    @if($user->address)
        <p>Address: {{ $user->address->address }}</p>
        {{-- Display other address details --}}
    @else
        <p>No address information available.</p>
    @endif
    
    

    <h4>Phone</h4>
    @if($user->phone)
        <p>Phone Number: {{ $user->phone->phone_number }}</p>
        {{-- Display other phone details if necessary --}}
    @else
        <p>No phone information available.</p>
    @endif

    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
