	<!-- Header -->
	<header class="header">
		<div class="header_content d-flex flex-row align-items-center justify-content-center">
			<div class="logo"><a href="{{route('home')}}">AeriTape</a></div>
			<div class="log_reg">
				<ul class="d-flex flex-row align-items-start justify-content-start">
					@auth
                        <li><a href="{{ route('admin') }}" target="blank">Home</a></li>
                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @endauth
				</ul>
			</div>
			<nav class="main_nav">
				<ul class="d-flex flex-row align-items-start justify-content-start">
					<li class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}"><a href="{{route('home')}}">Home</a></li>
					<li class="{{ Route::currentRouteName() == 'album' ? 'active' : '' }}"><a href="{{route('album')}}">Albums</a></li>
					
					<li class="{{ Route::currentRouteName() == 'listen' ? 'active' : '' }}"><a href="{{route('album')}}">Play</a></li>
					<!-- <li><a href="blog.html">News</a></li>
					<li><a href="contact.html">Contact</a></li> -->
					<li class="{{ Route::currentRouteName() == 'about' ? 'active' : '' }}"><a href="{{route('about')}}">About</a></li>
				</ul>
			</nav>
			<div class="hamburger ml-auto">
				<div class="d-flex flex-column align-items-end justify-content-between">
					<div></div>
					<div></div>
					<div></div>
				</div>
			</div>
		</div>
	</header>

	<!-- Menu -->

	<div class="menu">
		<div>
			<div class="menu_overlay"></div>
			<div class="menu_container d-flex flex-column align-items-start justify-content-center">
				<div class="menu_log_reg">
					<ul class="d-flex flex-row align-items-start justify-content-start">
						@auth
	                        <li><a href="{{ route('admin') }}" target="blank">Home</a></li>
	                    @else
	                        <li><a href="{{ route('login') }}">Login</a></li>
	                        <li><a href="{{ route('register') }}">Register</a></li>
	                    @endauth
					</ul>
				</div>
				<nav class="menu_nav">
					<ul class="d-flex flex-column align-items-start justify-content-start">
						<li><a href="{{route('home')}}">Home</a></li>
						<li><a href="{{route('album')}}">Albums</a></li>
						<li><a href="{{route('album')}}">Play</a></li>
						<!-- <li><a href="blog.html">News</a></li>
						<li><a href="contact.html">Contact</a></li>-->
						<li><a href="{{route('about')}}">About</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>