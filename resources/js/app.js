import './bootstrap';

document.addEventListener('DOMContentLoaded', function() {
    const menuButton = document.querySelector('.menu-button');
    const nav = document.querySelector('nav');

    if (menuButton && nav) {
        menuButton.addEventListener('click', function() {
            nav.classList.toggle('active');
        });
    }

    // Gallery Modal functions (if needed)
    window.openGallery = function(imageUrl) {
        document.getElementById('gallery-image').src = imageUrl;
        document.getElementById('gallery-modal').classList.remove('hidden');
    }

    window.closeGallery = function() {
        document.getElementById('gallery-modal').classList.add('hidden');
    }
});
