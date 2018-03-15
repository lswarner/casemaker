@extends('app')

@include('casestudy.modals.delete')

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
          <h3>Accounts Waiting For Approval</h3>

          @foreach($pending_users as $u)

            @component('user.partials.preview', ['u'=>$u]) @endcomponent

          @endforeach

          <a class="btn btn-urc-gray" href="{{ route('users') }}">View All Accounts</a>
      </div>


      <div class="col-md-4">
        <h3>Submitted Case Studies</h3>

        @foreach($casestudies as $cs)

          @component('casestudy.partials.preview', ['cs'=>$cs]) @endcomponent

        @endforeach

        <a class="btn btn-urc-gray" href="{{ route('casestudy.index') }}">View Case Studies</a>

        {!! Form::open( ['action'=>['CaseStudyController@store'], 'method' => 'post', 'class'=>'form-horizontal']) !!}
          <button type="submit" class="btn btn-urc">Create Case Study</button>
        {!! Form::close() !!}
      </div>

      <div class="col-md-4">
          <h3>Manage Resources</h3>
          <a class="btn btn-urc noon" href="{{ route('keyword.index') }}">Keywords</a>
          <a class="btn btn-urc noon" href="{{ route('method.index') }}">Methods</a>
          <a class="btn btn-urc noon" href="{{ route('audience.index') }}">Intended Audiences</a>
          <a class="btn btn-urc noon" href="{{ route('thematic.index') }}">Thematic Area</a>
          <a class="btn btn-urc sunset" href="{{ route('instructions') }}">CaseMaker Instructions</a>
      </div>
    </div>

  </div>
</div>
@endsection
