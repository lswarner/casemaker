@extends('app')

@section('css')
  <!-- include summernote css/js-->
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
  <link href="{{ asset('css/casestudy-style.css') }}" rel="stylesheet">
@endsection

@section('scripts')

    @include('scripts.summernote-lite', ['boxes' => [
        ['name'=>'intro0', 'height'=>'300px'],
        ['name'=>'intro1', 'height'=>'200px'],
        ['name'=>'introh1', 'height'=>'40px'],
        ['name'=>'intro2', 'height'=>'200px'],
        ['name'=>'introh2', 'height'=>'40px'],

        ['name'=>'method0', 'height'=>'300px'],
        ['name'=>'method1', 'height'=>'200px'],
        ['name'=>'methodh1', 'height'=>'40px'],
        ['name'=>'method2', 'height'=>'200px'],
        ['name'=>'methodh2', 'height'=>'40px'],

        ['name'=>'results0', 'height'=>'300px'],
        ['name'=>'results1', 'height'=>'200px'],
        ['name'=>'resultsh1', 'height'=>'40px'],

        ['name'=>'implications0', 'height'=>'300px'],
        ['name'=>'implications1', 'height'=>'200px'],
        ['name'=>'implicationsh1', 'height'=>'40px'],
        ['name'=>'implications2', 'height'=>'200px'],
        ['name'=>'implicationsh2', 'height'=>'40px'],
       ] ] )
@endsection

@section('content')
<div class="container-fluid container-wide">
  <div class="main">

    <div class="row">
      <div class="col-md-12">
        <h2>Update CaseMaker Instructions</h2>


{{ print_r( $instructions) }}


        {!! Form::model($instructions, ['action'=>['InstructionsController@update'], 'method' => 'patch', 'class'=>'form-horizontal']) !!}
        <!-- start Introduction section -->
          <div class="review-section well shadow-depth-3">
            <div class="row">
              <div class="col-md-4">
                  <a class="section-header" data-toggle="collapse" href="#introduction" aria-expanded="false" aria-controls="introduction"><h2 class="section-header">Introduction</h2></a>
              </div>
              <div class="col-md-8">
                <a class="pull-right" data-toggle="collapse" href="#introduction" aria-expanded="false" aria-controls="introduction"><i class="fa fa-caret-down fa-2x"></i></a>
              </div>

              <div>&nbsp;</div>

              <div class="col-md-10 col-md-offset-1 collapse" id="introduction">

                <div class="form-group">

                  {!! Form::textarea( 'intro0' , null, ['class'=>'form-control', 'id'=>'intro0']) !!}
                  {!! Form::textarea( 'intro1' , null, ['class'=>'form-control', 'id'=>'intro1']) !!}
                  {!! Form::textarea( 'introh1' , null, ['class'=>'form-control', 'id'=>'introh1']) !!}
                  {!! Form::textarea( 'intro2' , null, ['class'=>'form-control', 'id'=>'intro2']) !!}
                  {!! Form::textarea( 'introh2' , null, ['class'=>'form-control', 'id'=>'introh2']) !!}

                </div>
              </div>
            </div>
          </div> <!-- end Introduction section -->



          <!-- start Methodology section -->
          <div class="review-section well shadow-depth-3">
            <div class="row">
              <div class="col-md-4">
                  <a class="section-header" data-toggle="collapse" href="#method" aria-expanded="false" aria-controls="method"><h2 class="section-header">Method</h2></a>
              </div>
              <div class="col-md-8">
                <a class="pull-right" data-toggle="collapse" href="#method" aria-expanded="false" aria-controls="method"><i class="fa fa-caret-down fa-2x"></i></a>
              </div>

              <div class="col-xs-12 collapse" id="method">

                <div class="form-group">

                  {!! Form::textarea( 'method0' , null, ['class'=>'form-control', 'id'=>'method0']) !!}
                  {!! Form::textarea( 'method1' , null, ['class'=>'form-control', 'id'=>'method1']) !!}
                  {!! Form::textarea( 'methodh1' , null, ['class'=>'form-control', 'id'=>'methodh1']) !!}
                  {!! Form::textarea( 'method2' , null, ['class'=>'form-control', 'id'=>'method2']) !!}
                  {!! Form::textarea( 'methodh2' , null, ['class'=>'form-control', 'id'=>'methodh2']) !!}

                </div>
              </div>
            </div>
          </div> <!-- end Methodology section -->



          <!-- start Results section -->
          <div class="review-section well shadow-depth-3">
            <div class="row">
              <div class="col-md-4">
                  <a class="section-header" data-toggle="collapse" href="#results" aria-expanded="false" aria-controls="results"><h2 class="section-header">Results</h2></a>
              </div>
              <div class="col-md-8">
                <a class="pull-right" data-toggle="collapse" href="#results" aria-expanded="false" aria-controls="results"><i class="fa fa-caret-down fa-2x"></i></a>
              </div>

              <div class="col-xs-12 collapse" id="results">

                <div class="form-group">

                  {!! Form::textarea( 'results0' , null, ['class'=>'form-control', 'id'=>'results0']) !!}
                  {!! Form::textarea( 'results1' , null, ['class'=>'form-control', 'id'=>'results1']) !!}
                  {!! Form::textarea( 'resultsh1' , null, ['class'=>'form-control', 'id'=>'resultsh1']) !!}

                </div>
              </div>
            </div>
          </div> <!-- end Results section -->


          <!-- start Implications section -->
          <div class="review-section well shadow-depth-3">
            <div class="row">
              <div class="col-md-4">
                  <a class="section-header" data-toggle="collapse" href="#implications" aria-expanded="false" aria-controls="implications"><h2 class="section-header">Implications</h2></a>
              </div>
              <div class="col-md-8">
                <a class="pull-right" data-toggle="collapse" href="#implications" aria-expanded="false" aria-controls="implications"><i class="fa fa-caret-down fa-2x"></i></a>
              </div>

              <div class="col-xs-12 collapse" id="implications">

                <div class="form-group">

                  {!! Form::textarea( 'implications0' , null, ['class'=>'form-control', 'id'=>'implications0']) !!}
                  {!! Form::textarea( 'implications1' , null, ['class'=>'form-control', 'id'=>'implications1']) !!}
                  {!! Form::textarea( 'implicationsh1' , null, ['class'=>'form-control', 'id'=>'implicationsh1']) !!}
                  {!! Form::textarea( 'implications2' , null, ['class'=>'form-control', 'id'=>'implications2']) !!}
                  {!! Form::textarea( 'implicationsh2' , null, ['class'=>'form-control', 'id'=>'implicationsh2']) !!}

                </div>
              </div>
            </div>
          </div> <!-- end Implications section -->





          <div class="form-group">
            <div class="col-md-4 col-md-offset-8">
              {!! Form::submit('Save Instructions', ['class'=>'btn btn-urc']); !!}
            </div>
          </div>

        {!! Form::close() !!}

      </div>
    </div>
  </div>
</div>

@endsection
