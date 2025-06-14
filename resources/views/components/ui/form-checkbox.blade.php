@props([
  'name' => '',
  'checked' => false
])

<div class="container_form-checkbox">
  <label for="{{ $name }}">
    {{ $slot }}
  </label>
  <input class="form-checkbox" type="checkbox" name="{{ $name }}" id="{{ $name }}" {{ ($checked) ? 'checked' : '' }} required>
</div>