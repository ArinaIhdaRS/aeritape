@extends('_layout.aeritape')

@section('title', 'About')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/global/about.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/global/about_responsive.css')}}">
@endsection

@section('home')
    <div class="home">
    	<div class="home_inner">
			<!-- Image artist: https://unsplash.com/@yoannboyer -->
			<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/about.jpg" data-speed="0.8"></div>
			<div class="home_container">
				<div class="home_content text-center">
					<div class="home_title">About</div><br>
					<div class="home_subtitle">AeriTape</div>
				</div>
			</div>
		</div>
    </div>
@endsection

@section('content')

	<!-- Artist -->

	<div class="artist">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('public/img/exo_growl_by_sorasti-d6gl37t.jpg')}}" data-speed="0.8"></div>
		<div class="container">
			<div class="row">

				<!-- Artist Content -->
				<div class="col-lg-7 offset-lg-5">
					<div class="artist_content">
						<div class="section_title_container">
							<div class="section_title"><h1>AERITAPE</h1></div>
						</div>
						<div class="artist_text">
							<p> In vitae nisi aliquam, scelerisque leo a, volutpat sem. Vivamus rutrum dui fermentum eros hendrerit, id lobortis leo volutpat. Maecenas sollicitudin est in libero pretium interdum. Nullam volutpat dui sem, ac congue purus luctus nec. </p>
						</div>
					</div>
					<br>
					<br>
					<br>
					<div class="artist_content">
						<div class="section_title_container">
							<div class="section_title"><h1>EXO & EXO-L</h1></div>
						</div>
						<div class="artist_text">
							<p>Integer sed facilisis eros. In iaculis rhoncus velit in malesuada. In hac habitasse platea dictumst. Fusce erat ex, consectetur sit amet ornare suscipit, porta et erat. Donec nec nisi in nibh commodo laoreet. Mauris dapibus justo ut feugiat malesuada.</p>
						</div>
						<!-- <div class="artist_sig"><img src="images/sig.png" alt=""></div> -->
						<!-- <div class="single_player_container d-flex flex-column align-items-start justify-content-center">
							<div class="single_player">
								<div id="jplayer_2" class="jp-jplayer"></div>
								<div id="jp_container_2" class="jp-audio" role="application" aria-label="media player">
									<div class="jp-type-single">
										<div class="player_details d-flex flex-row align-items-center justify-content-start">
											<div class="jp-details">
												<div>playing</div>
												<div class="jp-title" aria-label="title">&nbsp;</div>
											</div>
											<div class="jp-controls-holder ml-auto">
												<button class="jp-play" tabindex="0"></button>
											</div>
										</div>
										<div class="player_controls">
											<div class="jp-gui jp-interface d-flex flex-row align-items-center justify-content-start">
												<div class="jp-controls-holder time_controls d-flex flex-row align-items-center justify-content-start">
													<div><div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div></div>
													<div class="jp-progress">
														<div class="jp-seek-bar">
															<div class="jp-play-bar"></div>
														</div>
													</div>
													<div><div class="jp-duration ml-auto" role="timer" aria-label="duration">&nbsp;</div></div>
												</div>
												<div class="jp-volume-controls d-flex flex-row align-items-center justify-content-start ml-auto">
													<button class="jp-mute" tabindex="0"></button>
													<div class="jp-volume-bar">
														<div class="jp-volume-bar-value"></div>
													</div>
												</div>
											</div>
										</div>
										<div class="jp-no-solution">
											<span>Update Required</span>
											To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>
										</div>
									</div>
								</div>

							</div>
						</div> -->
					</div>
				</div>
				<br>
			</div>
		</div>
	</div>

@endsection

@section('js')
<script src="{{ asset('public/js/about.js')}}"></script>
@endsection