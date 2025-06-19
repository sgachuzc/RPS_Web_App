<x-admin-layout>
  <section class="section_container">
    <x-ui.heading>
      Inscripción
    </x-ui.heading>
  </section>
  <section class="section_container">
    <form method="POST" action="/adminonline/inscriptions/create">
      @csrf
      <x-ui.form-field type="text" name="customer">
        Nombre completo
      </x-ui.form-field>
      <div class="form-double-column">
        <x-ui.form-field type="tel" name="phone">
          Teléfono
        </x-ui.form-field>
        <x-ui.form-field type="email" name="email">
          Correo electrónico
        </x-ui.form-field>
      </div>
      <div class="form-double-column">
        <x-ui.form-select name="service_id" label="Servicio seleccionado">
          <option value="">Seleccionar</option>
          @foreach ($services as $service)
            <option value="{{ $service->id }}">{{ $service->name }}</option>
          @endforeach
        </x-ui.form-select>
        <div class="form-datetime">
          <label for="application_date">Fecha de aplicación</label>
          <input class="input_datetime" type="datetime-local" name="application_date" id="application_date">
        </div>
      </div>
      <x-ui.button type="submit">
        Guardar
      </x-ui.button>
    </form>
  </section>
</x-admin-layout>