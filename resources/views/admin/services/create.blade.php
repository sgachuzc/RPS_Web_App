<x-admin-layout>
  <x-ui.admin-form-card icon="apps" title="Nuevo servicio">
    <form class="needs-validation" novalidate method="POST" action="/adminonline/services/create">
      @csrf
      <div class="row">
        <div class="col">
          <x-ui.form-field type="text" name="name" :isRequired="true">
            Nombre del servicio
          </x-ui.form-field>
        </div>
        <div class="col">
          <x-ui.form-field type="text" name="subtitle">
            Subtitulo <span style="color: grey; font-size: 12px">(Opcional)</span>
          </x-ui.form-field>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <x-ui.form-select label="Tipo de servicio" name="type" :isRequired="true">
            <option value="">Seleccionar</option>
            <option value="Curso">Curso</option>
            <option value="Auditoría">Auditoría</option>
          </x-ui.form-select>
        </div>
        <div class="col d-flex align-items-center">
          <x-ui.form-checkbox  name="featured">
            Destacado
          </x-ui.form-checkbox>
        </div>
      </div>
      <x-ui.form-textarea name="description" label="Descripción"/>
      <div class="col-12 mt-2 mb-3">
        <button class="btn button_custom_primary w-100" type="submit">Guardar</button>
      </div>
    </form>
  </x-ui.admin-form-card>
</x-admin-layout>