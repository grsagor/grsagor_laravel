@extends('front.layout.app')

@section('title', 'Contact Me')

@section('content')
<section class="contact">
  <h2>Let's Connect</h2>
  <form action="{{ route('contact.submit') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Your Name" required>
    <input type="email" name="email" placeholder="Your Email" required>
    <textarea name="message" placeholder="Your Message" required></textarea>
    <button type="submit">Send</button>
  </form>
</section>
@endsection
