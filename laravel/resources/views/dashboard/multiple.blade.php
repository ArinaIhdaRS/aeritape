@extends('_layout.dashboard')

@section('title','Add New')

@section('css')
 	<!-- <link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
  <link rel="stylesheet" href="{{ asset('lib/file-uploader/css/jquery.fileupload.css')}}">-->
    <link rel="stylesheet" href="{{ asset('public/lib/file-uploader/css/jquery.fileupload-ui.css')}}">
    <!--<noscript>
      <link rel="stylesheet" href="{{asset('lib/file-uploader/css/jquery.fileupload-noscript.css')}}">
    </noscript>
    <noscript>
      <link rel="stylesheet" href="{{asset('lib/file-uploader/css/jquery.fileupload-ui-noscript.css')}}">
    </noscript> -->
@endsection

@section('content')
	<h3><i class="fa fa-plus"></i> Add New</h3>
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
            <div class="alert alert-success">
              <h4><span><i class="fa fa-plus"></i></span> Now, Add This Album Tracks!</h4>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 mb">
        <div class="content-panel form-panel">
            <h5 class="mb"><i class="fa fa-book"></i> ALBUM</h5>
            <p> {{$album->album_ke}} {{$album->type}} <br>"<b>{{ $album->name }}</b>"</p>
            <p><small><i class="fa fa-user"></i> {{ $album->artist }}</small></p>
            <img src="{{ asset('public/album/'.$album->type.'/'.$album->cover)}}" width="100%" style="border:1px solid black; border-radius: 4px">
            <br><br>
            <!-- <button class="btn btn-xs btn-primary btn-block" width="100%" data-toggle="modal" data-target="#ModalAdd"><i class="fa fa-pencil"></i> Edit Album</button> -->
        </div>
        </div>
        <div class="col-lg-9">
            <div class="content-panel form-panel">
                <h4 class="mb"><i class="fa fa-music"></i> SONG LIST</h4>
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
                        <form action="{{ route('insertsongs', $album->id)}}" method="post" enctype="multipart/form-data">
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
                    <th>Duration</th>
                    <th>File</th>
                    <th>Listen</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($daftar_song as $song)
                  <tr>
                    <td>{{ $song->track}}</td>
                    <td>{{ $song->title}} @if ($song->mv == 'Yes')<span class="label label-default">MV</span> @endif</td>
                    <td>{{ $song->duration}}</td>
                    <td>{{ $song->mp3}}</td>
                    <td align="center" width="80px">
                        <audio controls="controls" style="width:78%;">
                          <source src="{{ asset('public/album/'.$album->type.'/'.$song->mp3)}}" type="audio/mpeg">
                        </audio>
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
	
	<script src="{{ asset('public/lib/jquery-ui-1.9.2.custom.min.js') }}"></script>
  <script src="{{ asset('public/lib/advanced-form-components.js') }}"></script>
  <!--script for this page-->
  
  <script src="{{ asset('public/lib/file-uploader/js/vendor/jquery.ui.widget.js')}}"></script>
  <!-- <script src="http://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
  <script src="http://blueimp.github.io/JavaScript-Load-Image/js/load-image.min.js"></script>
  <script src="http://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
  <script src="http://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script> -->
  <script src="{{ asset('public/lib/file-uploader/js/jquery.iframe-transport.js')}}"></script>
  <script src="{{ asset('public/lib/file-uploader/js/jquery.fileupload.js')}}"></script>
  <script src="{{ asset('public/lib/file-uploader/js/jquery.fileupload-process.js')}}"></script>
  <!-- The File Upload image preview & resize plugin -->
  <!-- <script src="{{ asset('lib/file-uploader/js/jquery.fileupload-image.js')}}"></script> -->
  <!-- The File Upload audio preview plugin -->
  <script src="{{ asset('public/lib/file-uploader/js/jquery.fileupload-audio.js')}}"></script>
  <!-- The File Upload video preview plugin -->
  <!-- <script src="{{ asset('lib/file-uploader/js/jquery.fileupload-video.js')}}"></script> -->
  <!-- The File Upload validation plugin -->
  <!-- <script src="{{ asset('lib/file-uploader/js/jquery.fileupload-validate.js')}}"></script> -->
  <!-- The File Upload user interface plugin -->
  <!-- <script src="{{ asset('lib/file-uploader/js/jquery.fileupload-ui.js')}}"></script> -->
  <!-- The main application script -->
  <script src="{{ asset('public/lib/file-uploader/js/main.js')}}"></script>
  <!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
  <!--[if (gte IE 8)&(lt IE 10)]>
    <script src="assets/file-uploader/js/cors/jquery.xdr-transport.js"></script>
    <![endif]-->
  <!-- The template to display files available for upload 
  <script id="template-upload" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
      <td>
        <span class="preview"></span>
      </td>
      <td>
        <p class="name">{%=file.name%}</p>
        <strong class="error text-danger"></strong>
      </td>
      <td>
        <p class="size">Processing...</p>
        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="progress-bar progress-bar-success" style="width:0%;"></div>
        </div>
      </td>
      <td>
        {% if (!i && !o.options.autoUpload) { %}
        <button class="btn btn-primary start" disabled>
                  <i class="glyphicon glyphicon-upload"></i>
                  <span>Start</span>
              </button> {% } %} {% if (!i) { %}
        <button class="btn btn-warning cancel">
                  <i class="glyphicon glyphicon-ban-circle"></i>
                  <span>Cancel</span>
              </button> {% } %}
      </td>
    </tr>
    {% } %}
  </script>
  <!-- The template to display files available for download --
  <script id="template-download" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
      <td>
        <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
      </td>
      <td>
        <p class="name">
          {% if (file.url) { %}
          <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl? 'data-gallery': ''%}>{%=file.name%}</a> {% } else { %}
          <span>{%=file.name%}</span> {% } %}
        </p>
        {% if (file.error) { %}
        <div><span class="label label-danger">Error</span> {%=file.error%}</div>
        {% } %}
      </td>
      <td>
        <span class="size">{%=o.formatFileSize(file.size)%}</span>
      </td>
      <td>
        {% if (file.deleteUrl) { %}
        <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}" {% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}' {% } %}>
              <i class="glyphicon glyphicon-trash"></i>
              <span>Delete</span>
              </button>
        <input type="checkbox" name="delete" value="1" class="toggle"> {% } else { %}
        <button class="btn btn-warning cancel">
                  <i class="glyphicon glyphicon-ban-circle"></i>
                  <span>Cancel</span>
              </button> {% } %}
      </td>
    </tr>
    {% } %}
  </script> -->
@endsection