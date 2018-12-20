@extends('_layout.aeritape')
@section('title', 'Play')
@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/global/single.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/global/single_responsive.css')}}">
	<!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/global/main_styles.css')}}"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/global/responsive.css')}}">
@endsection
@section('home')
    <div class="home">
		<div class="home_inner">
			<!-- Image artist: https://unsplash.com/@yoannboyer -->
			<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/about.jpg" data-speed="0.8"></div>
			<div class="home_container">
				<div class="home_content text-center">
					<div class="home_title">{{ $play->name }}</div><br>
                    <div class="home_subtitle">{{ $play->artist }} {{ $play->album_ke }} {{ $play->type }}</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('content')
	
<!-- featured album -->
	<div class="featured_album">
        <div class="background_image featured_background" style="background-image:url('{{ asset('img/featured.png')}}')"></div>
        <div class="container">
            
            <div class="row featured_row row-lg-eq-height">

                <!-- Featured Album Image -->
                <div class="col-md-6">
                    <div class="featured_album_image">
                        <div class="image_overlay"></div>
                        <div class="background_image" style="background-image:url('{{ asset('album/'.$play->type.'/'.$play->cover) }}')"></div>
                        <!-- <img src="images/featured_album.jpg" alt=""> -->
                    </div>
                </div>

                <!-- Featured Album Player -->
                <div class="col-md-6 featured_album_col">
                    <div class="featured_album_player_container d-flex flex-column align-items-start justify-content-center">
                        <div class="featured_album_player">
                            <div class="featured_album_title_bar d-flex flex-row align-items-center justify-content-start">
                                <div class="featured_album_title_container">
                                    <div class="featured_album_artist">{{ $play->artist }}</div>
                                    <div class="featured_album_title">{{ $play->album_ke }} {{ $play->type }} "{{ $play->name }}"</div>
                                </div>
                                <div class="featured_album_link ml-auto"><a href="#">buy it on itunes</a></div>
                            </div>
                            <script>
    initAlbumPlayer();
    
    function initAlbumPlayer()
    {
        const API_URL = "{{route('listenapi', $play->id)}}";

        if($('#jplayer_1').length)
        {

            fetch(API_URL)
            .then((response)=>response.json())
            .then((songs)=>{
                songs.forEach(function{
                    var playlist = songs;
                });
            });

            var options =
            {
                playlistOptions:
                {
                    autoPlay:false,
                    enableRemoveControls:false
                },
                play: function() // To avoid multiple jPlayers playing together.
                { 
                    $(this).jPlayer("pauseOthers");
                },
                solution: 'html',
                supplied: 'oga, mp3',
                useStateClassSkin: true,
                preload: 'metadata',
                volume: 0.2,
                muted: false,
                backgroundColor: '#000000',
                cssSelectorAncestor: '#jp_container_1',
                errorAlerts: false,
                warningAlerts: false
            };

            var cssSel = 
            {
                jPlayer: "#jplayer_1",
                cssSelectorAncestor: "#jp_container_1",
                play: '.jp-play',
                pause: '.jp-pause',
                stop: '.jp-stop',
                seekBar: '.jp-seek-bar',
                playBar: '.jp-play-bar',
                globalVolume: true,
                mute: '.jp-mute',
                unmute: '.jp-unmute',
                volumeBar: '.jp-volume-bar',
                volumeBarValue: '.jp-volume-bar-value',
                volumeMax: '.jp-volume-max',
                playbackRateBar: '.jp-playback-rate-bar',
                playbackRateBarValue: '.jp-playback-rate-bar-value',
                currentTime: '.jp-current-time',
                duration: '.jp-duration',
                title: '.jp-title',
                fullScreen: '.jp-full-screen',
                restoreScreen: '.jp-restore-screen',
                repeat: '.jp-repeat',
                repeatOff: '.jp-repeat-off',
                gui: '.jp-gui',
                noSolution: '.jp-no-solution'
            };

            var myPlaylist = new jPlayerPlaylist(cssSel,playlist,options);
            
            
            setTimeout(function()
            {
                var items = $('.jp-playlist ul li > div');
                for(var x = 0; x < items.length; x++)
                {
                    var item = items[x];
                    var dur = playlist[x].duration;
                    var durationDiv = document.createElement('div');
                    durationDiv.className = "song_duration";
                    durationDiv.append(dur);
                    item.append(durationDiv);
                }
            },200);
        }
    }

</script>
                            <div id="jplayer_1" class="jp-jplayer"></div>
                            <div id="jp_container_1" class="jp-audio" role="application" aria-label="media player">
                                <div class="jp-type-playlist">
                                    <div class="jp-playlist">
                                        <ul>
                                            <li></li>
                                        </ul>
                                    </div>
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
                    </div>
                </div>

            </div>
        </div>
    </div>
    <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </br>
<!-- Video -->

    <div class="video">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="video_container">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/OsKLytDnKGA?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>


	<div class="single">
		<div class="container">
			<div class="row">
				
				<!-- Single Info -->
				<div class="col-lg-5">
					<div class="single_info">
						<div class="single_image"><img src="{{ asset('album/'.$play->type.'/'.$play->cover) }}" alt=""></div>
						<!-- <div class="logo_list d-flex flex-row align-items-center justify-content-start flex-wrap">
							<div><a href="#"><img src="images/logo_1.png" alt=""></a></div>
							<div><a href="#"><img src="images/logo_2.png" alt=""></a></div>
							<div><a href="#"><img src="images/logo_3.png" alt=""></a></div>
							<div><a href="#"><img src="images/logo_4.png" alt=""></a></div>
						</div> -->
					</div>
				</div>

				<!-- Single Content -->
				<div class="col-lg-7 single_content_col">
					<div class="single_content">
						
						<br>
						<div class="single_text">
							<p> In vitae nisi aliquam, scelerisque leo a, volutpat sem. Vivamus rutrum dui fermentum eros hendrerit, id lobortis leo volutpat. Maecenas sollicitudin est in libero pretium interdum. Nullam volutpat dui sem, ac congue purus luctus nec. Curabitur luctus luctus erat, sit amet facilisis quam congue quis. Quisque ornare luctus erat id dignissim. Nullam ac nunc quis ex porttitor luctus.</p>
							<p>Integer sed facilisis eros. In iaculis rhoncus velit in malesuada. In hac habitasse platea dictumst. Fusce erat ex, consectetur sit amet ornare suscipit, porta et erat. Donec nec nisi in nibh commodo laoreet. Mauris dapibus justo ut feugiat malesuada. Fusce ultricies ante tortor, non vestibulum est feugiat ut.</p>
						</div>
						<!-- <div class="single_players">
							
							<!-- Single Player --
							<div class="single_player_container d-flex flex-column align-items-start justify-content-center">
								<div class="single_player">
									<div id="jplayer_1" class="jp-jplayer"></div>
									<div id="jp_container_1" class="jp-audio" role="application" aria-label="media player">
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
							</div>

							<!-- Single Player --
							<div class="single_player_container d-flex flex-column align-items-start justify-content-center">
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
							</div>

							<!-- Single Player --
							<div class="single_player_container d-flex flex-column align-items-start justify-content-center">
								<div class="single_player">
									<div id="jplayer_3" class="jp-jplayer"></div>
									<div id="jp_container_3" class="jp-audio" role="application" aria-label="media player">
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
							</div>

						</div> -->
					</div>
				</div>

			</div>
		</div>
	</div>


@endsection
@section('js')
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/single.js')}}"></script>
<script src="{{ asset('js/db_connection.js') }}"></script>

@endsection