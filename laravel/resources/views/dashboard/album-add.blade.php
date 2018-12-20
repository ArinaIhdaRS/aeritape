@extends('_layout.dashboard')

@section('title','Add New')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('public/lib/bootstrap-fileupload/bootstrap-fileupload.css')}}" />
 	<link rel="stylesheet" type="text/css" href="{{ asset('public/lib/bootstrap-datepicker/css/datepicker.css')}}" />
 	<link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
@endsection

@section('content')
	<h3><i class="fa fa-plus"></i> Add New</h3>
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
            <div class="form-panel">
                <h4 class="mb"><i class="fa fa-book"></i> New Album</h4>
                <form class="form-horizontal style-form" method="post" action="{{route('insertalbum')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Album Name</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="album_ke" value="{{ old('album_ke') }}" placeholder="ex: 1st" required autofocus>
                      </div>
                      <div class="col-sm-2">
                        <select class="form-control" name="type">
                          <option>Album Type</option>
                          <option value="Full Album">Full Album</option>
                          <option value="Mini Album">Mini Album</option>
                          <option value="Repackage Album">Repackage Album</option>
                          <option value="Repackage Album">Winter Album</option>
                          <option value="Featured">Featured</option>
                          <option value="Single">Single</option>
                          <option value="OST">OST</option>
                        </select>
                      </div>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Contributing Artist</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="artist" value="EXO {{ old('artist') }}" required autofocus>
                        <p class="help-block">Default EXO, add another by strip (-) as example: <i>EXO - Chen (첸)</i></p>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Album Release</label>
                      <div class="col-sm-3">
                        <input type="date" class="form-control" name="release" value="{{ old('release') }}" required autofocus>
                      </div>
                  </div>
                  <div class="form-group last">
                    <label class="control-label col-md-2">Album Cover</label>
                    <div class="col-md-9">
                      <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                          <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                        <div>
                          <span class="btn-sm btn-theme02 btn-file">
                            <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                          <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                          <input type="file" class="default" name="cover" value="{{ old('cover') }}" accept="images/*" required/>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label"></label>
                      <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary btn-lg">Save</button>
                      </div>
                  </div>
                </form>
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