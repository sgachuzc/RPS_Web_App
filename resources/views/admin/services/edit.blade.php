<x-admin-layout>
  <x-ui.admin-form-card icon="apps" title="Actualizar servicio">
    <form class="needs-validation" novalidate method="POST" action="/adminonline/services/{{ $service->id }}">
      @csrf
      @method("patch")
      <div class="row">
        <div class="col">
          <x-ui.form-field type="text" name="name" :isRequired="true" value="{{ $service->name }}">
            Nombre del servicio
          </x-ui.form-field>
        </div>
        <div class="col">
          <x-ui.form-field type="text" name="subtitle" value="{{ $service->subtitle }}">
            Subtitulo <span style="color: grey; font-size: 12px">(Opcional)</span>
          </x-ui.form-field>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <x-ui.form-select label="Tipo de servicio" name="type" :isRequired="true">
            <option value="">Seleccionar</option>
            <option value="Curso" {{ ($service->type == 'Curso') ? 'selected' : '' }}>Curso</option>
            <option value="Auditoría" {{ ($service->type == 'Auditoría') ? 'selected' : '' }}>Auditoría</option>
          </x-ui.form-select>
        </div>
        <div class="col d-flex align-items-center gap-3">
          <x-ui.form-checkbox  name="featured" :isChecked="$service->featured">
            Destacado
          </x-ui.form-checkbox>
          <x-ui.form-checkbox  name="available" :isChecked="$service->available">
            Habilitado
          </x-ui.form-checkbox>
        </div>
      </div>
      <x-ui.form-textarea name="description" label="Descripción">
        {{$service->description}}
      </x-ui.form-textarea>
      <div class="col-12 mt-2 mb-3">
        <button class="btn button_custom_primary w-100" type="submit">Actualizar</button>
      </div>
    </form>
  </x-ui.admin-form-card>
</x-admin-layout>