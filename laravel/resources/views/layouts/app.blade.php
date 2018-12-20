<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" href="{{ asset('public/Note de musique6.ico')}}" type="image/x-icon" /> 

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Login') }}</title>

    <!-- Styles -->
    <link href="{{ asset('public/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('public/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('public/css/dashboard/style.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/dashboard/style-responsive.css') }}" rel="stylesheet">
</head>
<body>

    <div id="app">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}"></script>
    <script src="{{ asset('public/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('public/lib/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="{{ asset('public/lib/jquery.backstretch.min.js') }}"></script>
    <script>
        $.backstretch("{{ asset('public/img/IMG_20180716_100321.jpg') }}", {
        speed: 500
        });
    </script>
</body>
</html>
