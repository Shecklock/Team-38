<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Information</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/account.css') }}">
    <script src="https://kit.fontawesome.com/155df07167.js" crossorigin="anonymous"></script>
</head>
<body>
@include('header')

<div class="account-container">
    <h1>Account Information</h1>
    <div class="account-details">
        <p><strong>User ID:</strong> {{ Auth::user()->id }}</p>
        <p><strong>User Name:</strong> {{ Auth::user()->name }}</p>
        @if (Auth::user()->address)
            <p><strong>Address:</strong> {{ Auth::user()->address->address }}</p>
            <p><strong>City:</strong> {{ Auth::user()->address->city }}</p>
            <p><strong>State:</strong> {{ Auth::user()->address->state }}</p>
            <p><strong>Postcode:</strong> {{ Auth::user()->address->postcode }}</p>
            <p><strong>Country:</strong> {{ Auth::user()->address->country }}</p>
        @else
            <p><strong>Address Information:</strong> Not provided</p>
        @endif

        @if (Auth::user()->address)
            <p><strong>Phone Number:</strong> {{ Auth::user()->phone->phone_number }}</p>
        @else
            <p><strong>Phone Information:</strong> Not provided</p>
        @endif
    </div>

    <div class="account-button-container">
        <button class="account-button" onclick="window.location.href='{{ route('profile.show') }}'">Edit Account Information</button>
        <button class="account-button" onclick="window.location.href='{{ route('order.track', ['user_id' => Auth::id()]) }}'">Track Orders</button>
        <button class="account-button" onclick="window.location.href='{{ route('change_password') }}'">Change Password</button>
    </div>
</div>


@include('footer')
</body>
</html>
