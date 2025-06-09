@props([
  'element' => 'button',
  'type' => 'button',
])

@if ($element === 'link')
  <a {{ $attributes }} class="generic_button">
    {{ $slot }}
  </a>
@else
  <button class="generic_button" type="{{ $type }}">
    {{ $slot }}
  </button>
@endif