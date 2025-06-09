<x-admin-layout>
  <div class="container_login">
    <form action="" autocomplete="off">
      <img src="{{ Vite::asset('resources/images/rps.png') }}" alt="RPS" width="70">
      <h1>Iniciar sesión</h1>
      <x-ui.form-field type="email" name="email">
        Correo electrónico
      </x-ui.form-field>
      <x-ui.form-field type="password" name="password">
        Contraseña
      </x-ui.form-field>
      <x-ui.button type="submit">
        Iniciar sesión
      </x-ui.button>
    </form>
  </div>
</x-admin-layout>