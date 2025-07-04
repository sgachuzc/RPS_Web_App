@props([
  'aos' => 'fade-in'
])

<div {{ $attributes->merge(['class' => 'card border-0 h-100']) }} data-aos="{{ $aos }}">
  {{ $slot }}
</div>