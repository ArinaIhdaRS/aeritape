@extends('_layout.dashboard')

@section('title', 'Music Video')

@section('css')
	<link href="{{ asset('public/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
  	<link href="{{ asset('public/lib/fancybox/jquery.fancybox.css')}}" rel="stylesheet" />
@endsection

@section('content')
	<h3><i class="fa fa-youtube-play"></i> Music Video</h3>
        <hr>
        <div class="row mt">
        @foreach ($daftar_song as $song)	
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 desc">
          	<iframe width="510" height="320" src="{{ $song->mv_url }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          	<h3>{{ $song->judul}} Music Video</h3>
          	<br>
          </div>
        @endforeach
          <!-- col-lg-4 -->
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
            <div class="project-wrapper">
              <div class="project">
                <div class="photo-wrapper">
                  <div class="photo">
                    <a class="fancybox" href="img/portfolio/port05.jpg"><img class="img-responsive" src="img/portfolio/port05.jpg" alt=""></a>
                  </div>
                  <div class="overlay"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- col-lg-4 -->
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
            <div class="project-wrapper">
              <div class="project">
                <div class="photo-wrapper">
                  <div class="photo">
                    <a class="fancybox" href="img/portfolio/port06.jpg"><img class="img-responsive" src="img/portfolio/port06.jpg" alt=""></a>
                  </div>
                  <div class="overlay"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- col-lg-4 -->
        </div>
@endsection