@extends('app')

@section('css')
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection

@section('scripts')
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endsection


@section('content')
<div class="container-fluid container-wide">
  <div class="main">

  @if($request_access)

    <div class="row">
      <div class="panel panel-attention">
        <div class="panel-body">
          {!! Form:: model($user, ['action'=>['UserController@update_access', $user->id], 'method' => 'patch', 'class'=>'form-horizontal']) !!}
            <div class="col-md-1">
              <i class="fa fa-exclamation-circle fa-4x text-dawn" aria-hidden="true"></i>
            </div>
            <div class="col-md-5">
              <h4 class="text-dawn">This person has requested access to the CaseMaker and is waiting for a response.</h4>
            </div>
            <div class="col-md-3">
              <button type="submit" name="action" id="action" value="approve" class="btn btn-urc">
                  Approve Access
              </button>
            </div>
            <div class="col-md-3">
              <button type="submit" name="action" id="action" value="deny" class="btn btn-urc-danger">
                  Deny Access
              </button>
            </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>

  @endif

    <div class="row">
      <div class="col-md-6">
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


              @if($admin_tools)

              <div class="form-group">
                <div class="col-md-10">

                    <label>
                      <input name="is_admin" {{ $user->is_admin ? "checked" : "" }} data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="info" data-style="android" type="checkbox">

                      &nbsp;&nbsp;&nbsp;Is this user an administrator?
            			  </label>

                </div>
              </div>

              @endif

              <div class="form-group">
                <div class="col-md-10">
                  <button type="submit" class="btn btn-primary">
                      Update
                  </button>
                </div>
              </div>

          {!! Form::close() !!}

        </div>

        <div class="col-md-6">

          <div class="col-md-10 col-md-offset-2">
              <h2>Change Password</h2>
          </div>

          {!! Form::model( $user, ['action'=>['UserController@update_password', $user], 'method' => 'patch', 'class'=>'form-horizontal']) !!}
              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="col-md-10 col-md-offset-2">
                    <input id="password" type="password" class="form-control" name="password" placeholder="Your New Password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

              </div>

              <div class="form-group">
                <div class="col-md-10 col-md-offset-2">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm New Password" required>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-10 col-md-offset-2">
                  <button type="submit" class="btn btn-urc">
                      Change Password
                  </button>
                </div>
              </div>

          {!! Form::close() !!}



          @if($admin_tools)

            <div class="col-md-10 col-md-offset-2">
                <h2>Delete User Account</h2>
            </div>

            <div class="form-group">
              <div class="col-md-10 col-md-offset-2">

                <button type="button" class="btn btn-urc-danger" data-toggle="modal" data-target="#delete-modal">Delete User Account</button>

              </div>
            </div>


          @endif

        </div>
      </div>
   </div>
</div>


@include('user.modals.delete')

@endsection
