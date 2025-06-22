<x-admin-layout>
  <section class="section_container">
    @if (session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
    @endif
    <div class="profile_card">
      <h2>Información de tu cuenta</h2>
      <p><strong>Nombre: </strong>{{ $user->name }}</p>
      <p><strong>Usuario: </strong>{{ $user->username }}</p>
      <p><strong>Correo: </strong>{{ $user->email }}</p>
      <p><strong>Rol: </strong>{{ $user->role->name }}</p>
    </div>
    <div class="profile_card">
      <h2>Cambiar correo electrónico</h2>
      <span>Ingresa tu contraseña para confirmar</span>
      <form action="/adminonline/updateEmail" method="POST">
        @csrf
        @method('patch')
        <x-ui.form-field type="email" name="email">
          Correo electrónico
        </x-ui.form-field>
        <x-ui.form-field type="password" name="current_password">
          Contraseña
        </x-ui.form-field>
        <x-ui.button type="submit">
          Actualizar
        </x-ui.button>
      </form>
    </div>
    <div class="profile_card">
      <h2>Cambiar contraseña</h2>
      <form action="/adminonline/updatePassword" method="POST">
        @csrf
        @method('patch')
        <x-ui.form-field type="password" name="current_password_updated">
          Contraseña actual
        </x-ui.form-field>
        <x-ui.form-field type="password" name="password">
          Nueva contraseña
        </x-ui.form-field>
        <x-ui.form-field type="password" name="password_confirmation">
          Confirmar nueva contraseña
        </x-ui.form-field>
        <x-ui.button type="submit">
          Actualizar
        </x-ui.button>
      </form>
    </div>
  </section>
</x-admin-layout>