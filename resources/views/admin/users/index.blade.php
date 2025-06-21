<x-admin-layout>
  @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
  @endif
  <section class="section_container">
    <x-ui.table id="usuarios" title="Usuarios" link="/adminonline/users/create">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Usuario</th>
          <th>Rol</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->role->name }}</td>
            <td>
              <a href="/adminonline/users/{{ $user->id }}/edit">
                <img src="{{ Vite::asset('resources/images/icon_update.svg') }}" alt="Editar">
              </a>
            </td>
            <td>
              <form method="post" action="/adminonline/users/{{ $user->id }}">
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