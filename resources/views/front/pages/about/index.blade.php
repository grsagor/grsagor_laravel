@php
  $pageTitle = 'About Me';
  $pageDescription = 'Learn about Golam Rahman Sagor, a professional software engineer and web developer specializing in Laravel, PHP, and modern web technologies.';
@endphp

@extends('front.layout.app')

@section('title', 'About Me')

@section('content')
  <section class="py-5" style="padding-top: 8rem;">
    <div class="container">
      <x-breadcrumbs :items="[['label' => 'About']]" />
      <div class="row align-items-center mb-5">
        <div class="col-lg-6 animate-on-scroll mt-5 mt-lg-0">
          <h1 class="section-title fw-bold mb-4">About Me</h1>
          <p class="lead text-muted mb-4">
            Hi, I'm <strong class="text-primary">Golam Rahman Sagor</strong>, a passionate software engineer and web
            developer specializing in Laravel, PHP, and modern web technologies.
          </p>
          <p class="text-muted mb-4">
            With years of experience in building scalable web applications, I'm dedicated to creating clean, maintainable
            code that solves real-world problems. I believe in following best practices, SOLID principles, and writing
            code that not only works but is also easy to understand and extend.
          </p>
          <p class="text-muted mb-4">
            My expertise spans across full-stack development, from designing intuitive user interfaces to architecting
            robust backend systems. I'm particularly passionate about Laravel framework, API development, and creating
            seamless user experiences.
          </p>
          <div class="d-flex flex-column flex-sm-row gap-3">
            <a href="{{ route('front.contact') }}" class="btn btn-primary btn-lg">
              <i class="fa-solid fa-envelope me-2"></i>Get In Touch
            </a>
            <a href="{{ route('front.projects') }}" class="btn btn-outline-primary btn-lg">
              <i class="fa-solid fa-briefcase me-2"></i>View My Work
            </a>
          </div>
        </div>
        <div class="col-lg-6 animate-on-scroll" style="animation-delay: 0.2s;">
          <div class="text-center">
            <div class="about-hero-image-wrapper position-relative d-inline-block">
              <img src="{{ asset('assets/images/grsagor.jpg') }}" alt="Golam Rahman Sagor - Professional Web Developer"
                class="about-hero-image rounded-circle shadow-lg" loading="eager">
              <div class="about-hero-image-overlay"></div>
            </div>
          </div>
        </div>
      </div>
      
      @include('front.pages.home.sections.features')
    </div>
  </section>
@endsection