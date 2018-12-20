@extends('_layout.dashboard')

@section('title', 'Albums')

@section('css')
  	<link href="{{asset('public/css/dashboard/table-responsive.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/lib/bootstrap-fileupload/bootstrap-fileupload.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('public/lib/bootstrap-datepicker/css/datepicker.css')}}" />
@endsection

@section('content')
	<h3><i class="fa fa-book"></i> Albums</h3>
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
              <h4><i class="fa fa-list"></i> Album List</h4>
              <br>
              <section id="unseen">
                <table class="table table-bordered table-striped table-condensed">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Album Name</th>
                      <th>Cont. Artist</th>
                      <th>Album Type</th>
                      <th>Release Date</th>
                      <th>Album Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($daftar_album as $key => $album)
                    <tr>
                      <td>{{++$key}}</td>
                      <td>{{ $album->name}}</td>
                      <td>{{ $album->artist}}</td>
                      <td>{{ $album->type}}</td>
                      <td>{{ $album->release}}</td>
                      <td>
                      	<a href="{{ route('tracks', $album->id)}}" class="btn btn-success btn-xs"><i class="fa fa-list"></i> Detail</a>
                        <a href="{{ route('albumedit', $album->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                      	<!-- <button class="btn btn-primary btn-xs"data-toggle="modal" data-target="#ModalEdit"><i class="fa fa-pencil"></i> Edit</button> -->
                        <button class="btn btn-danger btn-xs"data-toggle="modal" data-target="#ModalDelete{{$album->id}}"><i class="fa fa-trash-o"></i> Delete</button>
                      <!-- modal delete -->
                        <div class="modal fade" id="ModalDelete{{$album->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <form class="form-horizontal style-form" action="{{ route('albumdelete', $album->id)}}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Delete This Album</h4>
                              </div>
                              <div class="modal-body">
                                <div class="alert alert-danger">
                                  <h4><i class="fa fa-warning"></i> Note!</h4>
                                  <p>Delete Album will delete all tracks.</p>
                                </div>
                                <h4>Continue delete this Album?</h4>
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
              </section>
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