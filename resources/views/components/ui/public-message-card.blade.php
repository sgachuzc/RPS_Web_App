@props([
  'url' => '',
  'title' => '',
  'subtitle' => ''
])

<div class="row">
  <div class="col-12 col-md-6 mx-auto">
    <div class="card mb-3 p-2 w-100 mx-auto">
      <img src="{{ Vite::asset($url) }}"  class="card-img-top"  alt="" style="width: 300px; place-self: center;" >
      <h2 class="card-title mt-4 text-center">{{ $title }}</h2>
      <h4 class="card-text m-2 text-center">{{ $subtitle }}</h4>
      <div class="col-12 mt-2 mb-3 d-flex justify-content-center">
        <a class="btn button_custom_primary" href="/">Ir al sitio</a>
      </div>
    </div>
  </div>
</div>