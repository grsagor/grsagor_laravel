{{-- Pre-Footer CTA Section --}}
<section class="pre-footer-cta py-5 bg-primary text-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="h3 fw-bold mb-3 text-white">Ready to Start Your Project?</h2>
                <p class="lead mb-4 text-white-50">Let's work together to bring your ideas to life</p>
                <a href="{{ route('front.contact') }}" class="btn btn-light btn-lg">
                    <i class="fa-solid fa-paper-plane me-2"></i>Get In Touch
                </a>
            </div>
        </div>
    </div>
</section>

<footer class="bg-light py-5">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                <small class="text-muted">
                    &copy; 2023 - {{ date('Y') }} All Rights Reserved by
                    <a href="http://www.grsagor.com/" target="_blank" rel="noopener noreferrer"
                        class="text-decoration-none fw-semibold">
                        Golam Rahman Sagor
                    </a>
                </small>
                <div class="mt-2">
                    <small class="text-muted">
                        <a href="{{ route('front.privacy') }}" class="text-decoration-none text-muted me-2">Privacy Policy</a>
                        <span class="text-muted">|</span>
                        <a href="{{ route('front.terms') }}" class="text-decoration-none text-muted ms-2">Terms of Service</a>
                    </small>
                </div>
            </div>

            <div class="col-md-6 text-center text-md-end mb-3 mb-md-0">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <a href="https://facebook.com/iamgrsagor" target="_blank" rel="noopener noreferrer"
                            class="text-muted hover-text-primary fs-5" aria-label="Facebook">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://github.com/grsagor" target="_blank" rel="noopener noreferrer"
                            class="text-muted hover-text-primary fs-5" aria-label="GitHub">
                            <i class="fa-brands fa-github"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.linkedin.com/in/iamgrsagor/" target="_blank" rel="noopener noreferrer"
                            class="text-muted hover-text-primary fs-5" aria-label="LinkedIn">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://medium.com/@iamgrsagor" target="_blank" rel="noopener noreferrer"
                            class="text-muted hover-text-primary fs-5" aria-label="Medium">
                            <i class="fa-brands fa-medium"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://dev.to/iamgrsagor" target="_blank" rel="noopener noreferrer"
                            class="text-muted hover-text-primary fs-5" aria-label="Dev.to">
                            <i class="fa-brands fa-dev"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://x.com/iamgrsagor" target="_blank" rel="noopener noreferrer"
                            class="text-muted hover-text-primary fs-5" aria-label="Twitter">
                            <i class="fa-brands fa-x-twitter"></i>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</footer>
