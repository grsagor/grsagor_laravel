@extends('front.layout.app')

@section('title', 'Projects')

@section('content')
    <section id="products" class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center mb-5">Our Products</h2>
            <div class="row g-4">

                @foreach ($projects as $project)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <x-product-card image="{{ asset($project->image) }}" title="{{ $project->title }}"
                            description="{{ $project->description }}" live_link="{{ $project->live }}" />
                    </div>
                @endforeach

            </div>
        </div>
    </section>

@endsection
