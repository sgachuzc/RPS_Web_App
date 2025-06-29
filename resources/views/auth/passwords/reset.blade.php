<x-admin-layout>
  <div class="card mx-auto w-100 border-primary" style="max-width: 350px; margin-top: 10vh;">
    <div class="card-body">
      <img class="d-flex mx-auto" src="{{ Vite::asset('resources/images/rps.png') }}" alt="RPS" width="70">
      <h5 class="card-title mt-4 mb-4 text-center text-primary">Restablecer contraseña</h5>
      <form class="text-left needs-validation" novalidate method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <x-ui.form-field type="email" name="email" :isRequired="true" value="{{ $email ?? old('email') }}">
          Correo electrónico
        </x-ui.form-field>
        <x-ui.form-field type="password" name="password" :isRequired="true">
          Nueva contraseña
        </x-ui.form-field>
        <div id="passwordHelpBlock" class="form-text mb-2">
          Su contraseña debe tener entre 8 y 20 caracteres, contener letras y números, y no debe contener espacios, caracteres especiales ni emojis.
        </div>
        <x-ui.form-field type="password" name="password_confirmation" id="password_confirmation" required>
          Confirmar nueva contraseña
        </x-ui.form-field>
        <div class="col-12 mb-3">
          <button class="btn btn-primary button_custom_primary w-100" type="submit">Restablecer</button>
        </div>
      </form>
    </div>
  </div>
</x-admin-layout>