@extends('layouts.app')

@section('content')
<head>
 <meta charset="UTF-8"/> 
 <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
<title> Sign in </title>
</head>




<body>
<main>
    <div class ="signin-page">
        <div class = "form-container"> 
            <form class ="input-feild" method="POST" action="{{ route('register') }}">
                        @csrf
                <div class="containerr">
                <h1> Register</h1>
                <br><label>Full Name : </label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

@error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
                <label>Email : </label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                <label>Password : </label>
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
                <br><label>Phone number : </label>
                <input type ="phonenumber" class ="input-feilds" required><br>
                <br><label for="birthday">Birthday:</label>
                <input type="date" id="input-feilds" name="birthday" required><br>
                <br><label> Gender : </label>
                <input type="radio" id ="rdo2" name ="rdo2" value="male">
                <label for ="gender1"> Male </label>
                <input type="radio" id ="rdo2" name ="rdo2" value="female">
                <label for ="Female"> Female </label><br>
                <br><label>How do you prefer to be contacted ? </label><br>
                </label><input type ="checkbox" id="contact1" name ="methodOfContact1">
                <label>by email </label>
                <input type ="checkbox" id="contact2" name ="methodOfContact2">
                <label>by text </label><br>
                <br><button type ="submit" class = "signin"></a>{{ __('Register') }}</button>
            
                <label>
                    <ul>
                        <li><a href ="login">Have an account already ?</a></li>
                    </ul>
                </label>
            </form>
</div>
            </div>
        </div>
    </div>
    
<footer>
    @include('footer')
</footer>
</main>
</body>
</html>
@endsection
