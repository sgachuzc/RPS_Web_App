<x-admin-layout>
  <section class="section_admin_container">
    <x-ui.heading>
      Crear usuario
    </x-ui.heading>
  </section>
  <section class="section_admin_container">
    <form method="POST" action="/adminonline/users/create">
      @csrf
      <x-ui.form-field type="text" name="name">
        Nombre completo
      </x-ui.form-field>
      <x-ui.form-field type="email" name="email">
        Correo electrónico
      </x-ui.form-field>
      <x-ui.form-field type="text" name="username">
        Usuario
      </x-ui.form-field>
      <x-ui.form-select :hasLabel="false" name="role_id">
        <option value="">Seleccione un rol</option>
        @foreach ($roles as $role)
          <option value="{{ $role->id }}">{{ $role->name }}</option>
        @endforeach
      </x-ui.form-select>
      <x-ui.form-field type="password" name="password">
        Contraseña
      </x-ui.form-field>
      <x-ui.form-field type="password" name="password_confirmation">
        Confirma tu contraseña
      </x-ui.form-field>
      <x-ui.button type="submit">
        Registrar usuario
      </x-ui.button>
    </form>
  </section>
</x-admin-layout>