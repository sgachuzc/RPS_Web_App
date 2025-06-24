@props([
  'label' => '',
  'name' => '',
  'isRequired' => false,
])

<div class="mb-3 text-left">
  <label for="inputState" class="form-label">{{ $label }}</label>
  <select class="form-select" name="{{ $name }}" id="{{ $name }}" {{ ($isRequired) ? "required" : '' }}>
    {{ $slot }}
  </select>
</div>