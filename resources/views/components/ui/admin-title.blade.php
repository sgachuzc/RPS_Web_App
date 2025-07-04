<div class="row">
  <div class="container-fluid d-flex justify-content-between">
    <h1 class="mb-0">{{ $slot }}</h1>
    <a class="btn button_custom_primary d-flex align-items-center justify-content-around gap-2" {{ $attributes }}>
      <x-ui.icon icon="add_circle"/>
      Nuevo
    </a>
  </div>
</div>