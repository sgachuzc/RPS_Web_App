@props([
  'number' => 0,
  'title' => '',
  'icon' => ''
])

<div class="card h-100 text-center shadow data-card">
  <div class="card-body">
    <div class="display-4 text-primary" style="height: 80px">
      <x-ui.icon icon="{{ $icon }}"/>
    </div>
    <h2 class="card-title">{{ $number }}</h2>
    <p class="card-text text-muted">{{ $title }}</p>
  </div>
</div>