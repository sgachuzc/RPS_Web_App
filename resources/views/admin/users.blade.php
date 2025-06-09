<x-admin-layout>
  <section class="section_container">
    <x-ui.heading :isAdmin="true">
      Usuarios
    </x-ui.heading>
    <x-ui.button element="link" href="/adminonline/crear_usuario">
      Crear usuario
    </x-ui.button>
  </section>
  <section class="section_container">
    @foreach ($users as $user)
      <p>Hola</p>
    @endforeach
    <p>Hola22</p>
  </section>
</x-admin-layout>