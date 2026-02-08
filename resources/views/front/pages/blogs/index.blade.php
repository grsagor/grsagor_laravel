@php
    $pageTitle = 'Blog';
    $pageDescription = 'Read my latest blog posts about web development, Laravel, PHP, and software engineering insights.';
@endphp

@extends('front.layout.app')

@section('title', 'Blog')

@section('content')
    <div class="py-5" style="padding-top: 8rem;">
        <div class="container mb-4">
            <x-breadcrumbs :items="[['label' => 'Blog']]" />
        </div>
        @include('front.pages.home.sections.blogs')
    </div>
@endsection