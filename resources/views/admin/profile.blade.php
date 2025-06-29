<x-admin-layout>
  @if (session('success'))
    <x-ui.alert>
      {{ session('success') }}
    </x-ui.alert>
  @endif
  <x-ui.admin-form-card icon="account_box" title="Mi Perfil">
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
  <x-ui.admin-form-card icon="account_box" title="Actualizar correo electrónico">
    <form class="needs-validation" novalidate method="POST" action="/adminonline/updateEmail">
      @csrf
      @method('patch')
      <x-ui.form-field type="email" name="email" :isRequired="true">
        Correo electrónico
      </x-ui.form-field>
      <x-ui.form-field type="password" name="current_password" :isRequired="true">
        Contraseña
      </x-ui.form-field>
      <div class="form-text mb-2">
        Ingrese su contraseña para confirmar
      </div>
      <div class="col-12 mt-4 mb-3">
        <button class="btn btn-primary button_custom_primary w-100" type="submit">Actualizar</button>
      </div>
    </form>
  </x-ui.admin-form-card>
  <x-ui.admin-form-card icon="account_box" title="Actualizar contraseña">
    <form class="needs-validation" novalidate method="POST" action="/adminonline/updatePassword">
      @csrf
      @method('patch')
      <x-ui.form-field type="password" name="current_password_updated" :isRequired="true">
        Contraseña actual
      </x-ui.form-field>
      <x-ui.form-field type="password" name="password" :isRequired="true">
        Nueva contraseña
      </x-ui.form-field>
      <x-ui.admin-password-format />
      <x-ui.form-field type="password" name="password_confirmation" :isRequired="true">
        Confirmar nueva contraseña
      </x-ui.form-field>
      <div class="col-12 mt-4 mb-3">
        <button class="btn btn-primary button_custom_primary w-100" type="submit">Actualizar</button>
      </div>
    </form>
  </x-ui.admin-form-card>
</x-admin-layout>