import './bootstrap';

document.addEventListener('DOMContentLoaded', function () {
    // Only initialize AOS if defined
    if (typeof AOS !== "undefined") {
      AOS.init({
          duration: 800,
          easing: 'ease-in-out',
          once: false
      });
    }

    // Flip card on click
    document.querySelectorAll('.project-card').forEach(card => {
        card.addEventListener('click', () => {
            card.classList.toggle('flipped');
        });
    });

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
});
