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
  {{-- @auth --}}
    <x-ui.navbar>
      <x-ui.nav-link href="/adminonline" :active="request()->is('/')">Inicio</x-ui.nav-link>
      <x-ui.nav-link href="/adminonline/usuarios" :active="request()->is('usuarios')">Usuarios</x-ui.nav-link>
      <x-ui.nav-link href="/adminonline/servicios" :active="request()->is('servicios')">Servicios</x-ui.nav-link>
      <x-ui.nav-link href="/adminonline/inscripciones" :active="request()->is('inscripciones')">Inscripciones</x-ui.nav-link>
      <x-ui.nav-link href="/adminonline/logout">Cerrar sesión</x-ui.nav-link>
    </x-ui.navbar>
  {{-- @endauth --}}
  <main>
    {{ $slot }}
  </main>
  {{-- @auth --}}
    <x-ui.mini-footer />
  {{-- @endauth --}}
</body>
</html>