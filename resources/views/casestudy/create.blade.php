@extends('app')

@section('css')
  <!-- include summernote css/js-->
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
@endsection

@section('scripts')
  <?php
    $boxes = []
  ?>
  @include('scripts.summernote', ['boxes' => [ 'introduction', 'introduction2' ] ] )
@endsection

@section('content')
<div class="container">
  <div class="main">

    <div class="row">
      <div class="col-md-12">
        <h2>Edit Account</h2>

        {!! Form::open( ['action'=>['CaseStudyController@store'], 'method' => 'post', 'class'=>'form-horizontal']) !!}

          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

            <div class="col-md-10">
              {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Full Name']) !!}

              @if ($errors->has('name'))
                <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
              @endif
            </div>

          </div>



          <div class="form-group{{ $errors->has('introduction') ? ' has-error' : '' }}">
            <div class="col-md-10">
              <textarea id="introduction" class="form-control" name="introduction" placeholder="What would you like to write a case study about?"></textarea>

              @if ($errors->has('introduction'))
                  <span class="help-block">
                      <strong>{{ $errors->first('introduction') }}</strong>
                  </span>
              @endif
            </div>
          </div>


          <div class="form-group{{ $errors->has('introduction2') ? ' has-error' : '' }}">
            <div class="col-md-10">
              <textarea id="introduction2" class="form-control" name="introduction2" placeholder="What else would you like to write a case study about?"></textarea>

              @if ($errors->has('introduction2'))
                  <span class="help-block">
                      <strong>{{ $errors->first('introduction2') }}</strong>
                  </span>
              @endif
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-10">
              <button type="submit" class="btn btn-urc">
                  Update
              </button>
            </div>
          </div>

        {!! Form::close() !!}

      </div>
    </div>
  </div>
</div>

@endsection
