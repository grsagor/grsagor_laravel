@php
    $pageTitle = 'Projects';
    $pageDescription = 'Explore my portfolio of web development projects built with Laravel, PHP, and modern technologies. See my work in action.';
@endphp

@extends('front.layout.app')

@section('title', 'Projects')

@section('content')
    <section id="products" class="py-5 bg-light" style="padding-top: 8rem;">
        <div class="container">
            <x-breadcrumbs :items="[['label' => 'Projects']]" />
            <x-section-title 
                title="My Projects" 
                subtitle="Explore my portfolio of web development projects"
            />
            <div class="row g-4">
                @forelse ($projects as $index => $project)
                    <div class="col-sm-6 col-md-4 col-lg-3 animate-on-scroll" style="animation-delay: {{ $index * 0.1 }}s;">
                        <x-product-card image="{{ asset($project->image) }}" title="{{ $project->title }}"
                            description="{{ $project->description }}" live_link="{{ $project->live }}" 
                            github_link="{{ $project->github }}" project_id="{{ $project->id }}" />
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center py-5">
                            <i class="fa-solid fa-folder-open fa-4x text-muted mb-3"></i>
                            <h3 class="h4 text-muted mb-2">No Projects Yet</h3>
                            <p class="text-muted">Projects will be displayed here once they are added.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

@endsection

@section('modals')
    @include('front.components.project-details-modal')
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/projects.js') }}"></script>
@endpush
