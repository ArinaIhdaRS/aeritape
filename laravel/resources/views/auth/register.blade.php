@extends('layouts.app')

@section('content')
    <div class="container">
      <form class="form-login" action="{{ route('register') }}" method="POST">
      {{ csrf_field() }}
        <h2 class="form-login-heading">AERITAPE REGISTER</h2>
        <div class="login-wrap">
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}" autofocus>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif    
          </div>
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" autofocus>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif    
          </div>
          <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            <input type="text" class="form-control" placeholder="Username" name="username" value="{{ old('username') }}" autofocus>
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
                <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
          </div>

        <hr>

          <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> Register</button>          
        </div>
        </form>
    </div>

@endsection
