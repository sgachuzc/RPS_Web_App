<x-admin-layout>
  @if (session('success'))
    <x-ui.alert>
      {{ session('success') }}
    </x-ui.alert>
  @endif
  <x-ui.admin-title href="/adminonline/inscriptions/create">
    Inscripciones
  </x-ui.admin-title>
  <x-ui.admin-divider />
  <x-ui.admin-table id="inscriptions">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Cliente</th>
        <th>Servicio</th>
        <th>Fecha</th>
        <th>Estatus</th>
        <th></th>
      </tr>
    </thead>
    <tbody class="text-center" style="vertical-align: middle;">
      @foreach ($inscriptions as $inscription)
        <tr>
          <td>{{ $inscription->id }}</td>
          <td>{{ $inscription->customer->name }}</td>
          <td>{{ $inscription->service->name}}</td>
          @php
            $startDate = \Carbon\Carbon::parse($inscription->start_date)->translatedFormat('d F');
            $endDate = \Carbon\Carbon::parse($inscription->end_date)->translatedFormat('d F');
          @endphp
          <td>{{ $startDate }} - {{ $endDate }}</td>
          <td>
            @if ($inscription->status === $statusStart)
              <div class="text-primary-emphasis bg-primary-subtle rounded-3">{{ $inscription->status }}</div>
            @elseif ($inscription->status === $statusInProgress)
              <div class="text-primary-emphasis bg-warning-subtle rounded-3">{{ $inscription->status }}</div>
            @else
              <div class="text-primary-emphasis bg-success-subtle rounded-3">{{ $inscription->status }}</div>
            @endif
          </td>
          <td>
            <div class="btn-group" role="group" aria-label="Acciones">
              <a class="btn btn-outline-info" style="height: 38px" href="/adminonline/inscriptions/{{ $inscription->id }}/details">
                <x-ui.icon icon="document_search"/>
              </a>
              @if ($inscription->status != $statusFinal)
              <a class="btn btn-outline-warning" style="height: 38px" href="/adminonline/inscriptions/{{ $inscription->id }}/edit">
                <x-ui.icon icon="edit"/>
              </a>
              @endif
              <form method="post" action="/adminonline/inscriptions/{{ $inscription->id }}">
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