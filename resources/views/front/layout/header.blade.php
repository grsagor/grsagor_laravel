<header id="mainHeader" style="position: sticky; top: 0; z-index: 1030;">
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm border-bottom">
    <div class="container">
      <a class="navbar-brand fw-bold fs-3" href="{{ route('front.index') }}">
        <span class="text-primary">iam</span>grsagor
      </a>

      <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation" id="navbarToggler">
        <span class="navbar-toggler-icon" id="burgerIcon">
          <i class="fa-solid fa-bars"></i>
        </span>
        <span class="navbar-toggler-icon d-none" id="closeIcon">
          <i class="fa-solid fa-xmark"></i>
        </span>
      </button>

      <div class="collapse navbar-collapse" id="mainNavbar">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
          <li class="nav-item">
            <a class="nav-link position-relative fw-medium {{ request()->routeIs('front.index') ? 'active' : '' }}" href="{{ route('front.index') }}">
              Home
              {!! request()->routeIs('front.index') ? '<span class="position-absolute bottom-0 start-50 translate-middle-x border border-2 rounded-pill" style="width: 30px; height: 3px; border-color: var(--primary-color);"></span>' : '' !!}
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link position-relative fw-medium {{ request()->routeIs('front.about') ? 'active' : '' }}" href="{{ route('front.about') }}">
              About
              {!! request()->routeIs('front.about') ? '<span class="position-absolute bottom-0 start-50 translate-middle-x border border-2 rounded-pill" style="width: 30px; height: 3px; border-color: var(--primary-color);"></span>' : '' !!}
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link position-relative fw-medium {{ request()->routeIs('front.projects') ? 'active' : '' }}" href="{{ route('front.projects') }}">
              Projects
              {!! request()->routeIs('front.projects') ? '<span class="position-absolute bottom-0 start-50 translate-middle-x border border-2 rounded-pill" style="width: 30px; height: 3px; border-color: var(--primary-color);"></span>' : '' !!}
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link position-relative fw-medium {{ request()->routeIs('front.blogs') ? 'active' : '' }}" href="{{ route('front.blogs') }}">
              Blogs
              {!! request()->routeIs('front.blogs') ? '<span class="position-absolute bottom-0 start-50 translate-middle-x border border-2 rounded-pill" style="width: 30px; height: 3px; border-color: var(--primary-color);"></span>' : '' !!}
            </a>
          </li>
          <li class="nav-item ms-3">
            <a href="{{ route('front.contact') }}" class="btn btn-primary rounded-pill px-4 py-2">
              Get In Touch
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const navbar = document.querySelector('.navbar');
    const navbarToggler = document.getElementById('navbarToggler');
    const burgerIcon = document.getElementById('burgerIcon');
    const closeIcon = document.getElementById('closeIcon');
    const mainNavbar = document.getElementById('mainNavbar');
    
    // Handle scroll effect
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
    
    // Toggle burger/close icon
    if (navbarToggler && mainNavbar && burgerIcon && closeIcon) {
        // Function to update icons based on menu state
        function updateIcons() {
            const isExpanded = mainNavbar.classList.contains('show');
            if (isExpanded) {
                // Menu is open - show X icon
                burgerIcon.classList.add('d-none');
                closeIcon.classList.remove('d-none');
            } else {
                // Menu is closed - show burger icon
                burgerIcon.classList.remove('d-none');
                closeIcon.classList.add('d-none');
            }
        }
        
        // Listen for Bootstrap collapse events - only change icon when animation completes
        mainNavbar.addEventListener('shown.bs.collapse', function() {
            // Menu fully opened
            burgerIcon.classList.add('d-none');
            closeIcon.classList.remove('d-none');
            navbarToggler.setAttribute('aria-expanded', 'true');
        });
        
        mainNavbar.addEventListener('hidden.bs.collapse', function() {
            // Menu fully closed
            burgerIcon.classList.remove('d-none');
            closeIcon.classList.add('d-none');
            navbarToggler.setAttribute('aria-expanded', 'false');
        });
        
        // Initial check
        updateIcons();
    }
});
</script>
