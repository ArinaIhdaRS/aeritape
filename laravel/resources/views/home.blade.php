@extends('_layout.dashboard')

@section('title', 'Dashboard')

@section('content')
        <h3><i class="fa fa-home"></i> Dashboard</h3>
        <hr>
        <div class="row">
          <div class="col-lg-12">
            
            <h1 align="center">WELCOME!</h1>
            <h2 align="center">AERITAPE ADMINISTRATOR</h2>
            <br><br>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              <div class="custom-box">
                <div class="servicetitle">
                  <h4>All Songs</h4>
                  <hr>
                </div>
                <div class="icn-main-container">
                  <span class="icn-container">{{ $songs }}</span>
                </div>
                <p>Last Added : </p>
                <a class="btn btn-theme" data-toggle="modal" href="{{ route('songs')}}">Show All</a>
              </div>
              <!-- end custombox -->
            </div>

            <!-- <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="detailsongs" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Detail All Songs</h4>
                  </div>
                  <div class="modal-body">
                    <ul class="pricing" style="list-style:none">
                      <p>3 New Songs:</p>
                      <li>asdf</li>
                      <li>uyt</li>
                      <li>nbvc</li>
                    </ul>
                  </div>
                  <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-theme" type="button">Close</button>
                  </div>
                </div>
            </div>
        </div> -->

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              <div class="custom-box">
                <div class="servicetitle">
                  <h4>All Albums</h4>
                  <hr>
                </div>
                <div class="icn-main-container">
                <span class="icn-container">{{ $albums }}</span>
                </div>
                <p>Last Added : 2018-03-25</p>
                <a class="btn btn-theme" href="{{ route('albums')}}">Show All</a>
              </div>
              <!-- end custombox -->
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              <div class="custom-box">
                <div class="servicetitle">
                  <h4>All Singles</h4>
                  <hr>
                </div>
                <div class="icn-main-container">
                  <span class="icn-container">{{ $singles }}</span>
                </div>
                <p>Last Added : 2018-03-25</p>
                <a class="btn btn-theme" href="#">Show All</a>
              </div>
              <!-- end custombox -->
            </div>
          </div>
        </div>
@endsection
