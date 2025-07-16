<x-layout>
  <section class="container my-5">
    <div class="row">
      <div class="col-12">
        @if (count($courses) == 0)
        <div class="text-center my-5">
          <img src="{{ Vite::asset('resources/images/not-results.svg') }}" alt="" width="300">
          <h1>No se encontraron resultados</h1>
        </div>
        @else
          @foreach ($courses as $course)
            <x-ui.services-card name="{{ $course->name }}" subtitle="{{ $course->subtitle }}" featured="{{ $course->featured }}"/>        
          @endforeach
        @endif
      </div>
    </div>
  </section>
</x-layout>