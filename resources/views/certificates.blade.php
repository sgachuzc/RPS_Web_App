<x-layout>
  @if (session('success'))
    @php
      $data = session('success');
      $certificate = $data['certificate'];
      $participant = $certificate->participant;
      $user = $participant->user;
      $service = $certificate->service;
      $previousCertificates = $data['previous_certificates'] ?? collect();
      $message = $data['message'] ?? '¡Certificado Válido!';
    @endphp
    <div class="container my-5">
      {{-- Tarjeta principal de validación --}}
      <div class="card text-center shadow-lg border-success mb-5">
        <div class="card-header bg-success text-white">
          <h2 class="mb-0 d-flex align-items-center justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-patch-check-fill me-2" viewBox="0 0 16 16">
              <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
            </svg>
            {{ $message }}
          </h2>
        </div>
        <div class="card-body p-4 p-md-5">
          <p class="lead">
            El certificado con código <strong>{{ $certificate->code }}</strong> ha sido validado exitosamente.
          </p>
          <h3 class="card-title display-6">{{ $participant->name }}</h3>
          <p class="card-text text-muted">ha completado satisfactoriamente el servicio de:</p>
          <h4 class="text-primary fw-bold">{{ $service->name }}</h4>
          <hr class="my-4">
          <div class="row">
            <div class="col-md-6">
              <p class="mb-1"><strong>Fecha de Expedición:</strong></p>
              <p class="fs-5">{{ \Carbon\Carbon::parse($certificate->issue_date)->isoFormat('LL') }}</p>
            </div>
            <div class="col-md-6">
              <p class="mb-1"><strong>Fecha de Expiración:</strong></p>
              <p class="fs-5">{{ \Carbon\Carbon::parse($certificate->expiry_date)->isoFormat('LL') }}</p>
            </div>
          </div>
        </div>
        <div class="card-footer text-muted">
          Este es un documento oficial emitido por RPS.
        </div>
      </div>

      {{-- Historial de Certificaciones Anteriores --}}
      @if($previousCertificates->count() > 0)
        <div class="previous-certificates mt-5">
          <h3 class="text-center mb-4 border-bottom pb-3">Historial de Certificaciones para este Servicio</h3>
          <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($previousCertificates as $prevCert)
              <div class="col">
                <div class="card h-100 border-secondary shadow-sm">
                  <div class="card-body text-center">
                    <h5 class="card-title text-muted">Certificado Anterior</h5>
                    <p class="card-text mb-1"><strong>Código:</strong> {{ $prevCert->code }}</p>
                    <p class="card-text"><strong>Expedido:</strong> {{ \Carbon\Carbon::parse($prevCert->issue_date)->isoFormat('LL') }}</p>
                  </div>
                  <div class="card-footer bg-transparent border-secondary text-center">
                    <small class="text-muted">Vencido el: {{ \Carbon\Carbon::parse($prevCert->expiry_date)->isoFormat('LL') }}</small>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      @endif

      <div class="text-center mt-5">
        <a href="{{ route('certificate') }}" class="btn btn-secondary btn-lg">
          Validar otro certificado
        </a>
      </div>
    </div>
  @else
  <div class="container-fluid d-flex align-items-center justify-content-center" style="min-height: 100vh; background-color: #f8f9fa;">
    <div class="container">
      <div class="row justify-content-center align-items-center" data-aos="fade-right">
  
        <!-- Columna para la imagen (visible en pantallas medianas y grandes) -->
        <div class="col-md-6 text-center d-none d-md-block">
          {{-- Te sugiero colocar una imagen o ilustración aquí para que sea más atractivo --}}
          {{-- Asegúrate de que la imagen exista en la ruta especificada --}}
          <img src="{{ Vite::asset('resources/images/certificate-validation.svg') }}" alt="Ilustración de Certificado" class="img-fluid" style="max-width: 400px;">
        </div>
  
        <!-- Columna para el formulario -->
        <div class="col-md-6 col-lg-5" data-aos="fade-left">
          <div class="card shadow-lg border-0 rounded-lg">
            <div class="card-body p-5">
              <h2 class="card-title text-center mb-4">Validar Certificado</h2>
              <p class="text-center text-muted mb-4">Ingresa el código de tu certificado para verificar su autenticidad.</p>
              <form action="{{ route('certificates.validate') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="mb-4">
                  <label for="code" class="form-label visually-hidden">Código del Certificado</label>
                  <input type="text" class="form-control form-control-lg text-center @error('code') is-invalid @enderror" id="code" name="code" placeholder="Escribe el código aquí" required value="{{ old('code') }}">
                  @if (session('error'))
                    <p class="text-danger text-center mt-3">{{ session('error') }}</p>
                  @endif
                </div>
                <div class="d-grid"><button type="submit" class="btn button_custom_primary btn-lg">Verificar Certificado</button></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif
</x-layout>