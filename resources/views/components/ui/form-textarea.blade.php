@props([
  'label' => '',
  'name' => ''
])

<div class="mb-3">
  <label for="{{ $name }}" class="form-label">{{ $label }}</label>
  <textarea class="form-control" name="{{ $name }}" id="{{ $name }}" rows="3">{{ $slot }}</textarea>
</div>