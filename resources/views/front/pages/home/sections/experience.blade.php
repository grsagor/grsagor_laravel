<section id="experience" class="experience-section py-5 bg-light">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Professional Experience</h2>
            <p class="text-muted">A snapshot of my journey and achievements in software development</p>
        </div>

        <div class="row g-4 experience-list">
            @foreach ($experiences as $experience)
                <div class="col-md-6">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body d-flex align-items-start">
                            @if ($experience->logo)
                                <img src="{{ asset($experience->logo) }}" alt="Company Logo" class="me-3"
                                    style="width:50px; height:50px; object-fit:contain;">
                            @endif
                            <div>
                                <h3 class="card-title mb-1">{{ $experience->title }}</h3>
                                <span class="text-muted">
                                    {{ $experience->company }} |
                                    {{ \Carbon\Carbon::parse($experience->start_date)->format('Y') }} -
                                    {{ $experience->end_date ? \Carbon\Carbon::parse($experience->end_date)->format('Y') : 'Present' }}
                                </span>
                                <p class="card-text mt-2">{{ $experience->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
