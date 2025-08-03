<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>iamgrsagor</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="{{ asset('assets-bk/css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-bk/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-bk/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-bk/css/style.css') }}">
    
    <script src="{{ asset('assets-bk/js/modernizr.js') }}"></script>
    <script src="{{ asset('assets-bk/js/pace.min.js') }}"></script>

</head>

<body id="top">

    
    @include('front-bk.layout.header')
    @yield('content')
    @include('front-bk.layout.footer')
    @include('front-bk.layout.preloader')

    <script src="{{ asset('assets-bk/js/jquery-2.1.3.min.js') }}"></script>
    <script src="{{ asset('assets-bk/js/plugins.js') }}"></script>
    <script src="{{ asset('assets-bk/js/main.js') }}"></script>

</body>

</html>
