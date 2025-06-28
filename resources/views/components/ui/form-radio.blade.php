@props([
  'id' => '',
  'name' => '',
  'isRequired' => false,
  'value' => ''
])

<div class="form-check">
  <input class="form-check-input" type="radio" name="{{ $name }}" id="{{ $name }}" value="{{ $value }}" {{ ($isRequired) ? 'required' : '' }}>
  <label class="form-check-label" for="{{ $id }}">
    {{ $slot }}
  </label>
</div>