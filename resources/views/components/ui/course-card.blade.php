@props([
  'id' => '',
  'name' => '',
  'subtitle' => '',

])

<div class="course">
  <div class="flip-card mx-auto my-0">
    <div class="flip-card-inner">
      <div class="flip-card-front">
        <img src="{{ Vite::asset('resources/images/certified.png') }}" alt="Team Member" class="profile-img">
        <h3>{{ $name }}</h3>
        <p>{{ $subtitle }}</p>
        <p class="mt-3">
          <span class="waving-hand">👋</span> ¿Quieres saber más?
        </p>
      </div>
      <div class="flip-card-back">
        <h3>Acerca</h3>
        <p>I'm passionate about creating beautiful and functional websites. With 5 years of experience,
          I specialize in front-end development and UX design.</p>
        <div class="social-icons mt-4">
          <a class="btn button_custom_secondary d-flex gap-2" href="">
            Ver más
            <x-ui.icon icon="read_more" />
          </a>
        </div>
      </div>
    </div>
  </div>
</div>