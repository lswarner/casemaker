@extends('app')

@section('content')
<div class="container-fluid container-wide">
    <div class="main">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif


            <h2>Reset Password</h2>

            <p>
              If you've forgotten your password or are having trouble logging in to CaseMaker, you can request a password reset. Just enter the email
              associated with your CaseMaker account and we'll send you an email with instructions to reset your password.
            </p>


            <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <div class="col-md-12">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Your Email Address" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                      <button type="submit" class="btn btn-urc">
                        Send Password Reset Link
                    </button>
                  </div>
                </div>


            </form>

          </div>

        </div>
    </div>
</div>
@endsection
