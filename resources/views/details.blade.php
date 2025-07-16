<x-layout>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <section class="container my-5">
    <div class="row">
      <div class="col-lg-8 mx-auto">
        {{-- Card de Servicio Original --}}
        <div class="card service-card-original overflow-hidden border-0 shadow-sm mb-4">
          <div class="row g-0">
            {{-- Columna del Contenido --}}
            <div class="col-md-12">
              <div class="card-body d-flex flex-column h-100 p-4">
                <span class="badge service-card-badge position-absolute top-0 end-0 m-3">
                  @if ($service->type == 'Curso')
                    CURSO
                  @else
                    AUDITORIA
                  @endif
                </span>
                <h3 class="card-title fw-bold mb-0 mt-5">{{ $service->name }}</h3>
                <h5 class="mb-2 text-muted">{{ $service->subtitle }}</h5>
                <p class="card-text text-muted mb-3">
                  {{ $service->full_description }}
                </p>
                @if ($service->type == 'Curso')
                <ul class="list-unstyled d-flex flex-column gap-2 mb-4">
                  @if ($service->version)
                  <li class="d-flex align-items-center">
                    <i class="bi bi-file-earmark-diff-fill text-primary me-2"></i>
                    <span>{{ $service->version }}</span>
                  </li>
                  @endif
                  <li class="d-flex align-items-center">
                    <i class="bi bi-patch-check-fill text-primary me-2"></i>
                    <span>Incluye Certificado Digital</span>
                  </li>
                </ul>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</x-layout>
