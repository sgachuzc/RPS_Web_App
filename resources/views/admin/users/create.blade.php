<x-admin-layout>
  <section class="section_container">
    <x-ui.heading>
      Crear usuario
    </x-ui.heading>
  </section>
  <section class="section_container">
    <form method="POST" action="/adminonline/users/create">
      @csrf
      <x-ui.form-field type="text" name="name">
        Nombre completo
      </x-ui.form-field>
      <x-ui.form-field type="email" name="email">
        Correo electrónico
      </x-ui.form-field>
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