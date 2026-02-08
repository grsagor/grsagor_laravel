<section id="blogs" class="blogs-section bg-light">
    <div class="container">

        <x-section-title 
            title="Latest Blogs" 
            subtitle="Insights, tutorials, and updates from my journey in software development"
        />

        <div class="row g-4 blog-list">
            @forelse($blogs as $index => $blog)
                <div class="col-md-4 animate-on-scroll" style="animation-delay: {{ $index * 0.1 }}s;">
                    <article class="card shadow-sm border-0 h-100" itemscope itemtype="https://schema.org/BlogPosting">
                        <img src="{{ $blog->image }}" class="card-img-top" alt="{{ $blog->title }} - Blog Post" loading="lazy" style="height:200px; object-fit:cover;" itemprop="image">
                        <div class="card-body d-flex flex-column">
                            <h3 class="card-title h5 mb-2" itemprop="headline">{{ $blog->title }}</h3>
                            <span class="text-muted mb-3 d-block" style="font-size:0.9rem;" itemprop="datePublished" content="{{ \Carbon\Carbon::parse($blog->date)->toIso8601String() }}">
                                <i class="fa-regular fa-calendar me-1"></i>
                                {{ \Carbon\Carbon::parse($blog->date)->format('F j, Y') }}
                            </span>
                            <p class="card-text flex-grow-1" itemprop="description">{{ Str::limit($blog->short_description, 120) }}</p>
                            <a href="{{ $blog->url }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary mt-3" itemprop="url">
                                Read More <i class="fa-solid fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                        <meta itemprop="author" content="Golam Rahman Sagor">
                        <meta itemprop="publisher" content="Golam Rahman Sagor">
                    </article>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="fa-solid fa-newspaper fa-4x text-muted mb-3"></i>
                        <h3 class="h4 text-muted mb-2">No Blog Posts Yet</h3>
                        <p class="text-muted">Blog posts will be displayed here once they are added.</p>
                    </div>
                </div>
            @endforelse
        </div>

    </div>
</section>
