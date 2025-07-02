<x-admin-layout>
  <h1 class="mb-0">Dashboard</h1>
  <x-ui.admin-divider/>
  <div class="row mb-4">
    <div class="col-12 col-md-3 mb-2">
      <x-ui.data-card icon="person" number="{{ $totalCustomers }}" title="Clientes" />
    </div>
    <div class="col-12 col-md-3 mb-2">
      <x-ui.data-card icon="apps" number="{{ $totalCompletedInscriptions }}" title="Inscripciones" />
    </div>
    <div class="col-12 col-md-3 mb-2">
      <x-ui.data-card icon="person_raised_hand" number="{{ $totalParticipants }}" title="Participantes" />
    </div>
    <div class="col-12 col-md-3 mb-2">
      <x-ui.data-card icon="license" number="{{ $totalCertificates }}" title="Certificados" />
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-12 col-md-4 mb-2">
      <x-ui.admin-form-card icon="checkbook" title="Proximos eventos" :grid="true">
        @forelse ($nextInscriptions as $nextInscription)
          <p class="form-text mb-1">
            @php
              $startDate = \Carbon\Carbon::parse($nextInscription->start_date)->translatedFormat('d F');
              $endDate = \Carbon\Carbon::parse($nextInscription->end_date)->translatedFormat('d F');
            @endphp
            {{ $nextInscription->service->name.': '.$startDate.' - '.$endDate }}
          </p>
        @empty
          <p class="form-text">Vacío</p>
        @endforelse
      </x-ui.admin-form-card>
    </div>
    <div class="col-12 col-md-8 mb-2">
      <div class="card p-2 card-chart">
        <canvas id="topServices"></canvas>
      </div>
    </div>
  </div>
</x-admin-layout>

<script type="text/javascript">
  window.topServices = @json($topServices);
</script>