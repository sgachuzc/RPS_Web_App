<x-admin-layout>
  <section class="section_container">
    <x-ui.heading>
      Editar usuario
    </x-ui.heading>
  </section>
  <section class="section_container">
    <form method="POST" action="/adminonline/usuarios/{{ $user->id }}">
      @csrf
      @method("patch")
      <x-ui.form-field type="text" name="name" :active="false" value="{{ $user->name }}">
        Nombre completo
      </x-ui.form-field>
      <x-ui.form-field type="email" name="email" value="{{ $user->email }}">
        Correo electrónico
      </x-ui.form-field>
      <x-ui.form-field type="password" name="password">
        Contraseña
      </x-ui.form-field>
      <x-ui.form-field type="password" name="password_confirmation">
        Confirma tu contraseña
      </x-ui.form-field>
      <x-ui.button type="submit">
        Actualizar usuario
      </x-ui.button>
    </form>
  </section>
</x-admin-layout>