{{-- resources/views/admin/users/index.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Users</h1>
    <form method="GET" action="{{ route('admin.users.index') }}" class="mb-4">
        <div class="form-row">
            <div class="col">
                <input type="text" class="form-control" name="user_id" placeholder="User ID" value="{{ request('user_id') }}">
            </div>
            <div class="col">
                <input type="text" class="form-control" name="name" placeholder="Name" value="{{ request('name') }}">
            </div>
            <div class="col">
                <input type="text" class="form-control" name="email" placeholder="Email" value="{{ request('email') }}">
            </div>
            <div class="col">
                <input type="text" class="form-control" name="phone_number" placeholder="Phone Number" value="{{ request('phone_number') }}">
            </div>
            <div class="col">
                <input type="text" class="form-control" name="address" placeholder="Address" value="{{ request('address') }}">
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>

    <table class="table">
        {{-- Table header --}}
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        {{-- Table body --}}
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-info btn-sm">Details</a>
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No users found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
