@props([
  'type' => 'text',
  'name' => '',
  'min' => '',
  'isRequired' => false,
  'isReadonly' => false,
  'value' => '',
  'placeholder' => ''
])

<div class="mb-3 text-left">
  <label for="{{ $name }}" class="form-label">{{ $slot }}</label>
  <input 
    class="form-control" 
    type="{{ $type }}"
    name="{{ $name }}" 
    id="{{ $name }}"
    value="{{ $value }}"
    {{ ($isRequired) ? "required" : '' }}
    {{ ($isReadonly) ? "readonly" : '' }}
     {{ $min !== '' ? "min=$min" : '' }}
    placeholder="{{ $placeholder }}"
  >
  @error($name)
  <div class="mt-1" style="color:red;">
    {{ $message }}
  </div>
  @enderror
</div>