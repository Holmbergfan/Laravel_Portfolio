document.addEventListener("DOMContentLoaded", function() {
  // Initialize AOS (Animate On Scroll)
  AOS.init({
    duration: 800, // animationens varaktighet i ms
    easing: 'ease-in-out',
    once: false,   // animera varje gång elementet kommer i sikte
  });
  console.log("Portfolio page loaded. AOS active!");
});

// filepath: /var/www/holmberg.pro/public/js/script.js
// Add any JavaScript code here
console.log('Script.js loaded');
