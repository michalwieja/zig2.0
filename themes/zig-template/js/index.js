//menu

const hamburger = document.querySelector('.hamburger');
const nav = document.querySelector('.header__nav');
const header = document.querySelector('.header');
const wrapper = document.querySelector('.wrapper');
let interval = null;

const getHomeCarouselElements = () => {
  const carousel_post = document.getElementsByClassName('slick-slide');
  const carousel_post_time = document.querySelectorAll('time.entry-date');
  return { carousel_post, carousel_post_time };
};

const setOpacityOnLastPost = () => {
  interval = setInterval(() => {
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

const formatTime = (carousel_post_time) => {
  if (carousel_post_time && carousel_post_time.length) {
    carousel_post_time.forEach((post) => {
      const t = post.attributes.datetime.nodeValue;
      const date = new Date(t);
      post.innerHTML = date.toLocaleDateString();
    });
  }
};

const injectReadMoreButton = (carousel_post) => {
  const posts = Array.from(carousel_post);
  posts.forEach((post) => {
    const post_content = post.querySelector('.wpcp-single-item > .wpcp-all-captions');
    if (!post_content) return;
    post_content.innerHTML += '<button class="read-more">Czytaj więcej</button>';
    const location = post.querySelector('.wpcp-post-title a');
    if (!location) return;
    const button = post.querySelector('button.read-more');
    if (!button) return;
    button.addEventListener('click', () => {
      window.location = location.href;
    });
  });
};

const checkCarousels = () => {
  // TODO - check id's in production
  const homeCarouselChjoeck = document.getElementById('sp-wp-carousel-free-id-395');
  const aboutCarouselCheck = document.getElementById('sp-wp-carousel-free-id-499');
  return !!homeCarouselCheck || !!aboutCarouselCheck;
};

const homeCarouselFunctions = () => {
  if (!checkCarousels()) {
    clearInterval(interval);
    return;
  }
  const { carousel_post, carousel_post_time } = getHomeCarouselElements();
  formatTime(carousel_post_time);
  injectReadMoreButton(carousel_post);
  setOpacityOnLastPost();
};

// Change header colour
// if (['/dolacz/', '/dolacz', 'dolacz'].includes(window.location.pathname) || window.location.search === '?page_id=29') {
//   header.classList.add('inverted');
// } else {
//   header.classList.remove('inverted');
// }

const handleHamburgerClick = () => {
  hamburger.classList.toggle('active');
  nav.classList.toggle('active');
  wrapper.classList.toggle('active')

};

//end menu

const handleActiveCategory = () => {
  const urls = ['category/wszystkie', 'category/strefa-prawo-podatki-finanse', 'category/strefa-marketing-hr-sprzedaz', 'category/strefa-lidera', 'category/aktualnosci']

  urls.forEach(url => {
    if (window.location.href.indexOf(url) > -1) {
      const link = document.querySelector(`a[href = "/${url}"]`);
      link.querySelector('button').classList.add('active')
    }
  })
};

handleActiveCategory();

document.addEventListener("DOMContentLoaded", homeCarouselFunctions);

hamburger.addEventListener('click', () => handleHamburgerClick());
