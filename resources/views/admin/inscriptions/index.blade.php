<x-admin-layout>
  @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
  @endif
  <section class="section_container">
    <x-ui.table id="inscripciones" title="Inscripciones" link="/adminonline/inscriptions/create">
      <thead>
        <tr>
          <th>Inscrito a</th>
          <th>Cliente</th>
          <th>Fechas</th>
          <th>Correo</th>
          <th>Invitados</th>
          <th>Estatus</th>
          <th>Modificar</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($inscriptions as $inscription)
          @php
            if($inscription->status == 'Inicial'){
              $color = '#6070cf';
            }elseif ($inscription->status == 'En curso') {
              $color = '#1d1e4a';
            }else {
              $color = '#71c39a';
            }
          @endphp
          <tr>
            <td>{{ $inscription->customer }}</td>
            <td>{{ $inscription->phone }}</td>
            <td>{{ $inscription->email }}</td>
            <td>{{ $inscription->service->type }}: {{ $inscription->service->name }}</td>
            <td>{{ $inscription->application_date}}</td>
            <td>
              <div class="status_container" style="background-color: {{ $color }};">
                {{ $inscription->status }}
              </div>
            </td>
            <td>
              <a href="/adminonline/inscriptions/{{ $inscription->id }}/edit">
                <img src="{{ Vite::asset('resources/images/icon_update.svg') }}" alt="Editar">
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </x-ui.table>
  </section>
</x-admin-layout>