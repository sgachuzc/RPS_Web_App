<x-layout>
  <section class="container my-5">
    <div class="row">
      <div class="col-12">
        <div class="d-flex gap-3 justify-contenet-center align-items-center mb-4">
          <div style="width: 10px; height: 10px; background-color: var(--second);"></div>
          <h2 class="mb-0">Otros servicios</h2>
        </div>
        @foreach ($auditories as $auditory)
          <x-ui.services-card name="{{ $auditory->name }}" subtitle="{{ $auditory->subtitle }}" featured="{{ $auditory->featured }}" description="{{ $auditory->description }}"/>   
        @endforeach
      </div>
    </div>
  </section>
</x-layout>