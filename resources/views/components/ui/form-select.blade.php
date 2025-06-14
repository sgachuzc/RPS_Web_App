@props([
  'label' => '',
  'name' => ''
])

<div class="container-form-select">
  <label for={{ $name }}>{{ $label }}</label>
  <select class="form-select" name="{{ $name }}" id="{{ $name }}" required>
    {{ $slot }}
  </select>
</div>