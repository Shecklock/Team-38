document.addEventListener('DOMContentLoaded', function() {
    const stars = document.querySelectorAll('#review-form .star-rating .star');

    stars.forEach(function(star, index) {
        star.addEventListener('mouseover', function() {
            // Highlight all stars up to the hovered one
            for (let i = 0; i <= index; i++) {
                stars[i].classList.add('filled');
            }
            // Unhighlight stars beyond the hovered one
            for (let i = index + 1; i < stars.length; i++) {
                stars[i].classList.remove('filled');
            }
        });

        star.addEventListener('click', function() {
            document.getElementById('rating').value = index + 1;
        });
    });

    document.getElementById('review-form').addEventListener('mouseleave', function() {
        let currentRating = document.getElementById('rating').value || 0;
        // Update stars to reflect the current rating
        stars.forEach((star, i) => {
            if (i < currentRating) {
                star.classList.add('filled');
            } else {
                star.classList.remove('filled');
            }
        });
    });
});
