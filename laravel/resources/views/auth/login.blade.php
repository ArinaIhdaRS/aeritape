@extends('layouts.app')

@section('content')
<div id="login-page">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="container">
      <form class="form-login" action="{{ route('login') }}" method="POST">
      {{ csrf_field() }}
        <h2 class="form-login-heading">AERITAPE LOGIN</h2>
        <div class="login-wrap">
          <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            <input type="text" class="form-control" placeholder="Username" name="username" autofocus>
            @if ($errors->has('username'))
                <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
            @endif    
          </div>
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input type="password" class="form-control" name="password" placeholder="Password">
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif    
          </div>
          <div class="form-group">
            <a class="pull-right" data-toggle="modal" href="#myModal"> Forgot Password?</a>
            <br>
          </div>
          
          <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> Login</button>
          <hr>
          
          <div class="registration">
            Don't have an account yet?<br/>
            <a class="" href="{{ route('register') }}">
                Register  
            </a>
          </div>

        </div>
        </form>
        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <form action="{{ route('password.email') }}" method="POST">
            {{ csrf_field() }}
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Forgot Password ?</h4>
              </div>
              <div class="modal-body">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <p>Enter your e-mail address below to reset your password.</p>
                
                    <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-theme" type="submit">Submit</button>
              </div>
            </div>
            </form>
          </div>
        </div>
        <!-- modal -->
    </div>
  </div>

@endsection
