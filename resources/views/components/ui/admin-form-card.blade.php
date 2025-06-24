@props([
  'icon' => '',
  'title' => '',
])

<div class="row mb-3">
  <div class="col-12 col-md-6 mx-auto">
    <div class="card w-100 mx-auto">
      <div class="card-header d-flex align-items-center gap-2">
        <x-ui.icon icon="{{ $icon }}"/>
        {{ $title }}
      </div>
      <div class="card-body">
        {{ $slot }}
      </div>
    </div>
  </div>
</div>