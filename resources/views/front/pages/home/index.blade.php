@extends('front.layout.app')
@section('content')
    @include('front.pages.home.sections.intro')
    @include('front.pages.home.sections.about')
    @include('front.pages.home.sections.resume')
    @include('front.pages.home.sections.portfolio')
    {{-- @include('front.pages.home.sections.cta') --}}
    @include('front.pages.home.sections.services')
    @include('front.pages.home.sections.stats')
    @include('front.pages.home.sections.contact')
@endsection
