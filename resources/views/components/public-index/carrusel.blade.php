@props([
  'courses' => [],
  'isPage' => false
])

@if ($isPage)
  <section class="container mt-5">
    <div class="d-flex gap-3 justify-contenet-center align-items-center">
      <div style="width: 10px; height: 10px; background-color: var(--second);"></div>
      <h2 class="mb-0">Cursos destacados</h2>
    </div>
  </section>
@endif
<section class="container my-5" style="width: 80dvw;">
  <div class="row">
    <div class="col-12">
      @if (!$isPage)
        <h2 class="text-center mb-5" data-aos="fade-in">Cursos destacados</h2>
      @endif
      <div class="carrusel_courses w-100">
        @foreach ($courses as $course)
        <x-ui.course-card id="{{ $course->id }}" name="{{ $course->name }}" subtitle="{{ $course->subtitle }}"/>
        @endforeach
      </div>
    </div>
  </div>
</section>