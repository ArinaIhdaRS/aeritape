@extends('_layout.dashboard')

@section('title', 'Songs')

@section('css')
  	<link href="{{asset('public/css/dashboard/table-responsive.css')}}" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('lib/bootstrap-fileupload/bootstrap-fileupload.css')}}" />
  	<link rel="stylesheet" type="text/css" href="{{ asset('lib/bootstrap-datepicker/css/datepicker.css')}}" /> -->
@endsection

@section('content')
	<h3><i class="fa fa-music"></i> Songs</h3>
    <hr>
    <div class="row mt">
        <div class="col-lg-12">
        @if (\Session::has('success'))
            <div class="alert alert-success">
              <p><span><i class="fa fa-check-circle-o"></i></span> {{ \Session::get('success') }}</p>
            </div>
        @endif
        </div>
          <div class="col-lg-12">
            <div class="content-panel">
              <h4><i class="fa fa-list"></i> All Songs</h4>
              <br>
              <section id="unseen">
                <table class="table table-bordered table-striped table-condensed">
                  <thead>	
					          <tr>
                      <th>No</th>
                      <th>Listen</th>
                      <th>Song Title</th>
                      <th>Track</th>
                      <th>Duration</th>
                      <th>Album</th>
                      <th>Artist</th>
                      <th>Year</th>
                      <th>File</th>
                      <th>Song Actions</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach ($daftar_song as $key => $song)
                  	<tr>
                  		<td>{{++$key}}</td>
                      <td align="center" width="80px">
                        <audio controls="controls" style="width:78%;">
                          <source src="{{ asset('public/album/'.$song->albums->type.'/'.$song->mp3)}}" type="audio/mpeg">
                        </audio>
                      </td>
                  		<td>{{$song->title}} @if ($song->mv == 'Yes')<span class="label label-default">MV</span> @endif</td>
                  		<td>{{$song->track}}</td>
                  		<td>{{$song->duration}}</td>
                  		<td>{{$song->albums->album_ke}} {{$song->albums->type}} {{$song->albums->name}}</td>
						          <td>{{$song->albums->artist}}</td>
                  		<td>
                  			@php 
                  				$date = DateTime::createFromFormat("Y-m-d", $song->albums->release);
                  				echo $date->format("Y");
                  			@endphp
                  		</td>
                  		<td>{{$song->mp3}}</td>
                  		<td align="center">
                  			<button class="btn btn-primary btn-md"data-toggle="modal" data-target="#ModalEdit{{$song->id}}"><i class="fa fa-pencil"></i></button>
                  			<!-- modal edit -->
                          <div class="modal fade" id="ModalEdit{{$song->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title" id="myModalLabel">Edit This Song</h4>
                                </div>
                                <div class="modal-body">
                                  <form action="{{ route('songedit', $song->id)}}" method="post" enctype="multipart/form-data">
                                  {{ csrf_field() }}
                                  {{ method_field('PUT') }}
                                  <div class="form-group">
                                    <label class="control-label">Track: </label>
                                    <input type="text" class="form-control" name="track" value="{{ $song->track}}" required autofocus>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label">Title: </label>
                                    <input type="text" class="form-control" name="title" value="{{ $song->title }}" required autofocus>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label">Length (min): </label>
                                    <input type="text" class="form-control" name="duration" value="{{ $song->duration}}" required autofocus>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label">File: </label>
                                    <input type="file" accept=".mp3" name="mp3" value="{{ $song->mp3}}">
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label">Music Video: </label><span>
                                    <label>
                                      <input type="radio" name="mv" value="Yes" onclick="javascript:document.getElementById('titleditt').style.display='block';" checked="checked" />
                                      Yes
                                    </label>
                                    <label>
                                      <input type="radio" name="mv" value="No" onclick="javascript:document.getElementById('titleditt').style.display='none';" />
                                      No
                                    </label></span>
                                  </div>
                                  <div id="titleditt" hide="hide">
                                    <div class="form-group">
                                      <input type="text" class="form-control" placeholder="url" name="mv_url" value="{{$song->mv_url}}">
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
                        <!-- end modal edit -->
                  			<button class="btn btn-danger btn-md"data-toggle="modal" data-target="#ModalDelete{{$song->id}}"><i class="fa fa-trash-o"></i></button>
                  		</td>
                      
                  	</tr>
                  	@endforeach
                  </tbody>
                </table>
              </section>
              {{ $daftar_song->links() }}
            </div>
          </div>
    </div>
    <!-- <script>
    	$(function(active) {
  			$('#song').addClass('active');
		});
    </script> -->
@endsection