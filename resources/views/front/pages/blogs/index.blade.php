@extends('front.layout.app')

@section('title', 'Blog')

@section('content')
    <div class="py-5">
        @include('front.pages.home.sections.blogs')
    </div>
@endsection
