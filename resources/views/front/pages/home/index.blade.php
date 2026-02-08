@php
    $pageTitle = 'Home';
    $pageDescription = 'Professional Web Developer & Software Engineer specializing in Laravel, PHP, and modern web technologies. Building scalable, high-performance web applications.';
@endphp

@extends('front.layout.app')

@section('title', 'Home')

@section('content')
    @include('front.pages.home.sections.hero')
    @include('front.pages.home.sections.stats')
    @include('front.pages.home.sections.features')
    @include('front.pages.home.sections.experience')
    @include('front.pages.home.sections.skills')
    @include('front.pages.home.sections.products')
    @include('front.pages.home.sections.testimonials')
    @include('front.pages.home.sections.blogs')
    @include('front.pages.home.sections.contact')
@endsection

@section('modals')
    @include('front.components.project-details-modal')
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/projects.js') }}"></script>
@endpush
