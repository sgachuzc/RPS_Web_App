@props([
  'title',
  'link',
  'id'
])

<div class="table_container">
  <div class="table_header">
    <h1>{{ $title }}</h1>
    <x-ui.button element="link" href="{{ $link }}">
      Nuevo
    </x-ui.button>
  </div>
  <div class="table_content">
    <table id="{{ $id }}" class="display nowrap responsive compact">
      {{ $slot }}
    </table>
  </div>
</div>