<x-forms-layout title="Dejanos tus comentarios">
  @if (session('success'))
    <x-ui.public-message-card url="resources/images/cover_success.svg" title="{{ session('success') }}"  subtitle=""/>
  @else
  <x-ui.public-form-card>
      <div class="card-body">
        <h3 class="card-title">Contesta la siguiente encuesta</h3>
        <hr>
        <form class="needs-validation" novalidate method="POST" action="/comments/{{ $comment->token }}">
          @csrf
          @method('patch')
          <div class="mb-3">
            <label class="form-label">Modalidad</label>
            <x-ui.form-radio id="option1" name="question_1" :isRequired="true" value="Presencial">
              Presencial
            </x-ui.form-radio>
            <x-ui.form-radio id="option2" name="question_1" :isRequired="true" value="En línea">
              En línea
            </x-ui.form-radio>
            <x-ui.form-radio id="option3" name="question_1" :isRequired="true" value="Hibrído">
              Hibrído
            </x-ui.form-radio>
          </div>
          <div class="table_responsive mb-4" style="overflow: hidden; overflow-x: scroll;">
            <label class="form-label">Contenido del curso</label>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th></th>
                  <th>Muy insatifech@</th>
                  <th>Insatisfech@</th>
                  <th>Satisfech@</th>
                  <th>Muy satisfech@</th>
                </tr>
              </thead>
              <tbody style="vertical-align: middle;">
                <tr>
                  <td>¿Qué tan satisfecho/a estás con el contenido del curso?</td>
                  <td class="text-center"><input class="form-check-input" type="radio" name="question_2"  value="Muy insatifech@" required></td>
                  <td class="text-center"><input class="form-check-input" type="radio" name="question_2"  value="Insatisfech@" required></td>
                  <td class="text-center"><input class="form-check-input" type="radio" name="question_2"  value="Satisfech@" required></td>
                  <td class="text-center"><input class="form-check-input" type="radio" name="question_2"  value="Muy satisfech@" required></td>
                </tr>
                <tr>
                  <td>¿El contenido cubrió tus expectativas y necesidades?</td>
                  <td class="text-center"><input class="form-check-input" type="radio" name="question_3" value="Muy insatifech@" required></td>
                  <td class="text-center"><input class="form-check-input" type="radio" name="question_3" value="Insatisfech@" required></td>
                  <td class="text-center"><input class="form-check-input" type="radio" name="question_3" value="Satisfech@" required></td>
                  <td class="text-center"><input class="form-check-input" type="radio" name="question_3" value="Muy satisfech@" required></td>
                </tr>
                <tr>
                  <td>¿Consideras que los temas tratados fueron claros y bien explicados?</td>
                  <td class="text-center"><input class="form-check-input" type="radio" name="question_4" value="Muy insatifech@" required></td>
                  <td class="text-center"><input class="form-check-input" type="radio" name="question_4" value="Insatisfech@" required></td>
                  <td class="text-center"><input class="form-check-input" type="radio" name="question_4" value="Satisfech@" required></td>
                  <td class="text-center"><input class="form-check-input" type="radio" name="question_4" value="Muy satisfech@" required></td>
                </tr>
                <tr>
                  <td>¿Cómo calificarías el desempeño del instructor?</td>
                  <td class="text-center"><input class="form-check-input" type="radio" name="question_5" value="Muy insatifech@" required></td>
                  <td class="text-center"><input class="form-check-input" type="radio" name="question_5" value="Insatisfech@" required></td>
                  <td class="text-center"><input class="form-check-input" type="radio" name="question_5" value="Satisfech@" required></td>
                  <td class="text-center"><input class="form-check-input" type="radio" name="question_5" value="Muy satisfech@" required></td>
                </tr>
              </tbody>
            </table>
          </div>
          <x-ui.form-field type="text" name="question_6" :isRequired="true">
            ¿Qué mejorarías del curso?
          </x-ui.form-field>
          <x-ui.form-field type="text" name="question_7" :isRequired="true">
            ¿Qué otros cursos te gustaría tomar?
          </x-ui.form-field>
          <div class="col-12 mt-2 mb-3">
            <button class="btn button_custom_primary w-100" type="submit">Responder</button>
          </div>
        </form>
      </div>
    </x-ui.public-form-card>
  @endif
</x-forms-layout>