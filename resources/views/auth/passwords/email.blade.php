<x-admin-layout>
  <div class="container_login">
    <form method="POST" action="{{ route('password.email') }}">
      <h1>Restablecer contraseña</h1>
      @csrf
      <x-ui.form-field type="email" name="email">
        Correo electrónico
      </x-ui.form-field>
      <x-ui.button type="submit">
        Restablecer
      </x-ui.button>
      @if (session('status'))
          <div class="alert alert-success" style="margin: 30px 0 0;">{{ session('status') }}</div>
      @endif
    </form>
  </div>
</x-admin-layout>