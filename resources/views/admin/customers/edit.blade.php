<x-admin-layout>
  <x-ui.admin-form-card icon="person" title="Actualizar cliente">
    <form class="needs-validation" novalidate method="POST" action="/adminonline/customers/{{ $customer->id }}">
      @csrf
      @method('patch')
      <x-ui.form-field type="text" name="name" :isRequired="true" value="{{ $customer->name }}">
        Nombre
      </x-ui.form-field>
      <x-ui.form-field type="email" name="email" :isRequired="true" value="{{ $customer->email }}">
        Correo electrónico
      </x-ui.form-field>
      <x-ui.form-field type="tel" name="phone" :isRequired="true" value="{{ $customer->phone }}">
        Teléfono
      </x-ui.form-field>
      <div class="col-12 mt-2 mb-3">
        <button class="btn button_custom_primary w-100" type="submit">Actualizar</button>
      </div>
    </form>
  </x-ui.admin-form-card>
</x-admin-layout>