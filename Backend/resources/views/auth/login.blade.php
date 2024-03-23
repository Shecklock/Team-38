@extends('layouts.app')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Account </title>
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
</head> 

<body>
    
    <main>
        <div class ="login-page">
        <form class="form-container" method="POST" action="{{ route('login') }}">
            @csrf
            <h1> Login </h1>
            <div class = "input-control">
            <p> Enter your email : </p><input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class ="input-control">
            <p> Enter your password : </p><input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"><br>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
            <br><button type ="submit" class = "submit"> login </a></button><br>
            <p> First time shopping in our store? </p><br><ul><li><a href ="register">Register here</a></ul></li>
            <label>
                <ul>
                    <li><a href ="{{route ('forgot_password')}}">Forgot password</a></li>
                </ul>
            </label>
            </label>
            </form>
                    </div> 
            
        </div>
                    </div>
            </div>
        </div>
                </div>
    </div>
</div>
        </div>
    </div>
        </section>
    </main>
    <footer>
        @include('footer')       
    </footer>
</body>
</html>
@endsection