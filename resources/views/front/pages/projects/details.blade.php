<div class="row">
    <div class="col-md-6">
        <img src="{{ asset($project->image) }}" class="img-fluid rounded" alt="{{ $project->title }}">
    </div>
    <div class="col-md-6">
        <h4>{{ $project->title }}</h4>
        <p class="text-muted">{{ $project->description }}</p>
        
        <div class="mt-3">
            @if($project->live)
                <a href="{{ $project->live }}" target="_blank" class="btn btn-primary me-2">
                    <i class="fas fa-external-link-alt"></i> Live Demo
                </a>
            @endif
            
            @if($project->github)
                <a href="{{ $project->github }}" target="_blank" class="btn btn-dark">
                    <i class="fab fa-github"></i> GitHub
                </a>
            @endif
        </div>
        
        @if($project->status)
            <div class="mt-3">
                <span class="badge bg-success">Status: {{ $project->status }}</span>
            </div>
        @endif
    </div>
</div>