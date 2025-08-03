@extends('front-bk.layout.app')
@section('content')
    @include('front-bk.pages.home.sections.intro')
    @include('front-bk.pages.home.sections.about')
    @include('front-bk.pages.home.sections.resume')
    @include('front-bk.pages.home.sections.portfolio')
    {{-- @include('front-bk.pages.home.sections.cta') --}}
    @include('front-bk.pages.home.sections.services')
    @include('front-bk.pages.home.sections.stats')
    @include('front-bk.pages.home.sections.contact')
@endsection
