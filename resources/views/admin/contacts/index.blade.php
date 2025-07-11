<x-admin-layout>
  @if (session('success'))
    <x-ui.alert>
      {{ session('success') }}
    </x-ui.alert>
  @endif
  <h1 class="mb-0">Registro de contactos</h1>
  <span class="form-text">
    Al hacer click en el botón "Contacto realizado", el registro se eliminará
  </span>
  <x-ui.admin-divider/>
  <div class="row">
    @foreach ($contacts as $contact)
    <div class="col-12 col-md-6 mb-2">
      <x-ui.admin-form-card icon="call" title="{{ $contact->name }}" :grid="true">
        <p class="form-text mb-2">
          <strong>Correo:</strong> {{ $contact->email }}
        </p>
        <p class="form-text mb-2">
          <strong>Teléfono:</strong> {{ $contact->phone }}
        </p>
        <p class="form-text mb-2">
          <strong>Asunto:</strong> {{ $contact->issue }}
        </p>
        <p class="form-text mb-2">
          <strong>Mensaje:</strong> {{ $contact->message }}
        </p>
        <form action="/adminonline/contacts/{{ $contact->id }}" method="post">
          @csrf
          @method('delete')
          <div class="col-12 mb-3">
            <button class="btn button_custom_primary w-100" type="submit">Contacto realizado</button>
          </div>
        </form>
      </x-ui.admin-form-card>
    </div>
    @endforeach
  </div>
  <div>
    {{ $contacts->links() }}
  </div>
</x-admin-layout>