import '../css/home.css';
import.meta.glob([
    '../images/**',
    '../img/**'
  ]);

window.addEventListener("scroll", function() {
    let header = document.querySelector('#header');

    if (window.innerWidth <= 768) {
        if (window.scrollY > 30) {
            header.classList.add('scroll');
        } else {
            header.classList.remove('scroll');
        }
    } else { 
        if (window.scrollY > 300) {
            header.classList.add('scroll');
        } else {
            header.classList.remove('scroll');
        }
    }
});