// import Swiper, { Navigation, Pagination, Mousewheel, Autoplay } from 'swiper';

console.log(
  `%c 
  
  HOME
  
  `,
  'color: red;padding-bottom:.5rem;font-size:1.2rem;'
);

// var swiper = new Swiper('.swiper', {
//   slidesPerView: 1,
//   spaceBetween: 30,
//   centeredSlides: true,
//   slidesPerView: 3,

//   loop: true,
//   // pagination: {
//   //   el: '.swiper-pagination',
//   //   clickable: true,
//   // },
//   // navigation: {
//   //   nextEl: '.swiper-button-next',
//   //   prevEl: '.swiper-button-prev',
//   // },
// });

if (document.querySelector('.swiper')) {
  import(
    /* webpackChunkName: "swiper-carrusel" */
    /* webpackMode: "lazy" */
    './js/swiper-carrusel'
  ).then(module => {
    module.swiperCarrusel.init();
  });
}
