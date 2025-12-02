@props(['image', 'title', 'description', 'live_link' => null, 'github_link' => null, 'project_id' => null])

<div {{ $attributes->merge(['class' => 'card h-100 shadow-sm rounded overflow-hidden']) }}>
    <img src="{{ $image }}" class="card-img-top" alt="{{ $title }}">
    <div class="card-body d-flex flex-column">
        <h5 class="card-title fw-semibold">{{ $title }}</h5>
        <div class="mt-auto d-flex gap-2">
            @if (isset($live_link))
                <a href="{{ $live_link }}" target="_blank" class="btn btn-primary flex-fill">Live Demo</a>
            @endif
            <button class="btn btn-outline-primary flex-fill project-details-btn" data-project-id="{{ $project_id }}">Details</button>
        </div>
    </div>
</div>
