<section id="experience" class="experience-section py-5 bg-light">
    <div class="container">

        <x-section-title 
            title="Professional Experience" 
            subtitle="A snapshot of my journey and achievements in software development"
        />

        <div class="row g-4 experience-list">
            @foreach ($experiences as $index => $experience)
                <div class="col-md-6 animate-on-scroll" style="animation-delay: {{ $index * 0.1 }}s;">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body d-flex align-items-start p-4">
                            @if ($experience->logo)
                                <img src="{{ asset($experience->logo) }}" alt="{{ $experience->company }} Logo" class="me-3 flex-shrink-0" loading="lazy"
                                    style="width:60px; height:60px; object-fit:contain; border-radius: 8px;">
                            @endif
                            <div class="flex-grow-1">
                                <h3 class="card-title mb-2 fw-bold">{{ $experience->title }}</h3>
                                <span class="text-muted d-block mb-2">
                                    {{ $experience->company }} |
                                    {{ \Carbon\Carbon::parse($experience->start_date)->format('Y') }} -
                                    {{ $experience->end_date ? \Carbon\Carbon::parse($experience->end_date)->format('Y') : 'Present' }}
                                </span>
                                <p class="card-text mt-2 mb-0">{{ $experience->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
