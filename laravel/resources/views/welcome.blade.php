@extends('_layout.aeritape')
@section('title', 'Home')
@section('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('public/css/global/main_styles.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/css/global/responsive.css')}}">
@endsection
@section('home')
    <div class="home">
        <div class="home_slider_container">
            
            <!-- Home Slider -->
            <div class="owl-carousel owl-theme home_slider">
                
                <!-- Slide -->
                <div class="owl-item">
                    <div class="background_image_home" style="background-image:url('{{ asset('public/img/bg1.jpg')}}')"></div>
                    <div class="home_container">
                        <div class="home_container_inner d-flex flex-column align-items-center justify-content-center">
                            <div class="home_content text-center">
                                <div class="home_subtitle">WebStream for Aeri</div>
                                <div class="home_title"><h1>WE ARE ONE</h1></div>
                                <!-- <div class="home_link"><a href="#">Listen on Soundcloud</a></div> -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide -->
                <div class="owl-item">
                    <div class="background_image_home" style="background-image:url('{{ asset('public/img/bg1.jpg')}}')"></div>
                    <div class="home_container">
                        <div class="home_container_inner d-flex flex-column align-items-center justify-content-center">
                            <div class="home_content text-center">
                                <div class="home_subtitle">New single release</div>
                                <div class="home_title"><h1>Love is all around</h1></div>
                                <div class="home_link"><a href="#">Listen on Soundcloud</a></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide -->
                <div class="owl-item">
                    <div class="background_image_home" style="background-image:url('{{ asset('public/img/bg1.jpg')}}')"></div>
                    <div class="home_container">
                        <div class="home_container_inner d-flex flex-column align-items-center justify-content-center">
                            <div class="home_content text-center">
                                <div class="home_subtitle">New single release</div>
                                <div class="home_title"><h1>Love is all around</h1></div>
                                <div class="home_link"><a href="#">Listen on Soundcloud</a></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('content')
<!-- featured album -->
    
    <div class="featured_album">
        <div class="background_image featured_background" style="background-image:url('{{ asset('public/img/featured.png')}}')"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-6">
                    <div class="section_title_container">
                        <div class="section_subtitle">NEW RELEASE</div>
                        <div class="section_title"><h1>{{ $album->name }}</h1></div>
                    </div>
                </div>
            </div>
            <div class="row featured_row row-lg-eq-height">

                <!-- Featured Album Image -->
                <div class="col-md-6">
                    <div class="featured_album_image">
                        <div class="image_overlay"></div>
                        <div class="background_image" style="background-image:url('{{ asset('public/album/'.$album->type.'/'.$album->cover) }}')"></div>
                        <!-- <img src="images/featured_album.jpg" alt=""> -->
                    </div>
                </div>

                <!-- Featured Album Player -->
                <div class="col-md-6 featured_album_col">
                    <div class="featured_album_player_container d-flex flex-column align-items-start justify-content-center">
                        <div class="featured_album_player">
                            <div class="featured_album_title_bar d-flex flex-row align-items-center justify-content-start">
                                <div class="featured_album_title_container">
                                    <div class="featured_album_artist">{{$album->artist}}</div>
                                    <div class="featured_album_title">{{$album->album_ke}} {{$album->type}} "{{$album->name}}"</div>
                                </div>
                                <div class="featured_album_link ml-auto"><a href="#">buy it on itunes</a></div>
                            </div>
                            <script>
                                function initAlbumPlayer()
                                {
                                    if($('#jplayer_1').length)
                                    {
                                        var playlist =
                                        [
                                            {
                                                title:"Love Shot",
                                                artist:"EXO",
                                                mp3:"album/Repackage Album/01. Love Shot.mp3",
                                                duration:"3.20"
                                            },
                                            {
                                                title:"트라우마 (Trauma)",
                                                artist:"EXO",
                                                mp3:"album/Repackage Album/03. 트라우마 (Trauma).mp3",
                                                duration:"3.42"
                                            },
                                            {
                                                title:"Wait",
                                                artist:"EXO",
                                                mp3:"album/Repackage Album/04. Wait.mp3",
                                                duration:"4.08"
                                            }
                                        ];

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
    

<!-- artist -->
    <div class="shows">
        <div class="container">
            <div class="row" style="z-index:10;">
                <div class="col">
                    <div class="section_title_container">
                        <div class="section_subtitle">AeriTape</div>
                        <div class="section_title"><h1>Related Artist</h1></div>
                    </div>
                </div>
            </div>
            <div class="row shows_row">
                
                <!-- Shows List -->
                <div class="col-lg-8 order-lg-1 order-2 shows_list_col">
                    <div class="shows_list_container">
                        <ul class="shows_list">

                            <!-- Show -->
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div><div class="show_date">#1</div></div>
                                <div class="show_info d-flex flex-md-row flex-column align-items-md-center align-items-start justify-content-md-start justify-content-center">
                                    <div class="show_name"><a href="#">EXO</a></div>
                                    <div class="show_location">17 Albums</div>
                                </div>
                                <div class="ml-auto"><div class="show_shop trans_200"><a href="#">Show</a></div></div>
                            </li>

                            <!-- Show -->
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div><div class="show_date">#2</div></div>
                                <div class="show_info d-flex flex-md-row flex-column align-items-md-center align-items-start justify-content-md-start justify-content-center">
                                    <div class="show_name"><a href="#">EXO-K</a></div>
                                    <div class="show_location">2 Albums</div>
                                </div>
                                <div class="ml-auto"><div class="show_shop trans_200"><a href="#">Show</a></div></div>
                            </li>

                            <!-- Show -->
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div><div class="show_date">#3</div></div>
                                <div class="show_info d-flex flex-md-row flex-column align-items-md-center align-items-start justify-content-md-start justify-content-center">
                                    <div class="show_name"><a href="#">EXO-M</a></div>
                                    <div class="show_location">2 Albums</div>
                                </div>
                                <div class="ml-auto"><div class="show_shop trans_200"><a href="#">Show</a></div></div>
                            </li>

                            <!-- Show -->
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div><div class="show_date">#4</div></div>
                                <div class="show_info d-flex flex-md-row flex-column align-items-md-center align-items-start justify-content-md-start justify-content-center">
                                    <div class="show_name"><a href="#">EXO-CBX</a></div>
                                    <div class="show_location">3 Albums</div>
                                </div>
                                <div class="ml-auto"><div class="show_shop trans_200"><a href="#">Show</a></div></div>
                            </li>

                            <!-- Show -->
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div><div class="show_date">#5</div></div>
                                <div class="show_info d-flex flex-md-row flex-column align-items-md-center align-items-start justify-content-md-start justify-content-center">
                                    <div class="show_name"><a href="#">LAY</a></div>
                                    <div class="show_location">3 Albums</div>
                                </div>
                                <div class="ml-auto"><div class="show_shop trans_200"><a href="#">Show</a></div></div>
                            </li>

                            <!-- Show -->
                            <!-- <li class="d-flex flex-row align-items-center justify-content-start">
                                <div><div class="show_date">25/08</div></div>
                                <div class="show_info d-flex flex-md-row flex-column align-items-md-center align-items-start justify-content-md-start justify-content-center">
                                    <div class="show_name"><a href="#">Vikings Festival</a></div>
                                    <div class="show_location">Oslo, Norway</div>
                                </div>
                                <div class="ml-auto"><div class="show_shop trans_200"><a href="#">Show</a></div></div>
                            </li> -->

                        </ul>
                    </div>
                </div>

                <!-- Shows Image -->
                <div class="col-lg-4 order-lg-2 order-1">
                    <div class="shows_image">
                        <div class="image_overlay"></div>
                        <img src="{{ asset('public/img/oiuytrew.jpg')}}" alt="https://unsplash.com/@anthonydelanoix">
                    </div>
                </div>

            </div>
        </div>
    </div>



@endsection
@section('js')
<script src="{{ asset('public/js/db_connection.js') }}"></script>
<script src="{{ asset('public/js/custom.js') }}"></script>
@endsection