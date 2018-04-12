@extends('app')

@section('content')

@include('casestudy.modals.delete')

<div class="container-fluid container-wide">
  <div class="main">


    <div class="row">
        <div class="col-md-12">
          <h2>Admin Dashboard</h2>
        </div>

    </div>

    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-6">
          <h3>Accounts Pending</h3>

          @foreach($pending_users as $u)

            @component('user.partials.preview', ['u'=>$u]) @endcomponent

          @endforeach

          <a class="btn btn-urc-gray" href="{{ route('users') }}">View All Accounts</a>
      </div>


      <div class="col-lg-4 col-md-4 col-sm-6">
        <h3>Submitted Case Studies</h3>

        @foreach($casestudies as $cs)

          @component('casestudy.partials.preview', ['cs'=>$cs]) @endcomponent

        @endforeach

        <a class="btn btn-urc-gray" href="{{ route('casestudy.index') }}">View Case Studies</a>

        {!! Form::open( ['action'=>['CaseStudyController@store'], 'method' => 'post', 'class'=>'form-horizontal']) !!}
          <button type="submit" class="btn btn-urc">Create Case Study</button>
        {!! Form::close() !!}
      </div>

      <div class="col-lg-4 col-md-4 col-sm-6">
          <h3>CaseMaker Resources</h3>
          <a class="btn btn-urc-info" href="{{ route('keyword.index') }}">Keywords</a>
          <a class="btn btn-urc-info" href="{{ route('method.index') }}">Methods</a>
          <a class="btn btn-urc-info" href="{{ route('audience.index') }}">Intended Audiences</a>
          <a class="btn btn-urc-info" href="{{ route('thematic.index') }}">Thematic Area</a>
      </div>

      <div class="col-lg-4 col-md-4 col-sm-6">
          <h3>Content Management</h3>
          <a class="btn btn-urc-accent1" href="{{ route('instructions') }}">Instructions</a>
          <a class="btn btn-urc-accent2" href="{{ route('style') }}">Colors & Style</a>
          <a class="btn btn-urc-accent3" href="{{ route('branding') }}">Branding</a>
      </div>
    </div>

  </div>
</div>
@endsection
