@props([
  'imgSource' => 'resources/images/register_cover.svg'
])

<div class="row">
  <div class="col-12 col-md-6 mx-auto">
    <div class="card mb-3 w-100 mx-auto border-primary-subtle">
      <img src="{{ Vite::asset($imgSource) }}" class="card-img-top" alt="" height="150" style="object-fit: cover;">
      {{ $slot }}
    </div>
  </div>
</div>