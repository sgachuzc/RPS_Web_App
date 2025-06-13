<x-admin-layout>
  <section class="section_container">
    <x-ui.table id="usuarios" title="Usuarios" link="/adminonline/crear_usuario">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Email</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
              <a href="/adminonline/usuarios/{{ $user->id }}/editar">
                <img src="{{ Vite::asset('resources/images/icon_update.svg') }}" alt="Editar">
              </a>
            </td>
            <td>
              <form method="post" action="/adminonline/usuarios/{{ $user->id }}">
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