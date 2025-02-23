// filepath: /var/www/holmberg.pro/public/js/background.js
// Add any background-related JavaScript code here
console.log('Background.js loaded');const colors = ["#3CC157", "#2AA7FF", "#1B1B1B", "#FCBC0F", "#F85F36"];

const numBoxes = 400;

function createBoxes() {
  const container = document.querySelector('body'); // Changed to body

  for (let i = 0; i < numBoxes; i++) {
    const box = document.createElement("div");
    box.classList.add("box");
    container.appendChild(box);
  }
}

function animateBoxes() {
  const boxes = document.querySelectorAll(".box");

  boxes.forEach(box => {
    box.animate({
      top: `${Math.random() * 100}%`,
      left: `${Math.random() * 100}%`
    }, {
      duration: Math.random() * 5000 + 5000,
      iterations: Infinity,
      direction: 'alternate',
      easing: 'ease-in-out'
    });
  });
}

createBoxes();
animateBoxes();
