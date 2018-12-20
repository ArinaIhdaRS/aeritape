<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="Shortcut Icon" href="{{ asset('public/Note de musique6.ico')}}" type="image/x-icon" /> 

        <title>{{ config('app.name', 'Aeritape') }} - @yield('title')</title>

        <!-- css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('public/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css">         
        <link rel="stylesheet" type="text/css" href="{{ asset('public/css/global/bootstrap-4.1.2/bootstrap.min.css')}}">
        <link href="{{ asset('public/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="{{ asset('public/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/plugins/OwlCarousel2-2.2.1/animate.css')}}">

        @yield('css')

        
    </head>
    <body>
        <div class="super_container">
            @include('_layout.aeritape-header')
            @yield('home')
            @yield('content')
            @include('_layout.aeritape-footer')
        </div>

        <!-- js -->
        <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('public/js/popper.min.js') }}"></script>
        <script src="https://getbootstrap.com/docs/4.1/dist/js/bootstrap.min.js"></script>
        <script src="{{ asset('public/js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('public/css/global/bootstrap-4.1.2/popper.js') }}"></script>
        <script src="{{ asset('public/css/global/bootstrap-4.1.2/bootstrap.min.js') }}"></script>
        <script src="{{ asset('public/plugins/greensock/TweenMax.min.js') }}"></script>
        <script src="{{ asset('public/plugins/greensock/TimelineMax.min.js') }}"></script>
        <script src="{{ asset('public/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
        <script src="{{ asset('public/plugins/greensock/animation.gsap.min.js') }}"></script>
        <script src="{{ asset('public/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
        <script src="{{ asset('public/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
        <script src="{{ asset('public/plugins/easing/easing.js') }}"></script>
        <script src="{{ asset('public/plugins/progressbar/progressbar.min.js') }}"></script>
        <script src="{{ asset('public/plugins/parallax-js-master/parallax.min.js') }}"></script>
        <script src="{{ asset('public/plugins/jPlayer/jquery.jplayer.min.js') }}"></script>
        <script src="{{ asset('public/plugins/jPlayer/jplayer.playlist.min.js') }}"></script>
        @yield('js')
    </body>
</html>
