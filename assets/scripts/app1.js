const hero_slide_items = document.querySelectorAll('.slide');
let hero_slide_index = 0;
let hero_slide_play = true;
const hero_slide_items_control = document.querySelectorAll('.slide__control__item');

console.log(hero_slide_items);

const slide_next = document.querySelector('.slide__control_next');

const slide_prev = document.querySelector('.slide__control_prev');

const showSlide = (index) => {
  document.querySelector('.slide.active').classList.remove('active');
  document.querySelector('.slide__control__item.active').classList.remove('active');
  hero_slide_items[index].classList.add('active');
  hero_slide_items_control[index].classList.add('active');
};

const nextSlide = () => {
  hero_slide_index = hero_slide_index + 1 === hero_slide_items.length ? 0 : hero_slide_index + 1;

  showSlide(hero_slide_index);
};

const prevSlide = () => {
  hero_slide_index = hero_slide_index - 1 < 0 ? hero_slide_items.length - 1 : hero_slide_index - 1;

  showSlide(hero_slide_index);
};

if (slide_next && slide_prev) {
  slide_next.addEventListener('click', () => nextSlide());
  slide_prev.addEventListener('click', () => prevSlide());
  hero_slide_items_control.forEach((item, index) => {
    item.addEventListener('click', () => showSlide(index));
  });

  setInterval(() => {
    nextSlide();
  }, 3000);
}

const showMenu = (toggleId, navbarId, bodyId) => {
  const toggle = document.getElementById(toggleId),
    navbar = document.getElementById(navbarId),
    bodypadding = document.getElementById(bodyId);

  if (toggle && navbar) {
    toggle.addEventListener('click', () => {
      navbar.classList.toggle('expander');

      bodypadding.classList.toggle('body-pd');
    });
  }
};
showMenu('nav-toggle', 'navbar', 'body-pd');

/*===== LINK ACTIVE  =====*/
const linkColor = document.querySelectorAll('.nav__link');
function colorLink() {
  linkColor.forEach((l) => l.classList.remove('active'));
  this.classList.add('active');
}
linkColor.forEach((l) => l.addEventListener('click', colorLink));

/*===== COLLAPSE MENU  =====*/
const linkCollapse = document.getElementsByClassName('collapse__link');
var i;

for (i = 0; i < linkCollapse.length; i++) {
  linkCollapse[i].addEventListener('click', function () {
    const collapseMenu = this.nextElementSibling;
    collapseMenu.classList.toggle('showCollapse');

    const rotate = collapseMenu.previousElementSibling;
    rotate.classList.toggle('rotate');
  });
}

// Update scroll position to the top of the page
window.onscroll = function() {scrollFunction()};
function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("scroll-to-top").style.display = "block";
  } else {
    document.getElementById("scroll-to-top").style.display = "none";
  }
}
function scrollToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
// Update scroll position to the top of the page

/* Show image on selected. */
const pictureInput = document.querySelector('#picture');
const selectedPictures = document.querySelector('#selected-pictures');

pictureInput.addEventListener('change', (event) => {
    selectedPictures.innerHTML = '';
    const files = event.target.files;
    for (let i = 0; i < files.length; i++) {
        const file = files[i];
        const img = document.createElement('img');
        img.src = URL.createObjectURL(file);
        img.width = 200;
        img.onload = () => {
            URL.revokeObjectURL(img.src);
        };
        selectedPictures.appendChild(img);
    }
});
/* Show image on selected. */
