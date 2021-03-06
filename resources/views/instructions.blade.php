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

        {!! Form::model($instructions, ['action'=>['InstructionsController@update'], 'method' => 'patch', 'class'=>'form-horizontal']) !!}
        <!-- start Background section -->
          <div class="review-section well shadow-depth-3">
            <div class="row">
              <div class="col-md-4">
                  <a class="section-header" data-toggle="collapse" href="#background" aria-expanded="false" aria-controls="background"><h2 class="section-header">Background</h2></a>
              </div>
              <div class="col-md-8">
                <a class="pull-right" data-toggle="collapse" href="#background" aria-expanded="false" aria-controls="background"><i class="fa fa-caret-down fa-2x"></i></a>
              </div>

              <div>&nbsp;</div>

              <div class="col-md-10 col-md-offset-1 collapse" id="background">

                <div class="form-group">

                  {!! Form::textarea( 'intro0' , null, ['class'=>'form-control', 'id'=>'intro0']) !!}
                  {!! Form::textarea( 'intro1' , null, ['class'=>'form-control', 'id'=>'intro1']) !!}
                  {!! Form::textarea( 'introh1' , null, ['class'=>'form-control', 'id'=>'introh1']) !!}
                  {!! Form::textarea( 'intro2' , null, ['class'=>'form-control', 'id'=>'intro2']) !!}
                  {!! Form::textarea( 'introh2' , null, ['class'=>'form-control', 'id'=>'introh2']) !!}
                </div>

                <div class="form-group">
                  <h3>Tooltips</h3>
                  {!! Form::text( 'tooltip11h' , null, ['class'=>'form-control', 'id'=>'tooltip11h']) !!}
                  {!! Form::textarea( 'tooltip11' , null, ['class'=>'form-control', 'id'=>'tooltip11', 'rows' => '2']) !!}
                  <br />
                  {!! Form::text( 'tooltip12h' , null, ['class'=>'form-control', 'id'=>'tooltip12h']) !!}
                  {!! Form::textarea( 'tooltip12' , null, ['class'=>'form-control', 'id'=>'tooltip12', 'rows' => '2']) !!}
                  <br />
                  {!! Form::text( 'tooltip13h' , null, ['class'=>'form-control', 'id'=>'tooltip13h']) !!}
                  {!! Form::textarea( 'tooltip13' , null, ['class'=>'form-control', 'id'=>'tooltip13', 'rows' => '2']) !!}
                  <br />
                  {!! Form::text( 'tooltip14h' , null, ['class'=>'form-control', 'id'=>'tooltip14h']) !!}
                  {!! Form::textarea( 'tooltip14' , null, ['class'=>'form-control', 'id'=>'tooltip14', 'rows' => '2']) !!}

                </div>
              </div>
            </div>
          </div> <!-- end Background section -->



          <!-- start Methodology section -->
          <div class="review-section well shadow-depth-3">
            <div class="row">
              <div class="col-md-4">
                  <a class="section-header" data-toggle="collapse" href="#approach" aria-expanded="false" aria-controls="approach"><h2 class="section-header">IS Approach</h2></a>
              </div>
              <div class="col-md-8">
                <a class="pull-right" data-toggle="collapse" href="#approach" aria-expanded="false" aria-controls="approach"><i class="fa fa-caret-down fa-2x"></i></a>
              </div>

              <div class="col-md-10 col-md-offset-1 collapse" id="approach">

                <div class="form-group">

                  {!! Form::textarea( 'method0' , null, ['class'=>'form-control', 'id'=>'method0']) !!}
                  {!! Form::textarea( 'method1' , null, ['class'=>'form-control', 'id'=>'method1']) !!}
                  {!! Form::textarea( 'methodh1' , null, ['class'=>'form-control', 'id'=>'methodh1']) !!}
                  {!! Form::textarea( 'method2' , null, ['class'=>'form-control', 'id'=>'method2']) !!}
                  {!! Form::textarea( 'methodh2' , null, ['class'=>'form-control', 'id'=>'methodh2']) !!}
                </div>

                <div class="form-group">
                  <h3>Tooltips</h3>
                  {!! Form::text( 'tooltip21h' , null, ['class'=>'form-control', 'id'=>'tooltip21h']) !!}
                  {!! Form::textarea( 'tooltip21' , null, ['class'=>'form-control', 'id'=>'tooltip21', 'rows' => '2']) !!}
                  <br />
                  {!! Form::text( 'tooltip22h' , null, ['class'=>'form-control', 'id'=>'tooltip22h']) !!}
                  {!! Form::textarea( 'tooltip22' , null, ['class'=>'form-control', 'id'=>'tooltip22', 'rows' => '2']) !!}
                  <br />
                  {!! Form::text( 'tooltip23h' , null, ['class'=>'form-control', 'id'=>'tooltip23h']) !!}
                  {!! Form::textarea( 'tooltip23' , null, ['class'=>'form-control', 'id'=>'tooltip23', 'rows' => '2']) !!}

                </div>
              </div>
            </div>
          </div> <!-- end Methodology section -->



          <!-- start Results section -->
          <div class="review-section well shadow-depth-3">
            <div class="row">
              <div class="col-md-4">
                  <a class="section-header" data-toggle="collapse" href="#findings" aria-expanded="false" aria-controls="findings"><h2 class="section-header">Findings</h2></a>
              </div>
              <div class="col-md-8">
                <a class="pull-right" data-toggle="collapse" href="#findings" aria-expanded="false" aria-controls="findings"><i class="fa fa-caret-down fa-2x"></i></a>
              </div>

              <div class="col-md-10 col-md-offset-1 collapse" id="findings">

                <div class="form-group">

                  {!! Form::textarea( 'results0' , null, ['class'=>'form-control', 'id'=>'results0']) !!}
                  {!! Form::textarea( 'results1' , null, ['class'=>'form-control', 'id'=>'results1']) !!}
                  {!! Form::textarea( 'resultsh1' , null, ['class'=>'form-control', 'id'=>'resultsh1']) !!}
                </div>

                <div class="form-group">
                  <h3>Tooltips</h3>
                  {!! Form::text( 'tooltip31h' , null, ['class'=>'form-control', 'id'=>'tooltip31h']) !!}
                  {!! Form::textarea( 'tooltip31' , null, ['class'=>'form-control', 'id'=>'tooltip31', 'rows' => '2']) !!}
                  <br />
                  {!! Form::text( 'tooltip32h' , null, ['class'=>'form-control', 'id'=>'tooltip32h']) !!}
                  {!! Form::textarea( 'tooltip32' , null, ['class'=>'form-control', 'id'=>'tooltip32', 'rows' => '2']) !!}
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

              <div class="col-md-10 col-md-offset-1 collapse" id="implications">

                <div class="form-group">

                  {!! Form::textarea( 'implications0' , null, ['class'=>'form-control', 'id'=>'implications0']) !!}
                  {!! Form::textarea( 'implications1' , null, ['class'=>'form-control', 'id'=>'implications1']) !!}
                  {!! Form::textarea( 'implicationsh1' , null, ['class'=>'form-control', 'id'=>'implicationsh1']) !!}
                  {!! Form::textarea( 'implications2' , null, ['class'=>'form-control', 'id'=>'implications2']) !!}
                  {!! Form::textarea( 'implicationsh2' , null, ['class'=>'form-control', 'id'=>'implicationsh2']) !!}
                </div>

                <div class="form-group">
                  <h3>Tooltips</h3>
                  {!! Form::text( 'tooltip41h' , null, ['class'=>'form-control', 'id'=>'tooltip41h']) !!}
                  {!! Form::textarea( 'tooltip41' , null, ['class'=>'form-control', 'id'=>'tooltip41', 'rows' => '2']) !!}
                  <br />
                  {!! Form::text( 'tooltip42h' , null, ['class'=>'form-control', 'id'=>'tooltip42h']) !!}
                  {!! Form::textarea( 'tooltip42' , null, ['class'=>'form-control', 'id'=>'tooltip42', 'rows' => '2']) !!}
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
