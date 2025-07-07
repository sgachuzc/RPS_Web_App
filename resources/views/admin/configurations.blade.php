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
      <x-ui.form-field type="number" name="certificate_validity_time" :isRequired="true" min="1" :value="$settings['certificate_validity_time'] ?? ''">
        Tiempo de validéz para certificado (meses)
      </x-ui.form-field>
      <div class="col-12 mt-4 mb-3">
        <button class="btn btn-primary button_custom_primary w-100" type="submit">Guardar</button>
      </div>
    </form>
  </x-ui.admin-form-card>
</x-admin-layout>