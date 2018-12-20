@extends('_layout.dashboard')

@section('title', 'Tracks')

@section('css')
    <link rel="stylesheet" href="{{ asset('public/lib/file-uploader/css/jquery.fileupload-ui.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('audioplayerengine/initaudioplayer-1.css')}}">
@endsection

@section('content')
	<h3><i class="fa fa-list"></i> Album Tracks</h3>
    <hr>
    <div class="row mt">
        <div class="col-lg-12">
        @if (\Session::has('success'))
            <div class="alert alert-success">
              <p><span><i class="fa fa-check-circle-o"></i></span> {{ \Session::get('success') }}</p>
            </div>
        @endif
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 mb">
        <div class="content-panel form-panel">
            <h5 class="mb"><i class="fa fa-book"></i> ALBUM</h5>
            <p>{{$album->album_ke}} {{$album->type}} <br>"<b>{{ $album->name }}</b>"</p>
            <p><small><i class="fa fa-user"></i> {{ $album->artist }}</small></p>
            <img src="{{ asset('public/album/'.$album->type.'/'.$album->cover)}}" width="100%" style="border:1px solid black; border-radius: 4px">
          	 
            <!-- <button class="btn btn-xs btn-primary btn-block" width="100%" data-toggle="modal" data-target="#ModalAdd"><i class="fa fa-pencil"></i> Edit Album</button> -->
        </div>
        </div>
        <div class="col-lg-9">
            <div class="content-panel form-panel">
                <h4 class="mb"><i class="fa fa-music"></i> SONG LIST</h4>
                <!-- <button class="btn btn-success" data-toggle="modal" data-target="#ModalAdd"><i class="fa fa-edit"></i> Edit Song List</button> -->
                <br>
              <!-- modal add --
                <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Add New Song</h4>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('insertsongs', $album->id)}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <label class="control-label">Title: </label>
                          <input type="text" class="form-control" name="judul" required autofocus>
                        </div>
                        <div class="form-group">
                          <label class="control-label">Track: </label>
                          <input type="text" class="form-control" name="track" required autofocus>
                        </div>
                        <div class="form-group">
                          <label class="control-label">Length (min): </label>
                          <input type="text" class="form-control" name="length" required autofocus>
                        </div>
                        <div class="form-group">
                          <label class="control-label">File: </label>
                          <input type="file" accept=".mp3" name="filename" required>
                        </div>
                        <div class="form-group">
                          <label class="control-label">Music Video: </label><span>
                          <label>
                            <input type="radio" name="title" value="Yes" onclick="javascript:document.getElementById('titled').style.display='block';" checked="checked" />
                            Yes
                          </label>
                          <label>
                            <input type="radio" name="title" value="No" onclick="javascript:document.getElementById('titled').style.display='none';" />
                            No
                          </label></span>
                        </div>

                        <div id="titled" hide="hide">
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="url" name="mv_url">
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
              <!-- end modal add -->
                <!-- <a href="{{route('albums')}}" class="btn btn-primary"><i class="fa fa-check"></i> All Done</a> -->
                <table class="table">
                <thead>
                  <tr>
                    <th>Track</th>
                    <th>Title</th>
                    <th>Length</th>
                    <th>File</th>
                    <th>Listen</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($track_list as $song)
                  <tr>
                    <td>{{ $song->track}}</td>
                    <td>{{ $song->judul}} @if ($song->title == 'Yes')<span class="label label-default">MV</span> @endif</td>
                    <td>{{ $song->length}}</td>
                    <td>{{ $song->filename}}</td>
                    <td width="15%">
                      <audio controls="controls" style="width:53%;">
                                  <source src="{{ asset('public/album/'.$album->type.'/'.$song->filename)}}" type="audio/mpeg">
                                </audio>

                   
                      <!-- <button class="btn btn-primary btn-xs"data-toggle="modal" data-target="#ModalPlay{{ $song->id }}"><i class="fa fa-play"></i> Play</button>
                      <!-- modal add --
		                <div class="modal fade" id="ModalPlay{{ $song->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		                  <div class="modal-dialog">
		                    <div class="modal-content">
		                      <div class="modal-header">
		                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                        <h4 class="modal-title" id="myModalLabel">Player</h4>
		                      </div>
		                      <div class="modal-body">
                            
                              <div class="col-md-3">
                                <p>{{ $song->judul }}</p>
                                <img src="{{ asset('album/'.$album->type.'/'.$album->cover)}}" width="100%" style="border:1px solid black; border-radius: 4px">
                              </div>
                              <div class="col-md-9">
                                <audio controls>
                                  <source src="{{ asset('album/'.$album->type.'/'.$song->filename)}}" type="audio/mpeg">
                                </audio>    
                              </div>
                       
		                      	
		                        <!-- <div id="amazingaudioplayer-1" style="display:block;position:relative;width:100%;max-width:300px;height:164px;margin:0px auto 0px;">
							        <ul class="amazingaudioplayer-audios" style="display:none;">
							            <li data-artist="{{ $album->artist}}" data-title="{{ $song->judul }}" data-album="{{ $album->name}}" data-info="Track {{ $song->track}}" data-image="{{ asset('album/'.$album->name.'/'.$album->cover)}}" data-duration="189">
							                <div class="amazingaudioplayer-source" data-src="{{asset('album/'.$album->name.'/'.$song->filename)}}" data-type="audio/mpeg" ></div>
							            </li>
							        </ul>
							    </div> --
		                      </div>
		                      <div class="modal-footer">
		                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		                      </div>
		                    </div>
		                  </div>
		                </div>
              		<!-- end modal add -->
                    </td>
                  </tr>
                @endforeach
                </tbody>
                </table> 
              <audio></audio>

            </div>
        </div>
    </div>
@endsection

@section('js')
	<script src="{{ asset('audioplayerengine/jquery.js')}}"></script>
    <script src="{{ asset('audioplayerengine/amazingaudioplayer.js')}}"></script>
    <script src="{{ asset('audioplayerengine/initaudioplayer-1.js')}}"></script>
@endsection