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
  @auth
    <x-ui.navbar>
      <x-ui.nav-link href="/adminonline/index" :active="request()->is('adminonline/index')">Inicio</x-ui.nav-link>
      <x-ui.nav-link href="/adminonline/users" :active="request()->is('adminonline/users')">Usuarios</x-ui.nav-link>
      <x-ui.nav-link href="/adminonline/services" :active="request()->is('adminonline/services')">Servicios</x-ui.nav-link>
      <x-ui.nav-link href="/adminonline/inscriptions" :active="request()->is('adminonline/inscriptions')">Inscripciones</x-ui.nav-link>
      <x-ui.nav-link href="/logout">Cerrar sesión</x-ui.nav-link>
    </x-ui.navbar>
  @endauth
  <main>
    {{ $slot }}
  </main>
  @auth
    <x-ui.mini-footer />
  @endauth
</body>
</html>