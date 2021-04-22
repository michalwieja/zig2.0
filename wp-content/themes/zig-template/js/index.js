//menu

const hamburger = document.querySelector('.hamburger');
const nav = document.querySelector('.header__nav');
const header = document.querySelector('.header');

hamburger.addEventListener('click', () => handleHamburgerClick());

if (window.location.pathname === '/dolacz/') {
  header.classList.add('inverted');
} else {
  header.classList.remove('inverted');
}

const handleHamburgerClick = () => {
  hamburger.classList.toggle('active');
  nav.classList.toggle('active');
};

//end menu


