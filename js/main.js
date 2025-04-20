

// ---------------- preloader -------------------- //

gsap.config({ trialWarn: false });
gsap.set('svg', {
   visibility: 'visible'
});

let tl = gsap.timeline({
   repeat: -1, yoyo: true, defaults: {
      ease: 'sine.inOut',
      duration: 1.2
   }
});
tl.fromTo('#gradDot', {
   x: 90
}, {
   x: -90
})
   .fromTo('#fillDot', {
      x: -90
   }, {
      x: 90
   }, 0)
   .fromTo('#mainGrad', {
      attr: {
         cx: 230,
         fx: 230
      }
   }, {
      attr: {
         cx: 570,
         fx: 570
      }
   }, 0);

var loader = document.getElementById("preloader");

window.addEventListener("load", function () {
   loader.style.display = "none";
});

// ---------------------- aos (animation on scroll) --------------------//

window.addEventListener('load', () => {
   AOS.init({
      duration: 500,
      easing: 'fade-up',
      once: true,
      mirror: false
   });
});

// ------------- sticky navbar on scroll ---------------- //

$(window).scroll(function () {
   if ($(window).scrollTop()) {
      $(".navbar").addClass("sticky");
   } else {
      $(".navbar").removeClass("sticky");
   }
});

// ------------- switch between dark and light mode ---------------- //

function toggleDarkMode() {
   const body = document.body;
   const icon = document.getElementById('mode-icon');

   body.classList.toggle('dark-mode');

   if (body.classList.contains('dark-mode')) {
      icon.classList.remove('bi-moon-fill');
      icon.classList.add('bi-sun-fill');
   } else {
      icon.classList.remove('bi-sun-fill');
      icon.classList.add('bi-moon-fill');
   }

   const isDarkMode = body.classList.contains('dark-mode');
   localStorage.setItem('dark-mode', isDarkMode);
}

const isDarkModeSaved = localStorage.getItem('dark-mode');

if (isDarkModeSaved === 'true') {
   document.body.classList.add('dark-mode');
} else {
   document.body.classList.remove('dark-mode');
}

const icon = document.getElementById('mode-icon');
if (icon) {
   if (isDarkModeSaved === 'true') {
      icon.classList.add('bi-sun-fill');
   } else {
      icon.classList.add('bi-moon-fill');
   }
}

const modeToggle = document.getElementById('mode-toggle');
if (modeToggle) {
   modeToggle.addEventListener('click', toggleDarkMode);
}

// ================== portfolio filter ====================== //

$(document).ready(function () {
   var $grid = $('.row.portfolio-row').isotope({
      itemSelector: '.col-lg-4',
      layoutMode: 'fitRows'
   });

   $('.filters').on('click', 'a', function () {
      var filterValue = $(this).attr('data-filter');
      $grid.isotope({ filter: filterValue });
   });
});

function rotateIcon(iconId) {
   const icon = document.getElementById(iconId);
   icon.classList.toggle('rotated');
}

// ---------------- back to top button -------------------- //

let calcScrollValue = () => {
   let scrollProgress = document.getElementById("progress");
   if (!scrollProgress) return;

   let progressValue = document.getElementById("progress-value");
   let pos = document.documentElement.scrollTop;
   let calcHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
   let scrollValue = Math.round((pos * 100) / calcHeight);

   if (pos > 100) {
      scrollProgress.style.display = "grid";
   } else {
      scrollProgress.style.display = "none";
   }

   scrollProgress.style.background = `conic-gradient(#1FA84F ${scrollValue}%, #d7d7d7 ${scrollValue}%)`;
};

let scrollProgress = document.getElementById("progress");
if (scrollProgress) {
   scrollProgress.addEventListener("click", () => {
      document.documentElement.scrollTop = 0;
   });
}

if (document.getElementById("progress")) {
   window.addEventListener("scroll", calcScrollValue);
   window.addEventListener("load", calcScrollValue);
}

// ---------------- particles  -------------------- //

document.addEventListener("DOMContentLoaded", function () {
   const particlesContainer = document.getElementById("particles-js");
   if (particlesContainer) {
      particlesJS("particles-js", {
         "particles": {
            "number": {
               "value": 80,
               "density": {
                  "enable": true,
                  "value_area": 800
               }
            },
            "color": {
               "value": "#999"
            },
            "shape": {
               "type": "circle",
               "stroke": {
                  "width": 0,
                  "color": "#999"
               },
               "polygon": {
                  "nb_sides": 3
               }
            },
            "opacity": {
               "value": 0.5,
               "random": false,
               "anim": {
                  "enable": false,
                  "speed": 1,
                  "opacity_min": 0.1,
                  "sync": false
               }
            },
            "size": {
               "value": 3,
               "random": true,
               "anim": {
                  "enable": false,
                  "speed": 40,
                  "size_min": 0.1,
                  "sync": false
               }
            },
            "line_linked": {
               "enable": true,
               "distance": 100,
               "color": "#999",
               "opacity": 0.4,
               "width": 1
            },
            "move": {
               "enable": true,
               "speed": 6,
               "direction": "none",
               "random": false,
               "straight": false,
               "out_mode": "out",
               "bounce": false,
               "attract": {
                  "enable": false,
                  "rotateX": 600,
                  "rotateY": 1200
               }
            }
         },
         "interactivity": {
            "detect_on": "canvas",
            "events": {
               "onhover": {
                  "enable": true,
                  "mode": "repulse"
               },
               "onclick": {
                  "enable": true,
                  "mode": "push"
               },
               "resize": true
            },
            "modes": {
               "grab": {
                  "distance": 400,
                  "line_linked": {
                     "opacity": 1
                  }
               },
               "bubble": {
                  "distance": 400,
                  "size": 40,
                  "duration": 2,
                  "opacity": 8,
                  "speed": 3
               },
               "repulse": {
                  "distance": 200
               },
               "push": {
                  "particles_nb": 4
               },
               "remove": {
                  "particles_nb": 2
               }
            }
         }
      });
   }
});

// ---------------- tilt.js init -------------------- //

if (typeof VanillaTilt !== 'undefined') {
   VanillaTilt.init(document.querySelectorAll("[data-tilt]"), {
      max: 20,
      speed: 300,
      glare: true,
      "max-glare": 0.1
   });
}
