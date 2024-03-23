// Function to close the mobile navigation menu
function closeMenu() {
    const mobileNav = document.querySelector('.mobile-nav');
    mobileNav.setAttribute('data-visible', 'false');
    document.body.classList.remove('menu-open'); // Remove the blur class
}

// Function to toggle the mobile navigation menu
function toggleMenu() {
    const mobileNav = document.querySelector('.mobile-nav');
    const isVisible = mobileNav.getAttribute('data-visible');

    if (isVisible === 'true') {
        mobileNav.setAttribute('data-visible', 'false');
        document.body.classList.remove('menu-open'); // Remove the blur class
    } else {
        mobileNav.setAttribute('data-visible', 'true');
        document.body.classList.add('menu-open'); // Add the blur class
    }
}




// Event listener to close the menu when clicking outside of it
document.body.addEventListener('click', function(event) {
    const mobileNav = document.querySelector('.mobile-nav');
    const hamburgerMenu = document.querySelector('.hamburger-menu');

    // Check if the clicked element is not within the mobile navigation or hamburger menu
    if (!mobileNav.contains(event.target) && !hamburgerMenu.contains(event.target)) {
        closeMenu();
    }
});
