<!DOCTYPE html>

<header>
    @include('header')
</header>


<html lang = "en">
    <head>
        <title>About Us</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/about.css') }}">
        <script src="https://kit.fontawesome.com/155df07167.js" crossorigin="anonymous"></script>
    </head>
    <body>

   
      
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
            @include('footer')
        </footer>

 
    </body>


</html>
