@extends('app')

@section('content')
<div class="container-fluid container-wide">
  <div class="register-bg">


    <div class="row" style="margin-top: 40px; margin-bottom: 40px;">
        <div class="col-md-5">
          <h2>Your account is waiting for approval.</h2>

        </div>
    </div>

    <div class="row" style="margin-bottom:10%">
        <div class="col-md-5">
            <h3>
              Thank you for your interest in {{config('app.name')}}. Our team is reviewing your request. You will receive a response in a few days.
            </h3>
            <h3>
              Once your request has been approved, you will receive an email notification and can begin creating your new case study.
            </h3>
            <h3>
              We're excited to see what you have to share.
            </h3>
        </div>
    </div>

  </div>
</div>
@endsection
