<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About Us</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/about2.css') }}">
    <script src="https://kit.fontawesome.com/155df07167.js" crossorigin="anonymous"></script>
    
  </head>
  <body>
    
        



    <header>
        @include('header')   <br>
    </header>
        <div class="About-Us">
          <h2>About Our Company</h2><hr size="5"><br><br>
          <h3>Who we are and what we do</h3>
          <p>Founded in 2019, we are the ultimate destination for sports enthusiasts, 
              offering a curated selection of top-quality sneakers, apparel, and equipment<br>
              We're here to elevate your game, whether you're a seasoned pro athlete or just starting out<br>
              Our commitment is simple: to equip your passion and provide top-quality products for all our athletes.

          </p>
      </div>
      
      <div class="team-section">
        <div class="container">
            <div class="row">
                <div class="Our-team">
                    <h1>Our team</h1>
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
      <div class="Community">
        <div class="container2">
            <div class="row2">
                <div class="News">
                    <h1>Latest from Sportify Pro Max</h1>
                </div>
            </div>
            <div class="com-image">
                <div class="Community-role">
                    <div class="community-photo">
                        <img src="{{ asset('assets/sources/sustainable-sport.png') }}" alt="female"></img>
                        
                    </div>
                    <div class="activities1">
                    <h3>Protecting the planet</h3>
                        <h4>We are constantly developing game-changing innovations across carbon, 
                          waste and water to help protect the future of sport.</h4>
                    </div>
                </div>
                <div class="Community-role">
                    <div class="community-photo">
                        <img src="{{ asset('assets/sources/sport-playing.jpg') }}" alt="male">

                        
                    </div>
                    <div class="activities">
                        <h3>Empowering communites</h3>
                        <h4>We are bringing sport-based programs, with a focus on expanding opportunities for underserved communities</h4>
                    </div>
                </div>
                <div class="Community-role">
                    <div class="community-photo">
                    <img src="{{ asset('assets/sources/diverse-people.png') }}" alt="girl"></img>
                        
                    </div>
                    <div class="activities">
                        <h3>Defining diversity</h3>
                        <h4> Our goal is to provide economic opportunities to historically disempowered diversity groups in each country that we operate</h4></div>
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
