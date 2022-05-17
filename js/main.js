const menuBtn = document.querySelector('.menu-btn');
const hamburger = document.querySelector('.menu-btn-burger');
const nav = document.querySelector('nav');

menuBtn.addEventListener('click', toggleMenu);

function toggleMenu() {
    hamburger.classList.toggle('open');
    nav.classList.toggle('open');

    // if (nav.classList.contains('open')) {
    //     nav.addEventListener('transitionend', () => {nav.style.visibility = 'hidden';});
    //     nav.classList.toggle('open');
        
    // } else if (!nav.classList.contains('open')) {
    //     nav.addEventListener('transitionstart', () => {nav.style.visibility = 'visible';});
    //     nav.classList.toggle('open');
    // }
}