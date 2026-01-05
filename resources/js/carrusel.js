// import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle';

// import styles bundle
import 'swiper/css/bundle';

const swiper = new Swiper('.slider-wrapper', { // Asegúrate que este selector coincida con tu HTML
  direction: 'horizontal',
  loop: true,
  grabCursor: true,
  spaceBetween: 30, // Reducir un poco el espacio suele ayudar visualmente
  slidesPerView: 1, // Esto obliga a ver solo 1
  // autoplay: {
  //   delay: 2000,   
  // },
  effect: 'slide',

  // Asegura que el slide esté centrado
  centeredSlides: true, 
  centerInsufficientSlides: true,

  // Configuración de paginación y navegación
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },

  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});