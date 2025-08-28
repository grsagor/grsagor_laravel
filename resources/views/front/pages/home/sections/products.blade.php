<section id="products" class="py-5 bg-light">
  <div class="container">
    <h2 class="section-title text-center mb-5">The Projects I Worked On</h2>
    <div class="row">

      @foreach ($projects as $project)
        <div class="col-12 col-sm-12 col-md-4 col-lg-3 mb-3">
          <x-product-card
            image="{{asset($project->image)}}"
            title="{{ $project->title }}"
            description="{{ $project->description }}"
            live_link="{{ $project->live }}"
          />
        </div>
      @endforeach

    </div>
  </div>
</section>
