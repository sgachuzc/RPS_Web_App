<x-admin-layout>
  @if (session('success'))
    <x-ui.alert>
      {{ session('success') }}
    </x-ui.alert>
  @endif
  <x-ui.admin-form-card icon="build" title="Configuraciones">
    <form class="needs-validation" novalidate method="POST" action="/adminonline/configurations/store">
      @csrf
      @method('patch')
      <x-ui.form-field type="email" name="contact_email" :isRequired="true" :value="$settings['contact_email'] ?? ''">
        Correo para enviar notificación de contacto nuevo
      </x-ui.form-field>
      <x-ui.form-field type="tel" name="whatsapp_phone" :isRequired="true" :value="$settings['whatsapp_phone'] ?? ''">
        Teléfono
      </x-ui.form-field>
      <div class="col-12 mt-4 mb-3">
        <button class="btn btn-primary button_custom_primary w-100" type="submit">Guardar</button>
      </div>
    </form>
  </x-ui.admin-form-card>
</x-admin-layout>