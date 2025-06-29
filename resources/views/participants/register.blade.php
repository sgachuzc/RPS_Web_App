@php
  $now = \Carbon\Carbon::now();
  $start = \Carbon\Carbon::parse($inscription->start_date);
@endphp

<x-forms-layout title="¡Registrate!">
  @if ($now->greaterThanOrEqualTo($start))
    <x-ui.public-message-card url="resources/images/cover_out_of_time.svg" title="¡Lo sentimos!"  subtitle="El tiempo de inscripciones terminó"/>
  @elseif (session('success'))
    <x-ui.public-message-card url="resources/images/cover_success.svg" title="{{ session('success') }}"  subtitle="No faltes, te esperamos"/>
  @else
    <x-ui.public-form-card>
      <div class="card-body">
        <h3 class="card-title">Registro del participante</h3>
        <p class="card-text">Llena el siguiente formulario para confirmar tu participación en:</p>
        <p class="card-text">
          <strong>{{ $inscription->service->type }}:</strong> 
          {{ $inscription->service->name }}
        </p>
        <p class="card-text">
          <strong>Descripción:</strong> 
          {{ $inscription->service->description }}
        </p>
        <p class="card-text">
          <strong>Fecha:</strong> 
          {{ \Carbon\Carbon::parse($inscription->start_date)->translatedFormat('d \d\e F'); }} - {{ \Carbon\Carbon::parse($inscription->end_date)->translatedFormat('d \d\e F');}}
        </p>
        <hr>
        <form class="needs-validation" novalidate method="POST" action="/register/{{ $inscription->registration_token }}">
          @csrf
          <x-ui.form-field type="text" name="name" :isRequired="true">
            Nombre completo
          </x-ui.form-field>
          <x-ui.form-field type="email" name="email" :isRequired="true">
            Correo
          </x-ui.form-field>
          <x-ui.form-field type="tel" name="phone" :isRequired="true">
            Teléfono
          </x-ui.form-field>
          <div class="col-12 mt-2 mb-3">
            <button class="btn button_custom_primary w-100" type="submit">Registrate</button>
          </div>
        </form>
      </div>
    </x-ui.public-form-card>
  @endif
</x-forms-layout>