@extends('layouts.app')

@section('content')
<div class="container">
  <div class="register-bg">
    <div class="row">
        <div class="col-md-6" style="border-right:solid 2px white">
          <div class="col-md-10">
              <h2>Request Access</h2>
          </div>

          <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
              {{ csrf_field() }}

              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                <div class="col-md-10">
                  <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="Full Name">

                  @if ($errors->has('name'))
                      <span class="help-block">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif
                </div>

              </div>

              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="col-md-10">
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Email">

                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="col-md-10">
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

              </div>

              <div class="form-group">
                <div class="col-md-10">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                </div>
              </div>

              <div class="form-group{{ $errors->has('affiliation') ? ' has-error' : '' }}">
                <div class="col-md-10">
                  <input id="affiliation" type="text" class="form-control" name="affiliation" value="{{ old('affiliation') }}" placeholder="What is your affiliation?" required>

                  @if ($errors->has('affiliation'))
                      <span class="help-block">
                          <strong>{{ $errors->first('affiliation') }}</strong>
                      </span>
                  @endif
                </div>

              </div>

              <div class="form-group{{ $errors->has('introduction') ? ' has-error' : '' }}">
                <div class="col-md-10">
                  <textarea id="introduction" class="form-control" name="introduction" placeholder="What would you like to write a case study about?">{{ old('introduction') }}</textarea>

                  @if ($errors->has('introduction'))
                      <span class="help-block">
                          <strong>{{ $errors->first('introduction') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-10">
                  <button type="submit" class="btn btn-urc">
                      Submit
                  </button>
                </div>
              </div>
          </form>

        </div>





        <div class="col-md-6">

          <div class="col-md-10 col-md-offset-2">
            <h2>Log In</h2>
          </div>

          <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
              {{ csrf_field() }}

              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                  <div class="col-md-10 col-md-offset-2">
                      <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>

                      @if ($errors->has('email'))
                          <span class="help-block">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <div class="col-md-10 col-md-offset-2">
                      <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                      @if ($errors->has('password'))
                          <span class="help-block">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group">
                <div class="col-md-10 col-md-offset-2">
                      <div class="checkbox">
                          <label>
                              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                          </label>
                      </div>
                  </div>
              </div>

              <div class="form-group">
                  <div class="col-md-10 col-md-offset-2">
                      <button type="submit" class="btn btn-urc">
                          Log In
                      </button>

                      <a class="btn btn-link" href="{{ route('password.request') }}">
                          Forgot Your Password?
                      </a>
                  </div>
              </div>
          </form>

        </div>
    </div>
  </div>
</div>
@endsection
