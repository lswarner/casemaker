@extends('app')

@section('content')
<div class="container-fluid container-wide">
  <div class="main">


    <div class="row">
        <div class="col-md-4">
          <h2>My Case Studies</h2>
        </div>

        @include('casestudy.partials.color-key')



    </div>

    <div class="row">
      <div class="col-md-5 col-md-offset-7 col-lg-4 col-lg-offset-8">
        {!! Form::open( ['action'=>['CaseStudyController@store'], 'method' => 'post', 'class'=>'form-horizontal']) !!}
          <button type="submit" class="btn btn-urc">Create Case Study</button>
        {!! Form::close() !!}
      </div>
    </div>

    <div class="row">
      @foreach($casestudies as $cs)


        <div class="col-md-8 col-lg-6">
          @component('casestudy.partials.preview', ['cs'=>$cs]) @endcomponent
        </div>

      @endforeach

    </div>




  </div>
</div>
@endsection
