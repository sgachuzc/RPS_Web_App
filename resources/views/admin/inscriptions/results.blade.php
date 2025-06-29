<x-admin-layout>
  <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/adminonline/inscriptions" style="color: #6c757d;">Inscripciones</a></li>
      <li class="breadcrumb-item"><a href="{{ route('inscriptions.details', ['inscription' => $inscription->id]) }}" style="color: #6c757d;">{{ $preview }}</a></li>
      <li class="breadcrumb-item active" aria-current="page">Encuestas</li>
    </ol>
  </nav>
  <h1 class="mb-0">Detalle de encuestas</h1>
  <x-ui.admin-divider />
  <div class="row">
    <div class="col-12 col-md-6 mx-auto">
      <div class="accordion w-100 mx-auto" id="accordionCharts">
        <x-ui.accordion-item target="question1" title="Pregunta 1">
          <div class="chart">
            <canvas id="resultsQ1"></canvas>
          </div>
        </x-ui.accordion-item>
        <x-ui.accordion-item target="question2" title="Pregunta 2">
          <div class="chart">
            <canvas id="resultsQ2"></canvas>
          </div>
        </x-ui.accordion-item>
        <x-ui.accordion-item target="question3" title="Pregunta 3">
          <div class="chart">
            <canvas id="resultsQ3"></canvas>
          </div>
        </x-ui.accordion-item>
        <x-ui.accordion-item target="question4" title="Pregunta 4">
          <div class="chart">
            <canvas id="resultsQ4"></canvas>
          </div>
        </x-ui.accordion-item>
        <x-ui.accordion-item target="question5" title="Pregunta 5">
          <div class="chart">
            <canvas id="resultsQ5"></canvas>
          </div>
        </x-ui.accordion-item>
        <x-ui.accordion-item target="question6" title="Pregunta 6">
          @foreach ($resultsQ6 as $key => $answer)
            <p class="mb-2"><span>{{ $key + 1 }}.-</span> {{ $answer }}</p>
          @endforeach
        </x-ui.accordion-item>
        <x-ui.accordion-item target="question7" title="Pregunta 7">
          @foreach ($resultsQ7 as $key => $answer)
            <p class="mb-2"><span>{{ $key + 1 }}.-</span> {{ $answer }}</p>
          @endforeach
        </x-ui.accordion-item>
      </div>
    </div>
  </div>
</x-admin-layout>
<script type="text/javascript">
  window.resultsQ1 = @json($resultsQ1);
  window.resultsQ2 = @json($resultsQ2);
  window.resultsQ3 = @json($resultsQ3);
  window.resultsQ4 = @json($resultsQ4);
  window.resultsQ5 = @json($resultsQ5);
</script>