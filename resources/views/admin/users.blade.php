<x-admin-layout>
  <section class="section_container">
    <x-ui.table id="usuarios" title="Usuarios" link="/adminonline/crear_usuario">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Email</th>
          <th>Acciónes</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>Hola</td>
          </tr>
        @endforeach
      </tbody>
    </x-ui.table>
  </section>
</x-admin-layout>