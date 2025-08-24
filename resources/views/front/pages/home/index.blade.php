@extends('front.layout.app')

@section('title', 'Home')

@section('content')
  @include('front.pages.home.sections.hero')
  @include('front.pages.home.sections.features')
  {{-- @include('front.pages.home.sections.products') --}}
  @include('front.pages.home.sections.skills')
  @include('front.pages.home.sections.testimonials')
@endsection
