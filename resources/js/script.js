import './bootstrap';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.css';
import 'slick-carousel';
import $ from 'jquery';
import AOS from 'aos';
import PureCounter from "@srexi/purecounterjs";

new PureCounter();
AOS.init();


$('.carrusel_courses').slick({
  infinite: true,
  slidesToShow: 3,
  slidesToScroll: 3,
  speed: 500,
  arrows: true,
  dots: true,
  adaptiveHeight: true,
  centerMode: false,
  responsive: [
      {
          breakpoint: 1200,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            centerMode: false
          }
      },
      {
          breakpoint: 1023,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            centerMode: false
          }
      },
      {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: false
          }
      }
  ]
});