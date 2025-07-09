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
         <div class="col">
          <x-ui.form-field type="text" name="version" value="{{ $service->version }}">
            Versión <span style="color: grey; font-size: 12px">(Opcional)</span>
          </x-ui.form-field>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <x-ui.form-field type="text" name="nomenclature" value="{{ $service->nomenclature }}">
            Nomenclatura para certificado
          </x-ui.form-field>
          <div class="form-text mb-2" style="margin-top: -10px">
            A esta nomenclatura le seguira información especifica del participante
          </div>
        </div>
        <div class="col">
          <x-ui.form-field type="number" name="months_to_expire" value="{{ $service->months_to_expire }}">
            Tiempo de validez (meses) <span style="color: grey; font-size: 12px">(Opcional)</span>
          </x-ui.form-field>
        </div>
      </div>
      <div class="row">
        <div class="col d-flex align-items-center gap-3 mb-3">
          <x-ui.form-checkbox  name="featured" :isChecked="$service->featured">
            Destacado
          </x-ui.form-checkbox>
          <x-ui.form-checkbox  name="obsoleted" :isChecked="$service->obsoleted">
            Obsoleto
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