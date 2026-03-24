<div class="row">
    <div class="col-md-6 mb-4 mb-md-0">
        <img src="{{ asset($project->image) }}" class="img-fluid rounded shadow-sm" alt="{{ $project->title }} - Project Screenshot" loading="lazy">
    </div>
    <div class="col-md-6">
        <h3 class="fw-bold mb-3">{{ $project->title }}</h3>
        <p class="text-muted mb-4" style="line-height: 1.8;">{{ $project->description }}</p>
        
        <div class="d-flex flex-column flex-sm-row gap-3 mb-4">
            @if($project->live)
                <a href="{{ $project->live }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary">
                    <i class="fas fa-external-link-alt me-2"></i> Live Demo
                </a>
            @endif
            
            @if($project->github)
                <a href="{{ $project->github }}" target="_blank" rel="noopener noreferrer" class="btn btn-dark">
                    <i class="fab fa-github me-2"></i> View on GitHub
                </a>
            @endif
        </div>

        <div class="mt-4">
            <h5 class="fw-semibold mb-3">Technologies Used</h5>
            <div class="d-flex flex-wrap gap-2">
                @php
                    $technologies = collect(preg_split('/[\r\n,]+/', (string) $project->technologies))
                        ->map(fn ($tech) => trim($tech))
                        ->filter();
                @endphp

                @forelse($technologies as $technology)
                    <span class="badge bg-light text-dark px-3 py-2">{{ $technology }}</span>
                @empty
                    <span class="text-muted">No technologies added yet.</span>
                @endforelse
            </div>
        </div>
    </div>
</div>

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "SoftwareApplication",
    "name": "{{ $project->title }}",
    "description": "{{ $project->description }}",
    "applicationCategory": "WebApplication",
    "operatingSystem": "Web",
    @if($project->live)
    "url": "{{ $project->live }}",
    @endif
    "author": {
        "@type": "Person",
        "name": "Golam Rahman Sagor",
        "url": "https://grsagor.com"
    }
}
</script>