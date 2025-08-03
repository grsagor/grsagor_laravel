@extends('front.layout.app')

@section('title', 'Blog')

@section('content')
<section class="blog">
  <h2>Latest Posts</h2>
  @foreach ($posts as $post)
    <div class="post">
      <h3><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a></h3>
      <p>{{ Str::limit($post->content, 150) }}</p>
    </div>
  @endforeach
</section>
@endsection
