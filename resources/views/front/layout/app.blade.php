<!DOCTYPE html>
<html lang="en" itemscope itemtype="https://schema.org/WebSite">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') | Professional Web Developer & Software Engineer</title>

    <x-meta-tag />

    {{-- Vendors Started --}}
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}">
    {{-- Vendors Ended --}}

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}?v=2.0">

    @stack('styles')
</head>

<body>
    @include('front.layout.preloader')
    @include('front.layout.header')

    <main>
        @yield('content')
    </main>

    @include('front.layout.footer')

    @yield('modals')
    
    {{-- Floating CTA --}}
    <x-floating-cta />
    
    {{-- Back to Top Button --}}
    <x-back-to-top />

    {{-- Vendor Starts --}}
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/jQuery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
    {{-- Vendor End --}}
    
    {{-- Custom Scripts --}}
    <script src="{{ asset('assets/js/animations.js') }}?v=2.0"></script>
    
    @stack('scripts')
</body>

</html>
