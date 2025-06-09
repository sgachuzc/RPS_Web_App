@props(['name'])

@error($name)
  <p class="error_message">{{ $message }}</p>
@enderror