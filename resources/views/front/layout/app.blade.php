<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>iamgrsagor</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="{{ asset('assets/css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    
    <script src="{{ asset('assets/js/modernizr.js') }}"></script>
    <script src="{{ asset('assets/js/pace.min.js') }}"></script>

</head>

<body id="top">

    
    @include('front.layout.header')
    @yield('content')
    @include('front.layout.footer')
    @include('front.layout.preloader')

    <script src="{{ asset('assets/js/jquery-2.1.3.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
