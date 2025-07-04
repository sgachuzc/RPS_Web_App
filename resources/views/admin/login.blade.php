<x-admin-layout>
  <div class="card mx-auto w-100 border-primary border-primary" style="max-width: 350px; margin-top: 15vh;">
    <div class="card-body">
      <img class="d-flex mx-auto" src="{{ Vite::asset('resources/images/logo_black.png') }}" alt="RPS" width="100">
      <h5 class="card-title mt-4 mb-4 text-center text-primary">Iniciar sesión</h5>
      <form class="text-left needs-validation" novalidate method="POST" action="/login">
        @csrf
        <x-ui.form-field type="text" name="username" :isRequired="true">
          Usuario
        </x-ui.form-field>
        <x-ui.form-field type="password" name="password" :isRequired="true">
          Contraseña
        </x-ui.form-field>
        <div class="col-12 mb-3">
          <button class="btn btn-primary button_custom_primary w-100" type="submit">Entrar</button>
        </div>
        <div class="col-12 mt-5 d-flex justify-content-end">
          <a class="text-primary" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
        </div>
      </form>
    </div>
  </div>
</x-admin-layout>