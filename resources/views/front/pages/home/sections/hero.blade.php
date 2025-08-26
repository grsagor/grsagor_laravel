<section class="hero position-relative text-white" style="background: url('{{ asset('assets/images/intro-bg.jpg') }}') center center / cover no-repeat;">
  <div class="overlay position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.6);"></div>

  <div class="container h-100 d-flex flex-column align-items-center justify-content-center">
    <div class="text-center position-relative z-1">
      <h1 class="display-4 fw-bold">Hi, I'm a Software Engineer</h1>
      <p class="lead mt-3">I build clean, scalable, Laravel-based applications that solve real-world problems.</p>
      <a href="{{ route('front.projects') }}" class="btn btn-primary btn-lg mt-4">View My Projects</a>

      <!-- Icon-only Contact Info -->
      <div class="contact-icons mt-4 d-flex justify-content-center gap-3">
        <a href="mailto:grsagor08@gmail.com" target="_blank" class="text-white hover-text-primary fs-4">
          <i class="fa-solid fa-envelope"></i>
        </a>
        <a href="tel:+8801710384479" class="text-white hover-text-primary fs-4">
          <i class="fa-solid fa-phone"></i>
        </a>
        <a href="https://wa.me/8801710384479" target="_blank" class="text-white hover-text-primary fs-4">
          <i class="fa-brands fa-whatsapp"></i>
        </a>
        <a href="https://www.linkedin.com/in/iamgrsagor" target="_blank" class="text-white hover-text-primary fs-4">
          <i class="fa-brands fa-linkedin"></i>
        </a>
      </div>
    </div>
  </div>
</section>
