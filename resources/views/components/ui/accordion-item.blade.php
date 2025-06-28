@props([
  'target' => '',
  'title' => ''
])

<div class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $target }}" aria-controls="{{ $target }}">
      {{ $title }}
    </button>
  </h2>
  <div id="{{ $target }}" class="accordion-collapse collapse" data-bs-parent="#accordionCharts">
    <div class="accordion-body">
      {{ $slot }}
    </div>
  </div>
</div>