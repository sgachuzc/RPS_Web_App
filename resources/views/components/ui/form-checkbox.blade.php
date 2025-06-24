@props([
  'name' => '',
  'isChecked' => false,
])

<div class="form-check">
  <input 
    class="form-check-input" 
    type="checkbox" 
    name="{{ $name }}" 
    id="{{ $name }}"
    {{ ($isChecked) ? 'checked' : '' }}
  >
  <label class="form-check-label" for="{{ $name }}">
    {{ $slot }}
  </label>
</div>