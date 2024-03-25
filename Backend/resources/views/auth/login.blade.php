@include('header')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Account </title>
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
</head> 
<div class="container">
    <div class="form">
        <div class="checkout-info">
            <p class="subhead">First Time Shopping in Our Store?</p>
            <a href="{{ route('register') }}" class="reg">Register Here</a>
            <a href="{{ route('password.request') }}" class="fp">Forgot Password?</a>
        </div>


        <div class="checkout-form">
            <form method="POST" action="{{ route('login') }}" autocomplete="off">
                @csrf
                <h3 class="title">Account Details</h3>
                
                <div class="input-container">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email" class="input @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <span>Email</span>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

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

                <div class="input-container">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" class="input @error('password') is-invalid @enderror" required autocomplete="current-password">
                    <span>Password</span>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn">Login</button>
            </form>
        </div>
    </div>
</div>

@include('footer')

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

