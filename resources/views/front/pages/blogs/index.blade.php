@php
    $pageTitle = 'Blog';
    $pageDescription = 'Read my latest blog posts about web development, Laravel, PHP, and software engineering insights.';
@endphp

@extends('front.layout.app')

@section('title', 'Blog')

@section('content')
    <section class="blogs-page bg-light" style="padding-top: 8rem; padding-bottom: 5rem;">
        <div class="container mb-4 pt-5">
            <x-breadcrumbs :items="[['label' => 'Blog']]" />
        </div>
        @include('front.pages.home.sections.blogs')
    </section>
@endsection