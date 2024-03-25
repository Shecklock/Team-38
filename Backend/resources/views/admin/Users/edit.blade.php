{{-- resources/views/users/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit User</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $user->name }}">

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ $user->email }}" readonly>

        <!-- Add fields for Address and Phone based on your database structure -->
        <label for="phone_number">Phone Number:</label>
        <input type="text" name="phone_number" value="{{ $user->phone->phone_number ?? '' }}">

        <label for="address">Address:</label>
        <input type="text" name="address" value="{{ $user->address->address ?? '' }}">

   

        <button type="submit">Update</button>
    </form>
</div>
@endsection
