@props([
  'name' => '',
  'subtitle' => '',
  'featured' => false,
  'description' => ''
])

<div class="contact-card bg-white rounded-4 shadow-sm overflow-hidden mb-3">
    <div class="row g-0">
        <div class="col-md-12">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="card-title mb-0 text-primary fw-bold">
                      {{ $name }}
                      <br>
                      <span class="card-text" style="font-size: 20px; color: var(--primary);">
                        {{ $subtitle }}
                      </span>
                    </h3>
                    @if ($featured)
                    <span class="badge px-3 py-2 rounded-pill" style="background-color: var(--primary); color: var(--fifth)">
                        Destacado
                    </span>
                    @endif
                </div>
                <p class="card-text text-muted mb-4">
                    {{ $description }}
                </p>
                <div class="d-flex gap-3 mb-4">
                    <a class="btn button_custom_primary d-flex gap-2" href="">
                      Ver más
                      <x-ui.icon icon="read_more" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
