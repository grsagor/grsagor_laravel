@extends('front.layout.app')

@section('title', '404 - Page Not Found')

@push('meta')
    @php
        $pageTitle = '404 - Page Not Found';
        $pageDescription = 'The page you are looking for could not be found.';
    @endphp
@endsection

@section('content')
<section class="py-5 d-flex align-items-center" style="min-height: 70vh; padding-top: 8rem;">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8 animate-on-scroll">
                <div class="mb-4">
                    <h1 class="display-1 fw-bold text-primary">404</h1>
                    <h2 class="h3 fw-bold mb-3">Page Not Found</h2>
                    <p class="lead text-muted mb-4">
                        Oops! The page you're looking for doesn't exist. It might have been moved, deleted, or the URL might be incorrect.
                    </p>
                </div>
                
                <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                    <a href="{{ route('front.index') }}" class="btn btn-primary btn-lg">
                        <i class="fa-solid fa-home me-2"></i>Go to Homepage
                    </a>
                    <a href="{{ route('front.contact') }}" class="btn btn-outline-primary btn-lg">
                        <i class="fa-solid fa-envelope me-2"></i>Contact Me
                    </a>
                </div>

                <div class="mt-5">
                    <h3 class="h5 fw-semibold mb-3">Popular Pages</h3>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="{{ route('front.projects') }}" class="text-decoration-none">
                            <span class="badge bg-light text-dark p-2">Projects</span>
                        </a>
                        <a href="{{ route('front.blogs') }}" class="text-decoration-none">
                            <span class="badge bg-light text-dark p-2">Blogs</span>
                        </a>
                        <a href="{{ route('front.about') }}" class="text-decoration-none">
                            <span class="badge bg-light text-dark p-2">About</span>
                        </a>
                        <a href="{{ route('front.contact') }}" class="text-decoration-none">
                            <span class="badge bg-light text-dark p-2">Contact</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
