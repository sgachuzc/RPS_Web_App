<x-admin-layout>
  <section class="section_admin_container">
    <x-ui.heading>
      Actualizar servicio
    </x-ui.heading>
  </section>
  <section class="section_admin_container">
    <form method="POST" action="/adminonline/services/{{ $service->id }}">
      @csrf
      @method("patch")
      <x-ui.form-field type="text" name="name" value="{{ $service->name }}">
        Nombre
      </x-ui.form-field>
      <x-ui.form-field type="text" name="subtitle" value="{{ $service->subtitle }}">
        Subtitulo
      </x-ui.form-field>
      <x-ui.form-textarea name="description" label="Descripción">
        {{$service->description}}
      </x-ui.form-textarea>
      <x-ui.form-select name="type" label="Tipo de Servicio">
        <option value="">Seleccionar</option>
        <option value="Curso" {{ ($service->type == 'Curso') ? 'selected' : '' }}>Curso</option>
        <option value="Auditoría" {{ ($service->type == 'Auditoría') ? 'selected' : '' }}>Auditoría</option>
      </x-ui.form-select>
      <div class="form-double-column">
        <x-ui.form-checkbox name="available" :checked="$service->available">
          Habilitado
        </x-ui.form-checkbox>  
        <x-ui.form-checkbox name="featured" :checked="$service->featured">
          Destacado
        </x-ui.form-checkbox>
      </div>
      <x-ui.button type="submit">
        Guardar
      </x-ui.button>
    </form>
  </section>
</x-admin-layout>