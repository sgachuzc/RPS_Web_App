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

(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()

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

document.querySelector('#phone').addEventListener('input', function (e) { 
  e.target.value = e.target.value.replace(/[^0-9]/g,'');
})