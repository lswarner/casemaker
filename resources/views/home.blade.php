@extends('app')

@section('content')
<div class="container-fluid container-wide">
  <div class="main">


    <div class="row">
        <div class="col-md-8">
          <h2>My Case Studies</h2>
        </div>
        <div class="col-md-4">
          {!! Form::open( ['action'=>['CaseStudyController@store'], 'method' => 'post', 'class'=>'form-horizontal']) !!}
            <button type="submit" class="btn btn-urc">Create New Case Study</button>
          {!! Form::close() !!}
        </div>
    </div>

    @foreach($casestudies as $cs)
    <div class="row">
      <div class="col-md-3">
        <a href="{{ route('introduction', $cs) }}"> {{ $cs->title ?: 'New CaseStudy' }}</a>
      </div>
      <div class="col-md-6">
        {!! $cs->intro_context !!}
      </div>
      <div class="col-md-2">
        In Progress
      </div>
    </div>
    @endforeach

  </div>
</div>
@endsection
