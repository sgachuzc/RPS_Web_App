<x-layout>
  <x-public-index.hero />
  <x-public-index.offers />
  {{-- <x-public-index.statistics /> --}}
  <x-public-index.about />
  <x-public-index.carrusel :courses="$courses"/>
  <x-public-index.auditories />
  <x-public-index.contact />
</x-layout>