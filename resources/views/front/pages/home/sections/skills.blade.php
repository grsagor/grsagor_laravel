<section id="skills" class="py-5">
  <div class="container">
    <h2 class="section-title text-center mb-5">My Skills</h2>
    <div class="row g-4">

      @php
        $chunks = $skills->chunk(ceil($skills->count() / 2));
      @endphp

      @foreach($chunks as $chunk)
        <div class="col-md-6">
          @foreach($chunk as $skill)
            <div class="mb-4">
              <label class="d-flex justify-content-between fw-semibold">
                <span>{{ $skill->name }}</span>
                <span>{{ $skill->proficiency }}%</span>
              </label>
              <div class="progress" style="height: 8px;">
                <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $skill->proficiency }}%"
                  aria-valuenow="{{ $skill->proficiency }}" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          @endforeach
        </div>
      @endforeach

    </div>
  </div>
</section>
