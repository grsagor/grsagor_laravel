<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold" href="{{ route('front.index') }}">iamgrsagor</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="mainNavbar">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('front.index') ? 'text-primary' : '' }}" href="{{ route('front.index') }}">Home</a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('front.about') }}">About</a>
          </li> --}}
          {{-- <li class="nav-item">
            <a class="nav-link" href="#resume">Resume</a>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('front.projects') ? 'text-primary' : '' }}" href="{{ route('front.projects') }}">Projects</a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" href="#services">Services</a>
          </li> --}}
          {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('front.contact') }}">Contact</a>
          </li> --}}
        </ul>
      </div>
    </div>
  </nav>
</header>
