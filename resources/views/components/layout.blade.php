<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
  @vite(['resources/css/app.css', 'resources/js/script.js'])
  <title>RPS</title>
</head>
<style>
  body{
    display: grid !important;
    grid-template-rows: 70px 1fr auto;
    min-height: 100dvh;
  }
</style>
<body>
  <x-ui.navbar>
    <x-ui.nav_links href="/" :active="request()->is('/')">Inicio</x-ui.nav_links>
    <x-ui.nav_links href="/cursos" :active="request()->is('cursos')">Cursos</x-ui.nav_links>
    <x-ui.nav_links href="/servicios" :active="request()->is('servicios')">Otros servicios</x-ui.nav_links>
    <x-ui.nav_links href="/nosotros" :active="request()->is('nosotros')">Nosotros</x-ui.nav_links>
    <x-ui.nav_links href="/contacto" :active="request()->is('contacto')">Contacto</x-ui.nav_links>
  </x-ui.navbar>
  <main class="d-grid" style="width: 100%; margin: 0; overflow:hidden; background-color: var(--fourth)">
    {{ $slot }}
  </main>
  <x-ui.footer/>
</body>
</html>