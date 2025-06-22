<x-admin-layout>
  <section class="section_admin_container">
    <x-ui.heading>
      Crear servicio
    </x-ui.heading>
  </section>
  <section class="section_admin_container">
    <form method="POST" action="/adminonline/services/create">
      @csrf
      <x-ui.form-field type="text" name="name">
        Nombre
      </x-ui.form-field>
      <x-ui.form-field type="text" name="subtitle">
        Subtitulo
      </x-ui.form-field>
      <x-ui.form-textarea name="description" label="Descripción"/>
      <x-ui.form-select name="type" label="Tipo de Servicio">
        <option value="">Seleccionar</option>
        <option value="Curso">Curso</option>
        <option value="Auditoría">Auditoría</option>
      </x-ui.form-select>
      <x-ui.form-checkbox name="featured">
        Destacado
      </x-ui.form-checkbox>
      <x-ui.button type="submit">
        Guardar
      </x-ui.button>
    </form>
  </section>
</x-admin-layout>