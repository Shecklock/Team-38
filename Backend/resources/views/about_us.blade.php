

<!DOCTYPE html>

<html lang = "en">
    <head>
        <title>About Us</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/about.css') }}">
        <script src="https://kit.fontawesome.com/155df07167.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header>
            <div id="header">
                <div class="container1">
                <nav>

                    {{-- <a href="index.html"><img src="assets/sources/logo2.png" class="logo"></a>
                    <ul>
                      <!-- Nav Bar -->
                      <li><input type="text" placeholder="Search.."></li>
                      <li><a href="{{ route('home') }}">Home</a></li>
                      <li><a href="a">Products</a></li>
                      <li class="active"><a href="contact_us.html">Contact Us</a></li>   --}}

                    <a href="home"><img src="{{ asset('assets/sources/logo2.png') }}" class="logo"></a>
                    <ul>
                      <!-- Nav Bar -->
                      <li>    <form action="{{ url('/search') }}" method="GET" role="search">
                                            <div class="input-group">                                  
                                                <input type="search" name="search" placeholder=" Products...">
                                                <button class="btn bg-white" type="submit">
                                                    <i>search<i>
                                            </div>
                                        </form>
                    </li>
                      <li><a href="home">Home</a></li>
                      <li><a href="a">Products</a></li>
                      <li class="active"><a href="contact-us">Contact Us</a></li>
                      <li><a href="about-us">About Us</a></li>
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
                      <li><a href="basket"><i class="fa-solid fa-basket-shopping"></i></a></li>         

                    </ul>
                    
                  </nav>
                  </div>
                  </div>
        </header>
        
     
      
        <div class="About-Us">
            <h2>About Our Company</h2><hr size="5"><br><br>
            <h3>Who we are and what we do</h3>
            <p>Founded in 2019, we are the ultimate destination for sports enthusiasts, 
                offering a curated selection of top-quality sneakers, apparel, and equipment<br>
                We're here to elevate your game, whether you're a seasoned pro athlete or just starting out<br>
                Our commitment is simple: to equip your passion and provide top-quality products for all our athletes..
            </p>
        </div>

        <div class="team-section">
            <div class="container">
                <div class="row">
                    <div class="Our-team">
                        <h1>Our team</h1>
                        <hr size="5">
                    </div>
                </div>
                <div class="team-profiles">
                    <div class="team-role">
                        <div class="team-images">

                            <img src="{{ asset('assets/sources/img_female.png') }}" alt="female"></img>

                        </div>
                        <div class="role-explain1">
                            <h3>Christina Jenkins </h3>
                            <h4>CEO of Sportify Pro Max</h4>
                        </div>
                    </div>
                    <div class="team-role">
                        <div class="team-images">

                            <img src="{{ asset('assets/sources/img_male.png') }}" alt="male"></img>

                        </div>
                        <div class="role-explain">
                            <h3>Gary Voldermort </h3>
                            <h4>Senior Executive and FrontEnd Developer</h4>
                        </div>
                    </div>
                    <div class="team-role">
                        <div class="team-images">

                            <img src="{{ asset('assets/sources/img_female.png') }}" alt="girl"></img>

                        </div>
                        <div class="role-explain">
                            <h3>Jennifer Mcdonald</h3>
                            <h4>Senior manager and Backend Developer</h4></div>
                    </div>
                </div>
                
            </div>
        </div>
            </div>
            </div>
        </div>

        <footer>
            <p>
                <a href="contact-us">Contact us</a><br>
                Telephone: +44 123435390 <br>
                Email: sportifypromax@gmail.com
                
            </p>
            <p>
                <a href="about-us">About us </a><br>
                Address: Aston St, Birmingham B4 7ET
            </p>
            <p>
                    <a href="faqs">FAQs</a><br>
                    <a href="https://www.instagram.com/">Instagram</a><br>
                    <a href="https://en-gb.facebook.com/">Facebook</a><br>
                    <a href="https://twitter.com/login">X</a>
                </p>
        </footer>
 
    </body>


</html>
