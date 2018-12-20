@extends('_layout.aeritape')

@section('title', 'Albums')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/global/about.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/global/about_responsive.css')}}">
@endsection

@section('home')
    <div class="home">
		<div class="home_inner">
			<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/about.jpg" data-speed="0.8"></div>
			<div class="home_container">
				<div class="home_content text-center">
					<div class="home_title">Albums/Singles</div><br>
					<div class="home_subtitle">Choose Album to Play</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('content')
	<!-- Discs -->

	<div class="discs">
		<div class="container">
			<div class="row discs_row">

				@foreach ($album as $key => $albums)				
				<!-- Disc --
				<div class="col-xl-4 col-md-6">
					<div class="disc">
						<a href="single.html">
							<div class="disc_image"><img src="{{ asset('album/'.$albums->type.'/'.$albums->cover)}}" alt="https://unsplash.com/@tanelah"></div>
							<div class="disc_container">
								<div>
									<div class="disc_content_1">
										<div class="disc_title">Mixtape</div>
										<div class="disc_subtitle">Music For the People</div>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>
				

				<!-- Disc -->
				<div class="col-xl-4 col-md-6">
					<div class="disc">
						<a href="{{route('listen', $albums->id)}}" target="blank">
							<div class="disc_image"><img src="{{ asset('public/album/'.$albums->type.'/'.$albums->cover)}}" alt="{{ $albums->cover }}"></div>
							<div class="disc_container">
								<div>
									<div class="disc_content_2 d-flex flex-column align-items-center justify-content-center">
										<div>
											<div class="disc_title" align="center">{{$albums->name }}</div>
											<div class="disc_subtitle" align="center">{{ $albums->artist}} {{$albums->album_ke}} {{$albums->type}}</div>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>

				<!-- Disc --
				<div class="col-xl-4 col-md-6">
					<div class="disc">
						<a href="single.html">
							<div class="disc_image"><img src="{{ asset('album/'.$albums->type.'/'.$albums->cover)}}" alt="https://unsplash.com/@photones11"></div>
							<div class="disc_container">
								<div>
									<div class="disc_content_3">
										<div>
											<div class="disc_title">Mixtape</div>
											<div class="disc_subtitle">Singles</div>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>

				<!-- Disc --
				<div class="col-xl-4 col-md-6">
					<div class="disc">
						<a href="single.html">
							<div class="disc_image"><img src="{{ asset('album/'.$albums->type.'/'.$albums->cover)}}" alt="https://unsplash.com/@rexcuando"></div>
							<div class="disc_container">
								<div>
									<div class="disc_content_4 d-flex flex-column align-items-start justify-content-end">
										<div class="text-left">
											<div class="disc_title">Mixtape</div>
											<div class="disc_subtitle">1983</div>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>

				<!-- Disc --
				<div class="col-xl-4 col-md-6">
					<div class="disc">
						<a href="single.html">
							<div class="disc_image"><img src="{{ asset('album/'.$albums->type.'/'.$albums->cover)}}" alt="https://unsplash.com/@alicemoore"></div>
							<div class="disc_container">
								<div>
									<div class="disc_content_5">
										<div class="disc_title">Mixtape</div>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>

				<!-- Disc --
				<div class="col-xl-4 col-md-6">
					<div class="disc">
						<a href="single.html">
							<div class="disc_image"><img src="{{ asset('album/'.$albums->type.'/'.$albums->cover)}}" alt="https://unsplash.com/@arstyy"></div>
							<div class="disc_container">
								<div>
									<div class="disc_content_6">
										<div class="disc_title">Mixtape</div>
										<div class="disc_subtitle">Music For the People</div>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>
				<!-- end disc -->
				@endforeach

			</div>
			
		</div>

	</div>
@endsection

@section('js')
<script src="{{ asset('public/js/about.js')}}"></script>
<script src="{{ asset('public/js/db_connection.js') }}"></script>
<script src="{{ asset('public/js/custom.js') }}"></script>
@endsection