<x-admin-layout>
  <div class="profile_card">
    <h2>Información de la cuenta</h2>
    <p><strong>Nombre: </strong>{{ $user->name }}</p>
    <p><strong>Usuario: </strong>{{ $user->username }}</p>
    <p><strong>Correo: </strong>{{ $user->email }}</p>
    <p><strong>Rol: </strong>{{ $user->role->name }}</p>
  </div>
  <div class="profile_card">
    <h2>Cambiar rol</h2>
    <p style="margin-bottom: 15px">Ingresa tu contraseña para confirmar</p>
    <form action="/adminonline/users/{{ $user->id }}" method="POST">
      @csrf
      @method('patch')
      <x-ui.form-select :hasLabel="false" name="role_id">
        <option value="">Seleccione un rol</option>
        @foreach ($roles as $role)
          <option value="{{ $role->id }}">{{ $role->name }}</option>
        @endforeach
      </x-ui.form-select>
      <x-ui.form-field type="password" name="current_password">
        Contraseña
      </x-ui.form-field>
      <x-ui.button type="submit">
        Actualizar
      </x-ui.button>
    </form>
  </div>
</x-admin-layout>