<x-admin-layout>
  @if (session('success'))
    <x-ui.alert>
      {{ session('success') }}
    </x-ui.alert>
  @endif
  <x-ui.admin-title href="/adminonline/customers/create">
    Clientes
  </x-ui.admin-title>
  <x-ui.admin-divider/>
  <x-ui.admin-table id="customers">
    <thead class="table-dark">
      <tr>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Teléfono</th>
        <th></th>
      </tr>
    </thead>
    <tbody class="text-center">
      @foreach ($customers as $customer)
        <tr>
          <td>{{ $customer->name }}</td>
          <td>{{ $customer->email}}</td>
          <td>{{ $customer->phone}}</td>
          <td>
            <div class="btn-group" role="group" aria-label="Acciones">
              <a class="btn btn-outline-warning" style="height: 38px" href="/adminonline/customers/{{ $customer->id }}/edit">
                <x-ui.icon icon="edit"/>
              </a>
              <form method="post" action="/adminonline/customers/{{ $customer->id }}">
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