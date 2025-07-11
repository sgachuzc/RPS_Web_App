@props([
  'courses' => []
])

<section class="container my-5" style="width: 80dvw;">
  <div class="row">
    <div class="col-12">
      <h2 class="text-center mb-5" data-aos="fade-in">Cursos destacados</h2>
      <div class="carrusel_courses w-100">
        @foreach ($courses as $course)
        <x-ui.course-card id="{{ $course->id }}" name="{{ $course->name }}" subtitle="{{ $course->subtitle }}"/>
        @endforeach
      </div>
    </div>
  </div>
</section>