<x-admin-layout>
  <div class="container_login">
    <form method="POST" action="{{ route('password.update') }}">
      <h2 style="margin-bottom: 15px;">Restablecer contraseña</h2>
      @csrf
      <input type="hidden" name="token" value="{{ $token }}">
      <x-ui.form-field type="email" name="email" value="{{ $email ?? old('email') }}">
        Correo electrónico
      </x-ui.form-field>
      <x-ui.form-field type="password" name="password">
        Nueva contraseña
      </x-ui.form-field>
      <x-ui.form-field type="password" name="password_confirmation">
        Confirmar nueva contraseña
      </x-ui.form-field>
      <x-ui.button type="submit">
        Restablecer contraseña
      </x-ui.button>
    </form>
  </div>
</x-admin-layout>