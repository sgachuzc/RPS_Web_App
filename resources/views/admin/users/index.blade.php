<x-admin-layout>
  @if (session('success'))
    <x-ui.alert>
      {{ session('success') }}
    </x-ui.alert>
  @endif
  <x-ui.admin-title href="/adminonline/users/create">
    Usuarios
  </x-ui.admin-title>
  <x-ui.admin-divider />
  <x-ui.admin-table id="users">
    <thead class="table-light text-center">
      <tr class="table-primary">
        <th>ID</th>
        <th>Usuario</th>
        <th>Rol</th>
        <th></th>
      </tr>
    </thead>
    <tbody class="text-center">
      @foreach ($users as $user)
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->username }}</td>
        <td>{{ $user->role->name }}</td>
        <td>
          <div class="btn-group" role="group" aria-label="Acciones">
            <a class="btn btn-outline-warning" style="height: 38px" href="/adminonline/users/{{ $user->id }}/edit">
              <x-ui.icon icon="edit"/>
            </a>
            <form method="post" action="/adminonline/users/{{ $user->id }}">
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