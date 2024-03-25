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
        <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
        <p><strong>Address:</strong> {{ Auth::user()->address ?? 'Not provided' }}</p>
        <p><strong>Phone Number:</strong> {{ Auth::user()->phone ?? 'Not provided' }}</p>
    </div>

    <div class="account-button-container">
        <button class="account-button" onclick="window.location.href='{{ route('profile.show') }}'">Edit Account Information</button>
        <button class="account-button" onclick="window.location.href='{{ route('order.track', ['customer_id' => Auth::id()]) }}'">Track Orders</button>
    </div>
</div>


@include('footer')
</body>
</html>
