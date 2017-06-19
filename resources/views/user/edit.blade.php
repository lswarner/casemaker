@extends('app')

@section('content')
<div class="container">

    <div class="row">

          <div class="col-md-10">
              <h2>Edit Account</h2>
          </div>

          {!! Form::model( $user, ['action'=>['UserController@update', $user->id], 'method' => 'patch', 'class'=>'form-horizontal']) !!}



              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                <div class="col-md-10">
                  <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus placeholder="Full Name">


                  @if ($errors->has('name'))
                      <span class="help-block">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif
                </div>

              </div>

              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="col-md-10">
                  <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required placeholder="Email">

                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                </div>
              </div>


              <div class="form-group{{ $errors->has('affiliation') ? ' has-error' : '' }}">
                <div class="col-md-10">
                  <input id="affiliation" type="text" class="form-control" name="affiliation" value="{{ $user->affiliation }}" placeholder="What is your affiliation?" required>

                  @if ($errors->has('affiliation'))
                      <span class="help-block">
                          <strong>{{ $errors->first('affiliation') }}</strong>
                      </span>
                  @endif
                </div>

              </div>

              <div class="form-group{{ $errors->has('introduction') ? ' has-error' : '' }}">
                <div class="col-md-10">
                  <textarea id="introduction" class="form-control" name="introduction" placeholder="What would you like to write a case study about?">{{ $user->introduction }}</textarea>

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
                      Update
                  </button>
                </div>
              </div>

          {!! Form::close() !!}


    </div>



    <div class="row">

          <div class="col-md-10">
              <h2>Change Password</h2>
          </div>

          {!! Form::model( $user, ['action'=>['UserController@update_password', $user], 'method' => 'patch', 'class'=>'form-horizontal']) !!}
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

              <div class="form-group">
                <div class="col-md-10">
                  <button type="submit" class="btn btn-urc">
                      Change Password
                  </button>
                </div>
              </div>

          {!! Form::close() !!}

  </div>

</div>
@endsection
