<x-admin-layout>
  <x-ui.admin-form-card icon="person" title="Nuevo cliente">
    <form class="needs-validation" novalidate method="POST" action="/adminonline/customers/create">
      @csrf
      <x-ui.form-field type="text" name="name" :isRequired="true">
        Nombre
      </x-ui.form-field>
      <x-ui.form-field type="email" name="email" :isRequired="true">
        Correo electrónico
      </x-ui.form-field>
      <x-ui.form-field type="tel" name="phone" :isRequired="true">
        Teléfono
      </x-ui.form-field>
      <div class="col-12 mt-2 mb-3">
        <button class="btn button_custom_primary w-100" type="submit">Guardar</button>
      </div>
    </form>
  </x-ui.admin-form-card>
</x-admin-layout>