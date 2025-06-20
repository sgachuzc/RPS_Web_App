<x-admin-layout>
  @if ($inscription->status != 'Finalizado')
  <section>
    <x-ui.heading>
      Actualizar estatus
    </x-ui.heading>
    <form class="form_status_update" action="/adminonline/inscriptions/{{ $inscription->id }}/status" method="POST">
      @csrf
      @method('patch')
      <p>
        Estatus actual: <span>{{ $inscription->status }}</span>
      </p>
      <x-ui.form-select label="Actualizar estatus" name="status">
        @if ($inscription->status == 'Inicial')
          <option value="En curso">En curso</option>
          <option value="Finalizado">Finalizado</option>
        @elseif ($inscription->status == 'En curso')
          <option value="Finalizado">Finalizado</option>
        @endif
      </x-ui.form-select>
      <x-ui.button type="submit">
        Actualizar
      </x-ui.button>
    </form>
  </section>
  <hr class="hr_section">
  @endif
  <section class="section_container">
    <x-ui.heading>
      Modificar inscripción
    </x-ui.heading>
  </section>
  <section class="section_container">
    <form method="POST" action="/adminonline/inscriptions/{{ $inscription->id }}">
      @csrf
      @method('patch')
      <x-ui.form-field type="text" name="customer" value="{{ $inscription->customer }}" :active="false">
        Nombre completo
      </x-ui.form-field>
      <div class="form-double-column" style="margin-bottom: 0;">
        <x-ui.form-field type="tel" name="phone" value="{{ $inscription->phone }}">
          Teléfono
        </x-ui.form-field>
        <x-ui.form-field type="email" name="email" value="{{ $inscription->email }}">
          Correo electrónico
        </x-ui.form-field>
      </div>
      <x-ui.form-field type="text" name="service_id" value="{{ $inscription->service->name }}" :active="false">
        Inscrito a
      </x-ui.form-field>
      <div class="form-datetime" style="margin-bottom: 30px">
        <label for="application_date">Fecha de aplicación</label>
        <input class="input_datetime" type="datetime-local" name="application_date" id="application_date" value="{{ $inscription->application_date }}">
      </div>
      <div class="form-double-column" style="justify-content: space-between">
        <x-ui.button type="submit">
          Guardar cambios
        </x-ui.button>
        @if ($inscription->status != 'Finalizado')
          <button class="generic_button delete_button_form" type="submit" form="delete_form">
            Cancelar inscripción
          </button>
        @endif
      </div>
    </form>
    <form method="POST" action="/adminonline/inscriptions/{{ $inscription->id }}" class="hidden" id="delete_form">
      @csrf
      @method("DELETE")
    </form>
  </section>
</x-admin-layout>