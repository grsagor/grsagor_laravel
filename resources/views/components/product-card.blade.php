@props(['image', 'title', 'description', 'live_link' => null, 'github_link' => null, 'project_id' => null])

<div {{ $attributes->merge(['class' => 'card h-100 shadow-sm rounded overflow-hidden product-card-wrapper']) }}>
    <div class="position-relative overflow-hidden product-image-wrapper">
        <img src="{{ $image }}" class="card-img-top" alt="{{ $title }} - Project by Golam Rahman Sagor" loading="lazy">
        <div class="product-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
            <div class="text-white text-center px-3">
                <p class="mb-0 small">{{ Str::limit($description, 100) }}</p>
            </div>
        </div>
    </div>
    <div class="card-body d-flex flex-column">
        <h5 class="card-title fw-semibold mb-3">{{ $title }}</h5>
        <div class="mt-auto d-flex gap-2">
            @if (isset($live_link))
                <a href="{{ $live_link }}" target="_blank" class="btn btn-primary flex-fill">
                    <i class="fa-solid fa-external-link-alt me-1"></i>Live Demo
                </a>
            @endif
            @if (isset($project_id))
                <button class="btn btn-outline-primary flex-fill project-details-btn" data-project-id="{{ $project_id }}">
                    <i class="fa-solid fa-info-circle me-1"></i>Details
                </button>
            @endif
        </div>
    </div>
</div>
