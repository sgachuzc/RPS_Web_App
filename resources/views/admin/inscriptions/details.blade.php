<x-admin-layout>
  @if (session('success'))
    <x-ui.alert>
      {{ session('success') }}
    </x-ui.alert>
  @endif
  <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/adminonline/inscriptions" style="color: #6c757d;">Inscripciones</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ $preview }}</li>
    </ol>
  </nav>
  <div class="row">
    <div class="container-fluid d-flex justify-content-between">
      <h1 class="mb-0">Participantes</h1>
      <a class="btn button_custom_primary d-flex align-items-center justify-content-around gap-2" href="{{ route('inscriptions.results', ['inscription' => $inscription->id]) }}">
        Ver resultados
      </a>
    </div>
  </div>
  <x-ui.admin-divider />
  <x-ui.admin-table id="inscriptions">
    <thead class="table-dark">
      <tr>
        <th>Nombre</th>
        <th>Correo electónico</th>
        <th>Teléfono</th>
        <th>Certificado</th>
      </tr>
    </thead>
    <tbody class="text-center">
      @foreach ($participants as $participant)
        <tr>
          <td>{{ $participant->name }}</td>
          <td>{{ $participant->email }}</td>
          <td>{{ $participant->phone }}</td>
          <td>
            @if ($participant->certificate && $participant->certificate->sent)
              <x-ui.icon icon="check"/>
            @else
              <form action="{{ route('certificates.deliver', [$participant->id, $service->id]) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success btn-sm">Entregar</button>
              </form>
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </x-ui.admin-table>
</x-admin-layout>