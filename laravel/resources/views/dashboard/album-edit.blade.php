@extends('_layout.dashboard')

@section('title','Edit Album')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('public/lib/bootstrap-fileupload/bootstrap-fileupload.css')}}" />
 	<link rel="stylesheet" type="text/css" href="{{ asset('public/lib/bootstrap-datepicker/css/datepicker.css')}}" />
 	<link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
@endsection

@section('content')
	<h3><i class="fa fa-book"></i> Albums</h3>
    <hr>
    <div class="row mt">
        <div class="col-lg-12">
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul> @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach</ul>
        </div><br />
        @endif
        <div class="col-lg-3 col-md-3 col-sm-3 mb">
          <div class="content-panel form-panel">
              <h5 class="mb"><i class="fa fa-book"></i> ALBUM</h5>
              <p>{{$album->album_ke}} {{$album->type}} "<b>{{ $album->name }}</b>"</p>
              <p><small><i class="fa fa-user"></i> {{ $album->artist }}</small></p>
              <img src="{{ asset('public/album/'.$album->type.'/'.$album->cover)}}" width="100%">
              <br><br>
              <!-- <button class="btn btn-xs btn-primary btn-block" width="100%" data-toggle="modal" data-target="#ModalAdd"><i class="fa fa-pencil"></i> Edit Album</button> -->
              <button class="btn btn-primary btn-xs btn-block" width="100%" data-toggle="modal" data-target="#ModalEditAlbum{{$album->id}}"><i class="fa fa-pencil"></i> Edit Album</button>
              <!-- modal edit -->
                        <div class="modal fade" id="ModalEditAlbum{{$album->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Edit This Album</h4>
                              </div>
                              <div class="modal-body">
                                <form action="{{ route('editalbum', $album->id )}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="form-group">
                                  <label class="control-label">Album Name:</label>
                                    <div class="col-sm-12">
                                      <div class="col-sm-2">
                                        <input type="text" class="form-control" name="album_ke" value="{{ $album->album_ke }}" placeholder="ex: 1st" required autofocus>    
                                      </div>
                                      <div class="col-sm-3">
                                        <select class="form-control" name="type">
                                          <option value="{{$album->type}}">Album Type</option>
                                          <option value="Full Album">Full Album</option>
                                          <option value="Mini Album">Mini Album</option>
                                          <option value="Repackage Album">Repackage Album</option>
                                          <option value="Winter Album">Winter Album</option>
                                          <option value="Featured">Featured</option>
                                          <option value="Single">Single</option>
                                          <option value="OST">OST</option>
                                        </select>  
                                      </div>
                                      <div class="col-sm-7">
                                        <input type="text" class="form-control" name="name" value="{{ $album->name }}" required autofocus>  
                                      </div>
                                      <hr>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label">Contributing Artist: </label>
                                  <input type="text" class="form-control" name="artist" value="{{ $album->artist }}" required autofocus>
                                </div>
                                <div class="form-group">
                                  <label class="control-label">Album Release: </label>
                                  <input type="date" class="form-control" name="release" value="{{ $album->release }}" required autofocus>
                                </div>

                                <div class="form-group">
                                  <label class="control-label">Album Cover: </label>
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                      <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                        <img src="{{ asset('public/album/'.$album->type.'/'.$album->cover) }}" alt="" />
                                      </div>
                                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                      <div>
                                        <span class="btn-sm btn-theme02 btn-file">
                                        <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                        <input type="file" class="default" name="cover" value="{{ $album->cover }}" accept="images/*"/>
                                        </span>
                                      </div>
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
          </div>
        </div>
        <div class="col-lg-9">
            <div class="content-panel form-panel">
                <h4 class="mb"><i class="fa fa-music"></i> EDIT SONG LIST</h4>
                <button class="btn btn-success" data-toggle="modal" data-target="#ModalAdd"><i class="fa fa-plus"></i> Add File</button>
              <!-- modal add -->
                <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Add New Song</h4>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('inserttrack', $album->id)}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <label class="control-label">Title: </label>
                          <input type="text" class="form-control" name="title" required autofocus>
                        </div>
                        <div class="form-group">
                          <label class="control-label">Track: </label>
                          <input type="text" class="form-control" name="track" required autofocus>
                        </div>
                        <div class="form-group">
                          <label class="control-label">Length (min): </label>
                          <input type="text" class="form-control" name="duration" required autofocus>
                        </div>
                        <div class="form-group">
                          <label class="control-label">File: </label>
                          <input type="file" accept=".mp3" name="mp3" required>
                        </div>
                        <div class="form-group">
                          <label class="control-label">Music Video: </label><span>
                          <label>
                            <input type="radio" name="mv" value="Yes" onclick="javascript:document.getElementById('titled').style.display='block';" checked="checked" />
                            Yes
                          </label>
                          <label>
                            <input type="radio" name="mv" value="No" onclick="javascript:document.getElementById('titled').style.display='none';" />
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
                <a href="{{route('albums')}}" class="btn btn-primary"><i class="fa fa-check"></i> All Done</a>
                <br><br>
                <table class="table">
                  <thead>
                    <tr>
                      <th>Track</th>
                      <th>Title</th>
                      <th>Length</th>
                      <th>Source</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($track_list as $song)
                    <tr>
                      <td>{{ $song->track}}</td>
                      <td>{{ $song->title}} @if ($song->mv == 'Yes')<span class="label label-default">MV</span> @endif</td>
                      <td>{{ $song->duration}}</td>
                      <td>{{ $song->mp3}}</td>
                      <td width="10%">
                        <button class="btn btn-primary btn-xs"data-toggle="modal" data-target="#ModalEdit{{ $song->id }}"><i class="fa fa-pencil"></i></button>
                        <!-- modal edit -->
                          <div class="modal fade" id="ModalEdit{{ $song->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title" id="myModalLabel">Edit This Song</h4>
                                </div>
                                <div class="modal-body">
                                  <form action="{{ route('trackeditsave', ['id' => $song->id])}}" method="post" enctype="multipart/form-data">
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
                                      <input type="text" class="form-control" placeholder="url" name="mv_url" value="{{ $song->mv_url}}">
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
                        <button class="btn btn-danger btn-xs"data-toggle="modal" data-target="#ModalDelete{{$song->id}}"><i class="fa fa-trash-o"></i></button>
                        <!-- modal delete -->
                        <div class="modal fade" id="ModalDelete{{$song->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <form class="form-horizontal style-form" action="{{ route('trackdelete', $song->id)}}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Delete This Song</h4>
                              </div>
                              <div class="modal-body">
                                <div class="alert alert-danger">
                                  <h4><i class="fa fa-warning"></i> Note!</h4>
                                  <p>Deleting this Track.</p>
                                </div>
                                <h4>Continue delete this Track?</h4>
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Yes</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                              </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <!-- end modal delete -->
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table> 
            </div>
        </div>
    </div>
@endsection

@section('js')
	<script type="text/javascript" src="{{ asset('public/lib/bootstrap-fileupload/bootstrap-fileupload.js') }}"></script>
  <script type="text/javascript" src="{{ asset('public/lib/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
	<script src="{{ asset('public/lib/jquery-ui-1.9.2.custom.min.js') }}"></script>
  <script src="{{ asset('public/lib/advanced-form-components.js') }}"></script>
@endsection