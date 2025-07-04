<section class="container my-5">
  <div class="row">
    <div class="col-12">
      <h2 class="text-center mb-5" data-aos="fade-in">¿Qué ofrecemos?</h2>
      <div class="row">
        <div class="col-12 col-md-6 mx-auto mb-3 offer_container" style="max-width: 30rem;">
          <x-ui.public-data-card class="offer_card p-5 rounded-0" aos="fade-right">
            <div class="d-flex flex-column justify-content-center align-items-center text-center ">
              <img class="mb-5" src="{{ Vite::asset('resources/images/card_todo.svg') }}" alt="" width="240px">
              <h5>Cursos y auditorías</h5>
              <p class="card-text">Transforma tu equipo con nuestros cursos y descubre áreas de mejora con auditorías personalizadas.</p>
              <div class="col-12 mb-1">
                <a class="btn button_custom_primary" href="#">Ver servicios</a>
              </div>
            </div>
          </x-ui.public-data-card>
        </div>
        <div class="col-12 col-md-6 mx-auto mb-3 offer_container" style="max-width: 30rem;">
          <x-ui.public-data-card class="offer_card p-5 rounded-0" aos="fade-left">
             <div class="d-flex flex-column justify-content-center align-items-center text-center ">
              <img class="mb-5" src="{{ Vite::asset('resources/images/card_certificate.svg') }}" alt="" width="110px">
              <h5>Certifica a tus empleados</h5>
              <p class="card-text">Convertimos tu mejora continua en un logro reconocido: certificados con respaldo profesional que marcan la diferencia.</p>
              <div class="col-12 mb-1">
                <a class="btn button_custom_primary" href="#">Validar ahora</a>
              </div>
            </div>
          </x-ui.public-data-card>
        </div>
      </div>
    </div>
  </div>
</section>