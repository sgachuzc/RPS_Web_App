@php
  $minDate = now()->format('Y-m-d');;
@endphp
<x-admin-layout>
  <x-ui.admin-form-card icon="checkbook" title="Inscripción">
    <form class="needs-validation" novalidate method="POST" action="/adminonline/inscriptions/create">
      @csrf
      <x-ui.form-select label="Cliente a inscribir" name="customer_id" :isRequired="true">
        <option value="">Seleccione un cliente</option>
        @foreach ($customers as $customer)
          <option value="{{ $customer->id }}">{{ $customer->name }}</option>
        @endforeach
      </x-ui.form-select>
      <x-ui.form-select label="Servicio a inscribir" name="service_id" :isRequired="true">
        <option value="">Seleccione un servicio disponible</option>
        @foreach ($services as $service)
          <option value="{{ $service->id }}">{{ $service->name }}</option>
        @endforeach
      </x-ui.form-select>
      <div class="row">
        <div class="col">
          <x-ui.form-field type="date" name="start_date" :isRequired="true" min="{{ $minDate }}">
            Fecha de inicio
          </x-ui.form-field>
        </div>
        <div class="col">
          <x-ui.form-field type="date" name="end_date" :isRequired="true" min="{{ $minDate }}">
            Fecha de termino
          </x-ui.form-field>
        </div>
      </div>
      <div class="col-12 mt-2 mb-3">
        <button class="btn btn-primary" type="submit">Registrar</button>
      </div>
    </form>
  </x-ui.admin-form-card>
</x-admin-layout>