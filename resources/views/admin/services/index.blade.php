<x-admin-layout>
  @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
  @endif
  <section class="section_container">
    <x-ui.table id="servicios" title="Servicios" link="/adminonline/services/create">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Tipo</th>
          <th>Habilitado</th>
          <th>Destacado</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($services as $service)
          <tr>
            <td>{{ $service->name }}</td>
            <td>{{ $service->type}}</td>
            <td>
              <img src="{{ ($service->available === 1) ? Vite::asset('resources/images/icon_enabled.svg') : Vite::asset('resources/images/icon_disabled.svg') }}" alt="Habilitado">
            </td>
            <td>
              @if ($service->featured === 1)
                <img src="{{ Vite::asset('resources/images/icon_featured.svg') }}" alt="Destacado">
              @else
                -
              @endif
            </td>
            <td>
              <a href="/adminonline/services/{{ $service->id }}/edit">
                <img src="{{ Vite::asset('resources/images/icon_update.svg') }}" alt="Editar">
              </a>
            </td>
            <td>
              <form method="post" action="/adminonline/services/{{ $service->id }}">
                @csrf
                @method('delete')
                <button class="delete_button" type="submit">
                  <img src="{{ Vite::asset('resources/images/icon_delete.svg') }}" alt="Eliminar">
                </button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </x-ui.table>
  </section>
</x-admin-layout>