<div class="card">
  <div class="card-body">
    <form class="needs-validation" novalidate method="POST" action="">
      @csrf
      <div class="row">
        <div class="col">
          <x-ui.form-field type="text" name="name" :isRequired="true">
            Nombre
          </x-ui.form-field>
        </div>
        <div class="col">
          <x-ui.form-field type="email" name="email" :isRequired="true">
            Correo electrónico
          </x-ui.form-field>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <x-ui.form-field type="text" name="phone" :isRequired="true">
            Teléfono
          </x-ui.form-field>
        </div>
        <div class="col">
          <x-ui.form-select label="Servicios" name="service_id" :isRequired="true">
            <option value="">Seleccione un rol</option>
          </x-ui.form-select>
        </div>
      </div>
      <x-ui.form-field type="text" name="issue" :isRequired="true">
        Asunto
      </x-ui.form-field>
      <x-ui.form-textarea name="message" label="Mensaje" :isRequired="true"/>
      <div class="col-12 mt-2 mb-3">
        <button class="btn button_custom_primary w-100 d-flex gap-2 text-center justify-content-center" type="submit">
          Enviar mensaje
          <x-ui.icon icon="send" />
        </button>
      </div>
    </form>
  </div>
</div>