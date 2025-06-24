<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <title>RPS - Administrador</title>
</head>
<body class="body">
  @auth
    <x-ui.admin-navbar>
      <div class="d-flex flex-column h-100" style="justify-content: space-between;">
        <div class="row">
          <div class="col-12">
            <x-ui.admin-nav-link href="/adminonline/index" :active="request()->is('adminonline/index')" icon="home">
              Inicio
            </x-ui.admin-nav-link>
            @can('admin')
              <x-ui.admin-nav-link href="/adminonline/users" :active="request()->is('adminonline/users')" icon="folder_supervised">
                Usuarios
              </x-ui.admin-nav-link>
            @endcan
            <x-ui.admin-nav-link href="/adminonline/services" :active="request()->is('adminonline/services')" icon="apps">
              Servicios
            </x-ui.admin-nav-link>
            <x-ui.admin-nav-link href="/adminonline/inscriptions" :active="request()->is('adminonline/inscriptions')">Inscripciones</x-ui.admin-nav-link>
          </div>
        </div>
        <div class="row d-flex align-items-end">
          <div class="col-12">
            <x-ui.admin-nav-link href="/adminonline/profile" :active="request()->is('adminonline/profile')" icon="account_circle">Mi Perfil</x-ui.admin-nav-link>
            <x-ui.admin-nav-link href="/logout" icon="mode_off_on">Cerrar sesión</x-ui.admin-nav-link>
          </div>
        </div>
      </div>
    </x-ui.admin-navbar>
  @endauth
  <main class="container">
    {{ $slot }}
  </main>
  @auth
    <x-ui.mini-footer />
  @endauth
</body>
</html>