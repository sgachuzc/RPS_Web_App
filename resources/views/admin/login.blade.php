<x-admin-layout>
  <div class="container_login">
    <form method="post" action="/login" autocomplete="off">
      @csrf
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
      <div style="margin-top: 2rem; text-align: right;">
        <a style="text-decoration: none; color: var(--color-purple)" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
      </div>
    </form>
  </div>
</x-admin-layout>