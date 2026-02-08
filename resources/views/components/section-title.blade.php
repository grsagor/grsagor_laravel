@props([
    'title' => '',
    'subtitle' => null,
    'class' => '',
    'itemprop' => null,
    'itempropDesc' => null,
    'tag' => 'h2'
])

<div class="section-header text-center mb-5 animate-on-scroll {{ $class }}">
    @if($itemprop)
        <{{ $tag }} class="section-title fw-bold mb-3" itemprop="{{ $itemprop }}">{{ $title }}</{{ $tag }}>
    @else
        <{{ $tag }} class="section-title fw-bold mb-3">{{ $title }}</{{ $tag }}>
    @endif
    
    @if($subtitle)
        @if($itempropDesc)
            <p class="section-subtitle text-muted mt-3" itemprop="{{ $itempropDesc }}">{{ $subtitle }}</p>
        @else
            <p class="section-subtitle text-muted mt-3">{{ $subtitle }}</p>
        @endif
    @endif
</div>
