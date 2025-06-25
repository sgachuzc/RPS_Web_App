<x-admin-layout>
  @if (session('success'))
    <x-ui.alert>
      {{ session('success') }}
    </x-ui.alert>
  @endif
  <x-ui.admin-title href="/adminonline/services/create">
    Servicios
  </x-ui.admin-title>
  <x-ui.admin-divider />
  <x-ui.admin-table id="services">
    <thead class="table-light text-center">
      <tr class="table-primary">
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Habilitado</th>
        <th>Destacado</th>
        <th></th>
      </tr>
    </thead>
    <tbody class="text-center">
      @foreach ($services as $service)
        <tr>
          <td>{{ $service->name }}</td>
          <td>{{ $service->type}}</td>
          <td>
            @if ($service->available === 1)
              <x-ui.icon icon="visibility"/>
            @else
              <x-ui.icon icon="disabled_visible"/>
            @endif
          </td>
          <td>
            @if ($service->featured === 1)
              <x-ui.icon icon="pages"/>
            @else
              <x-ui.icon icon=""/>
            @endif
          </td>
          <td>
            <div class="btn-group" role="group" aria-label="Acciones">
              <a class="btn btn-outline-warning" style="height: 38px" href="/adminonline/services/{{ $service->id }}/edit">
                <x-ui.icon icon="edit"/>
              </a>
              <form method="post" action="/adminonline/services/{{ $service->id }}">
                @csrf
                @method('delete')
                <button class="btn btn-outline-danger btn-delete" type="submit">
                  <x-ui.icon icon="delete"/>
                </button>
              </form>
            </div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </x-ui.admin-table>
</x-admin-layout>