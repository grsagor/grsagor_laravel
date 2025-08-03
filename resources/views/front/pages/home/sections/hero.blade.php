<section class="hero position-relative text-white" style="height: 100vh; background: url('{{ asset('assets/images/intro-bg.jpg') }}') center center / cover no-repeat;">
  <div class="overlay position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.6);"></div>

  <div class="container h-100 d-flex align-items-center justify-content-center">
    <div class="text-center position-relative z-1">
      <h1 class="display-4 fw-bold">Hi, I'm a Software Engineer</h1>
      <p class="lead mt-3">I build clean, scalable, Laravel-based applications that solve real-world problems.</p>
      <a href="{{ route('front.projects') }}" class="btn btn-primary btn-lg mt-4">View My Projects</a>
    </div>
  </div>
</section>
