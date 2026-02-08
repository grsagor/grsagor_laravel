<div {{ $attributes->merge(['class' => 'feature-card p-4 border rounded h-100 bg-white shadow-sm text-center']) }}>
    <div class="mb-3">
        <i class="{{ $icon }} fa-2x text-primary"></i>
    </div>
    <h4 class="fw-semibold mb-3">{{ $title }}</h4>
    <p class="text-muted mb-0">{{ $description }}</p>
</div>
