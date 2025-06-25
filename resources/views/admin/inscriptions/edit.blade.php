@php
  $minDate = now()->format('Y-m-d');;
@endphp
<x-admin-layout>
  <x-ui.admin-form-card icon="checkbook" title="Actualizar estatus">
    <form class="needs-validation" novalidate method="POST" action="/adminonline/inscriptions/{{ $inscription->id }}/status">
      @csrf
      @method('patch')
      <x-ui.form-select label="Estatus" name="status" :isRequired="true">
        <option value="">Seleccione...</option>
        @if ($inscription->status === $statusStart)
          <option value="ACTIVO">Activo</option>
          <option value="CONCLUIDO">Concluido</option>
        @elseif ($inscription->status === $statusInProgress)
          <option value="CONCLUIDO">Concluido</option>
        @else
          <option value="CONCLUIDO">Concluido</option>
        @endif
      </x-ui.form-select>
      <x-ui.form-field type="password" name="current_password" :isRequired="true">
        Contraseña
      </x-ui.form-field>
      <div class="form-text mb-2">
        Ingrese su contraseña para confirmar
      </div>
      <div class="col-12 mt-2 mb-3">
        <button class="btn btn-primary" type="submit">Actualizar</button>
      </div>
    </form>
  </x-ui.admin-form-card>
  <x-ui.admin-form-card icon="checkbook" title="Actualizar fechas de registro">
    <form class="needs-validation" novalidate method="POST" action="/adminonline/inscriptions/{{ $inscription->id }}/dates">
      @csrf
      @method('patch')
      <div class="row">
        <div class="col">
          <x-ui.form-field type="date" name="start_date" :isRequired="true" min="{{ $minDate }}" value="{{ \Carbon\Carbon::parse($inscription->start_date)->format('Y-m-d') }}">
            Fecha de inicio
          </x-ui.form-field>
        </div>
        <div class="col">
          <x-ui.form-field type="date" name="end_date" :isRequired="true" min="{{ $minDate }}" value="{{ \Carbon\Carbon::parse($inscription->end_date)->format('Y-m-d') }}">
            Fecha de termino
          </x-ui.form-field>
        </div>
      </div>
      <x-ui.form-field type="password" name="current_password_dates" :isRequired="true">
        Contraseña
      </x-ui.form-field>
      <div class="form-text mb-2">
        Ingrese su contraseña para confirmar
      </div>
      <div class="col-12 mt-2 mb-3">
        <button class="btn btn-primary" type="submit">Actualizar</button>
      </div>
    </form>
  </x-ui.admin-form-card>
</x-admin-layout>