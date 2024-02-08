<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style2.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <!-- Include other common stylesheets, scripts, etc. -->
</head>
<body>



<header>
        <div id="header">
            <div class="container1">
                <nav>
                    <a href="{{ route('home') }}"><img src="{{ asset('assets/sources/logo2.png') }}" class="logo"></a>
                    
                        <ul>
                            <li>    <form action="{{ url('/search') }}" method="GET" role="search">
                                    <div class="input-group">                                  
                                        <input type="search" name="search" placeholder=" Products...">
                                        <button class="btn bg-white" type="submit">
                                            <i>search<i>
                                    </div>
                                </form>
                            </li>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('showproducts') }}">Products</a></li>
                            <li class="active"><a href="contact-us">Contact Us</a></li>
                            <li><a href="{{ route('about_us') }}">About Us</a></li>
                        
                            @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @endif
                            @else
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="mdi mdi-logout text-primary"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                            <li><a href="a">Account</a></li>
                            @endguest
                        
                        <li><a href="{{ route('basket') }}"><i class="fa-solid fa-basket-shopping"></i></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>