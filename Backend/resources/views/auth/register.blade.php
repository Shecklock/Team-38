@extends('layouts.app')

@section('content')
<head>
    <meta charset="UTF-8"/> 
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
    <title>Sign in</title>
</head>

<body>
    <main>
        <div class="signin-page">
            <div class="form-container">
                <form class="input-field" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="container">
                        <h1>Register</h1>
                        <br><label>Full Name:</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <label>Email:</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <label>Password:</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <!-- Registration Code Field -->
                        <label>Registration Code (Optional):</label>
                        <input id="registration_code" type="text" class="form-control @error('registration_code') is-invalid @enderror" name="registration_code" value="{{ old('registration_code') }}" autocomplete="registration_code">
                        @error('registration_code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <!-- Other fields continue here -->
                        
                        <br><button type="submit" class="signin">{{ __('Register') }}</button>

                        <label>
                            <ul>
                                <li><a href="login">Have an account already?</a></li>
                            </ul>
                        </label>
                    </div>
                </form>
            </div>
        </div>
        <footer>
            @include('footer')
        </footer>
    </main>
</body>
                       
@endsection