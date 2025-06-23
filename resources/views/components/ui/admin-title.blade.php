<div class="row">
  <div class="container-fluid d-flex justify-content-between">
    <h1 class="mb-0">{{ $slot }}</h1>
    <a class="btn btn-primary d-flex align-items-center justify-content-around gap-2" {{ $attributes }}>
      <img src="{{ Vite::asset('resources/images/icon_new.svg') }}" alt="+">
      Nuevo
    </a>
  </div>
</div>