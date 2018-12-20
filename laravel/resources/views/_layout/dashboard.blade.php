<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Webframework, Aeritape, exo, aeri, exol, dashboard, admin">
  <link rel="Shortcut Icon" href="{{ asset('public/Note de musique6.ico')}}" type="image/x-icon" /> 
  <title> Admin {{ config('app.name', 'Dashboard') }} - @yield('title')</title>
	 <!-- Styles -->
    <link href="{{ asset('public/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('public/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('public/css/dashboard/style.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/dashboard/style-responsive.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>
	<section id="container">
		@include('_layout.dashboard-header')
		@include('_layout.dashboard-aside')
		<section id="main-content">
      <section class="wrapper site-min-height">
        @yield('content')
      </section>
		</section>
    @include('_layout.dashboard-footer')
	</section>
	<script src="{{ asset('public/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('public/lib/bootstrap/js/bootstrap.min.js') }}"></script>
    <script class="include" type="text/javascript" src="{{ asset('public/lib/jquery.dcjqaccordion.2.7.js') }}"></script>
  	<script src="{{ asset('public/lib/jquery.scrollTo.min.js') }}"></script>
  	<script src="{{ asset('public/lib/jquery.nicescroll.js') }}" type="text/javascript"></script>
  	<script src="{{ asset('public/lib/jquery.sparkline.js') }}"></script>
  	<!--common script for all pages-->
  	<script src="{{ asset('public/lib/common-scripts.js') }}"></script>
    @yield('js')
</body>
</html>
