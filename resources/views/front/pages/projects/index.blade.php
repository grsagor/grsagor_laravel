@extends('front.layout.app')

@section('title', 'Projects')

@section('content')
<section class="projects">
  <h2>My Projects</h2>
  @foreach ($projects as $project)
    <div class="project">
      <h3>{{ $project->title }}</h3>
      <p>{{ $project->description }}</p>
    </div>
  @endforeach
</section>
@endsection
