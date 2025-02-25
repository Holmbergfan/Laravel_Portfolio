import './bootstrap';

document.addEventListener('DOMContentLoaded', function () {
    // Single AOS initialization
    if (typeof AOS !== "undefined") {
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: false
        });
    }

    // Consolidated event listeners
    const initializeUI = () => {
        // Project cards
        document.querySelectorAll('.project-card').forEach(card => {
            card.addEventListener('click', () => card.classList.toggle('flipped'));
        });

        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href'))
                    .scrollIntoView({ behavior: 'smooth' });
            });
        });
    };

    initializeUI();
});
