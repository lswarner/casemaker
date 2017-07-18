@extends('casestudy.template')

@section('scripts')
  <script>
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();
    });
  </script>

  @include('scripts.autosave')

@endsection

@section('casestudy-page')
    <h1 class="review-header">Review Case Study</h1>


    @include('casestudy.summary')


    <div class="row">

          {!! Form::model( $casestudy, ['action'=>['CaseStudyController@submit', $casestudy->id], 'method' => 'patch', 'class'=>'form-horizontal']) !!}

          <div class="form-group">
            <div class="col-md-8 col-md-offset-4 col-lg-6 col-lg-offset-6">
              <input type="submit" class="btn btn-urc-alt" value="Submit Case Study" />
            </div>
          </div>

          {!! Form::close() !!}
    </div>


@endsection
