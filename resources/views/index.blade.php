<x-layout>
  <x-public-index.hero />
  <x-public-index.offers />
  <x-public-index.statistics />
  <form action="/certificates/validate" method="post">
      @csrf
      <input type="text" name="code">
      <button type="submit">Validar</button>
  </form>
</x-layout>