{{-- resources/views/admin/users/edit.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit User</h1>
    <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
        @csrf
        @method('PUT')

        {{-- User fields --}}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" required>
        </div>

        {{-- Address fields --}}
   
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" id="address" value="{{ $user->address->address ?? '' }}">
        </div>
        
            

        <div class="form-group">
            <label for="address">city</label>
            <input type="text" class="form-control" name="city" id="city" value="{{ $user->address->city ?? '' }}">
        </div>
            

        <div class="form-group">
            <label for="address">state</label>
            <input type="text" class="form-control" name="state" id="state" value="{{ $user->address->state ?? '' }}">
        </div>
            
            
   
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="postcode" id="postcode" value="{{ $user->address->postcode ?? '' }}">
        </div>
            

        <div class="form-group">
            <label for="country">Address</label>
            <input type="text" class="form-control" name="country" id="postcode" value="{{ $user->address->country ?? '' }}">
        </div>
            
         

        {{-- Phone fields --}}

        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" class="form-control" name="phone_number" id="phone_number" value="{{ $user->phone->phone_number ?? '' }}">
        </div>
        {{-- Include other phone fields if necessary --}}

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
