<x-admin-layout>
  <x-ui.admin-form-card icon="account_box" title="Información del usuario">
    <p class="form-text mb-2">
      <strong>Nombre:</strong> {{ $user->name }}
    </p>
    <p class="form-text mb-2">
      <strong>Correo:</strong> {{ $user->email }}
    </p>
    <p class="form-text mb-2">
      <strong>Usuario:</strong> {{ $user->username }}
    </p>
    <p class="form-text mb-2">
      <strong>Rol:</strong> {{ $user->role->name }}
    </p>
  </x-ui.admin-form-card>
  <x-ui.admin-form-card icon="account_box" title="Actualizar rol de usuario">
    <form class="needs-validation" novalidate method="POST" action="/adminonline/users/{{ $user->id }}">
      @csrf
      @method('patch')
      <x-ui.form-select label="Rol" name="role_id" :isRequired="true">
        <option value="">Seleccione un rol</option>
        @foreach ($roles as $role)
          <option value="{{ $role->id }}">{{ $role->name }}</option>
        @endforeach
      </x-ui.form-select>
      <x-ui.form-field type="password" name="current_password" :isRequired="true">
        Contraseña
      </x-ui.form-field>
      <div class="form-text mb-2">
        Ingrese su contraseña para confirmar
      </div>
      <div class="col-12 mt-4 mb-3">
        <button class="btn btn-primary" type="submit">Guardar</button>
      </div>
    </form>
  </x-ui.admin-form-card>
</x-admin-layout>