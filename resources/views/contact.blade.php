<x-layout>
  <section class="container my-5">
    <h2 class="text-center mb-5">Contáctanos</h2>
    <div class="row">
      <div class="col-md-4 d-flex justify-content-center align-items-center">
        <img src="{{ Vite::asset('resources/images/message.svg') }}" alt="" class="img-fluid my-auto">
      </div>
      <div class="col-md-8">
        <x-ui.contact-form />
      </div>
    </div>
  </section>
</x-layout>