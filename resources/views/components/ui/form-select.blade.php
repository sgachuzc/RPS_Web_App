@props([
  'hasLabel' => true,
  'label' => '',
  'name' => ''
])

<div class="container-form-select">
  @if ($hasLabel)
  <label for={{ $name }}>{{ $label }}</label>  
  @endif
  <select class="form-select" name="{{ $name }}" id="{{ $name }}" required>
    {{ $slot }}
  </select>
</div>