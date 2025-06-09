<header class="header">
  <nav class="navbar">
    <div class="nav_container">
      <figure class="nav_figure">
        <img class="nav_logo" src="{{ Vite::asset('resources/images/rps.png') }}" alt="" width="50">
      </figure>
      <label class="nav_toggle">
        <input type="checkbox" id="menu_input" class="nav_input">
      </label>
      <ul class="nav_list">
        {{ $slot }}
      </ul>
    </div>
  </nav>
</header>