@props([
  'type',
  'name'
])

<div class="container_form-field">
    <div class="wrapper_input-label">
        <input type="{{ $type }}" class="generic_input" name="{{ $name }}" id="{{ $name }}" placeholder="" autocomplete="off" required>
        <label for="{{ $name }}" class="generic_label">
          {{ $slot }}
        </label>
    </div>
</div>