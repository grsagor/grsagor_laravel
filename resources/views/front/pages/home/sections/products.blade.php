<section id="products" class="py-5 bg-light" itemscope itemtype="https://schema.org/ItemList">
  <div class="container">
    <x-section-title 
        title="The Projects I Worked On" 
        subtitle="Explore my portfolio of web applications and solutions"
    />
    <div class="row g-4">
      @forelse ($projects as $index => $project)
        <div class="col-12 col-sm-12 col-md-4 col-lg-3 animate-on-scroll" style="animation-delay: {{ $index * 0.1 }}s;" itemprop="itemListElement" itemscope itemtype="https://schema.org/SoftwareApplication">
          <meta itemprop="name" content="{{ $project->title }}">
          <meta itemprop="description" content="{{ $project->description }}">
          @if($project->live)
          <meta itemprop="url" content="{{ $project->live }}">
          @endif
          <x-product-card
            image="{{asset($project->image)}}"
            project_id="{{ $project->id }}"
            title="{{ $project->title }}"
            description="{{ $project->description }}"
            live_link="{{ $project->live }}"
          />
        </div>
      @empty
        <div class="col-12">
          <div class="text-center py-5">
            <i class="fa-solid fa-folder-open fa-4x text-muted mb-3"></i>
            <h3 class="h4 text-muted mb-2">No Projects Yet</h3>
            <p class="text-muted">Projects will be displayed here once they are added.</p>
          </div>
        </div>
      @endforelse
    </div>
    
    @if($projects->count() > 0)
    <div class="text-center mt-5">
      <a href="{{ route('front.projects') }}" class="btn btn-outline-primary btn-lg">
        <i class="fa-solid fa-arrow-right me-2"></i>View All Projects
      </a>
    </div>
    @endif
  </div>
</section>
