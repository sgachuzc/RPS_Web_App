<header>
  <nav class="navbar bg-light border-bottom fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/adminonline/index">
        <img src="{{ Vite::asset('resources/images/rps.png') }}" alt="RPS" width="50">
      </a>
      <div class="d-flex justify-content-center align-items-center gap-3">
        @auth
          <span>{{ auth()->user()->name }}</span>
        @endauth
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menú</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 h-100">
            {{ $slot }}
          </ul>
        </div>
      </div>
    </div>
  </nav>
</header>