@extends('layouts.app')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <title> Change Password </title>
    <link rel="stylesheet" href="{{ asset('assets/css/about2.css') }}">
</head>
<body>
    <main>
        <div class="login-page">
            <form class="form-container" method="POST" action="{{ route('change_update_password') }}">
                @csrf
                <h1> Change Password </h1>
                <div class="input-control">
                    <p> Enter your old password : </p>
                    <input id="old_password" type="password" class="form-control" name="old_password" required>
                </div>
                <div class="input-control">
                    <p> Enter your new password : </p>
                    <input id="new_password" type="password" class="form-control" name="new_password" required>
                </div>
                <div class="input-control">
                    <p> Confirm your password : </p>
                    <input id="confirm_password" type="password" class="form-control" name="confirm_password" required>
                </div>
                <br>
                <button type="submit" class="submit">Change Password</button>
            </form>
            <!-- Success and failure conditions -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('confirm_password'))
                <div class="alert alert-danger">
                    {{ session('confirm_password') }}
                </div>
            @endif
        </div>
    </main>
    <footer>
        @include('footer')       
    </footer>
</body>
</html>
@endsection
