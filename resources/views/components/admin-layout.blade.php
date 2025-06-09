<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <title>RPS - Administrador</title>
</head>
<body>
  <main>
    @auth
      <x-ui.navbar>
        <x-ui.nav-link href="/" :active="request()->is('/')">Inicio</x-ui.nav-link>
        <x-ui.nav-link href="/usuarios" :active="request()->is('usuarios')">Usuarios</x-ui.nav-link>
        <x-ui.nav-link href="/servicios" :active="request()->is('servicios')">Servicios</x-ui.nav-link>
        <x-ui.nav-link href="/inscripciones" :active="request()->is('inscripciones')">Inscripciones</x-ui.nav-link>
        <x-ui.nav-link href="/logout">Cerrar sesión</x-ui.nav-link>
      </x-ui.navbar>
    @endauth
    {{ $slot }}
    @auth
      <x-ui.mini-footer />
    @endauth
  </main>
</body>
</html>