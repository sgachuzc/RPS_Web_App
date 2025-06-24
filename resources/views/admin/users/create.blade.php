<x-admin-layout>
  <x-ui.admin-form-card icon="account_box" title="Nuevo usuario">
    <form class="needs-validation" novalidate method="POST" action="/adminonline/users/create">
      @csrf
      <x-ui.form-field type="text" name="name" :isRequired="true">
        Nombre completo
      </x-ui.form-field>
      <div class="row">
        <div class="col">
          <x-ui.form-field type="email" name="email" :isRequired="true">
            Correo electrónico
          </x-ui.form-field>
        </div>
        <div class="col">
          <x-ui.form-field type="text" name="username" :isRequired="true">
            Usuario
          </x-ui.form-field>
        </div>
      </div>
      <x-ui.form-select label="Rol" name="role_id" :isRequired="true">
        <option value="">Seleccione un rol</option>
        @foreach ($roles as $role)
          <option value="{{ $role->id }}">{{ $role->name }}</option>
        @endforeach
      </x-ui.form-select>
      <div class="row">
        <div class="col">
          <x-ui.form-field type="password" name="password" :isRequired="true">
            Contraseña
          </x-ui.form-field>
          <x-ui.admin-password-format />
        </div>
        <div class="col">
          <x-ui.form-field type="password" name="password_confirmation" :isRequired="true">
            Confirma tu contraseña
          </x-ui.form-field>
        </div>
      </div>
      <div class="col-12 mt-2 mb-3">
        <button class="btn btn-primary" type="submit">Guardar</button>
      </div>
    </form>
  </x-ui.admin-form-card>
</x-admin-layout>