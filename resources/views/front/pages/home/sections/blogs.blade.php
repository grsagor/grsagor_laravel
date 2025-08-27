<section id="blogs" class="blogs-section bg-light">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold section-title">Latest Blogs</h2>
            <p class="text-muted">Insights, tutorials, and updates from my journey in software development</p>
        </div>

        <div class="row g-4 blog-list">
            @foreach($blogs as $blog)
                <div class="col-md-4">
                    <div class="card shadow-sm border-0 h-100">
                        <img src="{{ $blog->image }}" class="card-img-top" alt="{{ $blog->title }}" style="height:200px; object-fit:cover;">
                        <div class="card-body d-flex flex-column">
                            <h3 class="card-title h5">{{ $blog->title }}</h3>
                            <span class="text-muted mb-2" style="font-size:0.9rem;">{{ \Carbon\Carbon::parse($blog->date)->format('F j, Y') }}</span>
                            <p class="card-text">{{ Str::limit($blog->short_description, 120) }}</p>
                            <a href="{{ $blog->url }}" target="_blank" class="btn btn-primary mt-auto">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
