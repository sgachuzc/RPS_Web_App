@props([
  'type',
  'name',
  'active' => true,
  'value' => ''
])

<div class="container_form-field">
    <div class="wrapper_input-label">
        <input type="{{ $type }}" class="generic_input" name="{{$name}}" id="{{ $name }}" {{ ($active) ? '' : 'disabled' }} placeholder="" autocomplete="off" required value="{{ $value }}">
        <label for="{{ $name }}" class="generic_label">
          {{ $slot }}
        </label>
    </div>
</div>
<x-ui.form-error name="{{ $name }}" />