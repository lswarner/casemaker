@extends('app')

@section('content')
<div class="container-fluid container-wide">
  <div class="main">


    <div class="row">
        <div class="col-md-7 col-lg-8">
          <h2>My Case Studies</h2>
        </div>
        <div class="col-md-5 col-lg-4">
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
