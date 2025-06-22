@props([
  'label' => '',
  'name' => ''
])

<div class="container_form-textarea">
  <label for="{{ $name }}">
    {{ $label }}
  </label>
  <textarea name="{{ $name }}" id="{{ $name }}" class="form-textarea" autocomplete="off" required>{{ $slot }}</textarea>
</div>