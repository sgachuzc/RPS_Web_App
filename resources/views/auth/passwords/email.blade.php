<x-admin-layout>
  <div class="card mx-auto w-100 border-primary" style="max-width: 350px; margin-top: 15vh;">
    <div class="card-body">
      <img class="d-flex mx-auto" src="{{ Vite::asset('resources/images/rps.png') }}" alt="RPS" width="70">
      <h5 class="card-title mt-4 mb-4 text-center">Restablecer contraseña</h5>
      <form class="text-left needs-validation" novalidate method="POST" action="{{ route('password.email') }}">
        @csrf
        <x-ui.form-field type="email" name="email" :isRequired="true">
          Correo electrónico
        </x-ui.form-field>
        <div class="col-12 mb-3">
          <button class="btn btn-primary" type="submit">Restablecer</button>
        </div>
      </form>
      @if (session('status'))
      <x-ui.alert>
        {{ session('status') }}
      </x-ui.alert>
      @endif
    </div>
  </div>
</x-admin-layout>