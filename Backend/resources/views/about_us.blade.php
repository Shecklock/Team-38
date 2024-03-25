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
    <link rel="stylesheet" href="{{ asset('assets/css/viewproducts.css') }}"> <!-- Update with your correct path -->
    <script src="https://kit.fontawesome.com/155df07167.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        @include('header')   <br>
    </header>

    <!-- Existing Content -->

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


 <!-- Review Section -->
<div class="review-section">
    <!-- Review Submission Section -->
    <div class="col-md-4 mt-3">
        <div class="reviews">
            <h2>Write a Review</h2>
            <form id="review-form" action="{{ route('service-reviews.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="reviewer-name" class="form-label">Your Name</label>
                    <input type="text" class="form-control" name="reviewer-name" required>
                </div>
                <div class="mb-3">
                    <label for="review-text" class="form-label">Your Review</label>
                    <textarea class="form-control" name="review-text" rows="3" required></textarea>
                </div>
                <div class="star-rating mb-3">
                    @for ($i = 1; $i <= 5; $i++)
                        <span class="star interactive-star" data-value="{{ $i }}">&#9733;</span>
                    @endfor
                    <input type="hidden" name="rating" id="rating" value="">
                </div>
                <button type="submit" class="btn btn-primary">Submit Review</button>
            </form>
        </div>
    </div>

    <!-- Service Reviews Section -->
    <div class="row mt-3">
        <div class="col-12">
            <div class="reviews">
                <div class="CustomerRev">
                    <h3>Service Reviews</h3>
                </div>
                <div class="row">
                    @forelse ($serviceReviews as $review)
                        <div class="col-md-4">
                            <div class="review">
                                <h4>{{ $review->reviewer_name }}</h4>
                                <div class="review-text">
                                    <p>{{ $review->review_text }}</p>
                                </div>
                                <div class="star-rating mb-3">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span class="star" style="{{ $i <= $review->rating ? 'color: #ff0;' : 'color: #ddd;' }}">&#9733;</span>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="col-12">No reviews yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<footer>
    @include('footer')
</footer>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const reviewForm = document.querySelector('#review-form');
    const stars = reviewForm.querySelectorAll('.star.interactive-star');
    const ratingInput = reviewForm.querySelector('#rating');

    stars.forEach(star => {
        star.addEventListener('click', function () {
            const rating = this.getAttribute('data-value');
            updateRating(stars, ratingInput, rating);
        });
    });

    function updateRating(stars, ratingInput, rating) {
        ratingInput.value = rating;
        stars.forEach(star => {
            star.style.color = star.getAttribute('data-value') <= rating ? '#ff0' : '#000'; // Update as per your color scheme
        });
    }
});
</script>

</body>
</html>
