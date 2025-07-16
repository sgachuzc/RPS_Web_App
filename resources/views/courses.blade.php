<x-layout>
  <section class="container-fluid" style="background-color: var(--fifth);">
    <div class="row my-5">
      <div class="col-12 col-md-6 mx-auto">
        <form class="needs-validation" novalidate method="get" action="/search">
          @csrf
          <div class="row justify-content-center align-items-center">
            <div class="col-10">
              <x-ui.form-field type="text" name="q" :isRequired="true" placeholder="AMEF...">
                Buscar
              </x-ui.form-field>
            </div>
            <div class="col-2">
              <button class="btn button_custom_primary my-auto d-flex" type="submit">
                <x-ui.icon icon="search" />
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
  <x-public-index.carrusel :courses="$featuredCourses" :isPage="true"/>
  <section class="container mb-5">
    <div class="row">
      <div class="col-12">
        <div class="d-flex gap-3 justify-contenet-center align-items-center mb-4">
          <div style="width: 10px; height: 10px; background-color: var(--second);"></div>
          <h2 class="mb-0">Otros cursos</h2>
        </div>
        @foreach ($courses as $course)
          <x-ui.services-card name="{{ $course->name }}" subtitle="{{ $course->subtitle }}" featured="{{ $course->featured }}" description="{{ $course->description }}"/>   
        @endforeach
      </div>
    </div>
  </section>
</x-layout>