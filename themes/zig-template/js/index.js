//menu

const hamburger = document.querySelector('.hamburger');
const nav = document.querySelector('.header__nav');
const header = document.querySelector('.header');
const carousel_post = document.querySelectorAll('time.entry-date');

const setOpacityOnLastPost = () => {
  setInterval(() => {
    const res = document.querySelectorAll('.slick-slide.slick-active');
    if (res && res.length > 1) {
      const last = res.length - 1;
      const one_before_last = last > 1 ? last - 1 : 0;
      if (!res[last].classList.contains('semiopaque') || res[one_before_last].classList.contains(
        'semiopaque')) {
        res.forEach(el => {
          el.classList.remove('semiopaque');
        });
        res[last].classList.add('semiopaque');
      }
    }
  }, 100);
};

const formatTime = () => {
  if (carousel_post && carousel_post.length) {
    carousel_post.forEach((post) => {
      const t = post.attributes.datetime.nodeValue;
      const date = new Date(t);
      post.innerHTML = date.toLocaleDateString();
    });
  }
};

hamburger.addEventListener('click', () => handleHamburgerClick());
formatTime();
setOpacityOnLastPost();

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


