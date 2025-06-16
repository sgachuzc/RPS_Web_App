@props([
  'name' => '',
  'checked' => false
])

@php
  $isChecked = ($checked) ? 'checked' : '';
@endphp

<div class="container_form-checkbox">
  <label for="{{ $name }}">
    {{ $slot }}
  </label>
  <input class="form-checkbox" type="checkbox" name="{{ $name }}" id="{{ $name }}" {{ $isChecked }}>
</div>