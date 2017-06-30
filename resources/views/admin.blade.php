@extends('app')

@section('content')
<div class="container-fluid container-wide">
  <div class="main">


    <div class="row">
        <div class="col-md-12">
          <h2>Admin Dashboard</h2>
        </div>

    </div>

    <div class="row">
      <div class="col-md-4">
          <h3>Accounts</h3>

          <h4>Accounts Waiting for Approval</h4>
          @foreach($pending_users as $u)
            <a class="btn btn-urc-account-pending" href="{{ route('user.edit', $u) }}">
                <div class="account-name">{{ $u->name }}</div>

                <span class="subtext">{{ $u->affiliation }}</span>

            </a>

          @endforeach

          <a class="btn btn-urc-gray" href="{{ route('users') }}">View All Accounts</a>
      </div>


      <div class="col-md-4">
        <h3>Case Studies</h3>
        <a class="btn btn-urc-gray" href="{{ route('casestudy.index') }}">View Case Studies</a>
        {!! Form::open( ['action'=>['CaseStudyController@store'], 'method' => 'post', 'class'=>'form-horizontal']) !!}
          <button type="submit" class="btn btn-urc">Create Case Study</button>
        {!! Form::close() !!}
      </div>

      <div class="col-md-4">
          <h3>Manage Resources</h3>
          <a class="btn btn-urc-alt" href="{{ route('keyword.index') }}">Keywords</a>
          <a class="btn btn-urc-alt" href="{{ route('method.index') }}">Methods</a>
      </div>
    </div>

  </div>
</div>
@endsection
