@extends('layouts.app')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Account </title>
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
</head> 

<body>
    <!-- <header>
        <div class ="container"> 
            <div class="navbar">
                <nav>
                    <a href="index.html"><img src="{{ asset('assets/sources/logo2.png') }}" class="logo"></a></img>
                    <nav>
                    <ul>
                      
                      <li><input type="text" placeholder="Search.."></li><button class="button">submit</button>
                      <li><a href="index.html">Home</a></li>
                      <li><a href="a">Products</a></li>
                      <li class="active"><a href="contact_us.html">Contact Us</a></li>
                      <li><a href="about_us.html">About Us</a></li>
                      <li><a href="login.html">Account</a></li>
                      icons.getbootstrap.com. (n.d.). Basket. [online] Available at: https://icons.getbootstrap.com/icons/basket/ [Accessed 5 Dec. 2023]. 
                      <li><a href="basket.html" class = "blogo"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                        <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9zM1 7v1h14V7zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5"/>
                      </svg></a></li>         
                    </ul>
                </nav>
            </div>
    </header> -->
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
            <p> First time shooping in our store? </p><br><ul><li><a href ="register">Register here</a></ul></li>
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
            <p>
                <a href="contact_us.html"><b>Contact us</b></a><br>
                Telephone: +44 123435390 <br>
                Email: sportifypromax@gmail.com  
            </p>
            <p><a href="about_us.html"><b>About us</b></a><br>
                Address: Aston St, Birmingham B4 7ET</p>
                <p>
                    <a href="faqs.html"><b>FAQs</b></a><br>
                    <a href="https://www.instagram.com/">Instagram</a><br>
                    <a href="https://en-gb.facebook.com/">Facebook</a><br></div>
                    <a href="https://twitter.com/login">X</a>
                </p>
        </footer>
</body>
</html>
@endsection