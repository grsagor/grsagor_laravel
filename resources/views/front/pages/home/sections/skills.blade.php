<section id="skills" class="py-5">
  <div class="container">
    <x-section-title 
        title="My Skills" 
        subtitle="Technologies and tools I work with"
    />
    <div class="row g-4">

      @php
        $chunks = $skills->chunk(ceil($skills->count() / 2));
      @endphp

      @foreach($chunks as $chunkIndex => $chunk)
        <div class="col-md-6">
          @foreach($chunk as $skillIndex => $skill)
            <div class="mb-4 animate-on-scroll" style="animation-delay: {{ ($chunkIndex * 0.2) + ($skillIndex * 0.1) }}s;">
              <label class="d-flex justify-content-between fw-semibold mb-2">
                <span>{{ $skill->name }}</span>
                <span>{{ $skill->proficiency }}%</span>
              </label>
              <div class="progress" style="height: 10px;">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 0%"
                  data-proficiency="{{ $skill->proficiency }}"
                  aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          @endforeach
        </div>
      @endforeach

    </div>
  </div>
</section>
