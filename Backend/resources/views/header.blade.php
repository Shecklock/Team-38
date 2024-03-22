<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home-Page</title>
   
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/headerStyle.css') }}">
      <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="{{ asset('js/contact.js') }}"></script>
    <script src="https://kit.fontawesome.com/155df07167.js" crossorigin="anonymous"></script>
</head>

<nav>
    
    <img src="{{ asset('assets/sources/logo2.3.png') }}" class="logo">
            
        <header>
        
            <div id="header">
                
            <div class="HeaderMain">
           

            
                <div class="nav-logo">
                    
                    <a href="index.html">
                   
                    </a>
                </div>
    
                <div class="nav-items">
                    <ul>
                        
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('showproducts') }}">Products</a></li>
                        
                        
                    
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
                        <li><a href="{{ route('account') }}">Account</a></li>
                        @endguest

                        <li>    
                            <form action="{{ url('/search') }}" method="GET" role="search">
                                <div class="input-group">                                  
                                    <input type="search" name="search" placeholder=" Products...">
                                    
                                        
                                </div>
                            </form>
                        </li>
                        
                        <li><a href="{{ route('basket') }}"><i class="fa-solid fa-basket-shopping"></i></a></li>
                    </ul>
                </nav>
            </div>
        </div>

        



    </header>