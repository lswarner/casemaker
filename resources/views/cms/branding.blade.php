@extends('app')

@section('content')
<div class="container-fluid container-wide">
  <div class="main">


    <h2>CaseMaker Branding</h2>

    {!! Form::model($cms, ['action'=>['CMSController@style_update'], 'method' => 'patch', 'class'=>'form-horizontal']) !!}

    <div class="row">

      <div class="col-md-4">
        <?php /*
        <div class="form-group">

          <label for="casemaker_title" class="col-sm-2 control-label">Title</label>
          <div class="col-sm-10">
            <input id="casemaker_title" type="text" class="form-control" name="casemaker_title" value="{{ $cms->casemaker_title }}" required autofocus placeholder="Title of Case Study App">
          </div>

        </div>
        */ ?>

        <h3>CaseMaker logo</h3>
        <p class="">recommended size: 420px x 90px</p>
        <img src="{{url( $cms->casemaker_logo) }}" class="img-responsive space-below" />

        <a href="{{route('image', 'casemaker_logo')}}" class="btn btn-urc-secondary">Change Logo</a>
      </div>

<?php /*
      <div class="col-md-4">

        <div class="form-group">

          <label for="library_title" class="col-sm-2 control-label">Title</label>
          <div class="col-sm-10">
             <input id="library_title" type="text" class="form-control" name="library_title" value="{{ $cms->library_title }}" required autofocus placeholder="Title of Case Study Library">
          </div>
        </div>

        <h3>Library logo</h3>
        <p class="">recommended size: ??? </p>
        <img src="{{url( $cms->library_logo) }}" class="img-responsive space-below" />

        <a href="{{route('image', 'library_logo')}}" class="btn btn-urc-secondary">Change Logo</a>
      </div>
*/ ?>

      <div class="col-md-4">
        <?php /*
        <div class="form-group">
          <label for="splash_image" class="col-sm-12 control-label" style="text-align:left !important;">Login page splash image</label>
        </div>
        */ ?>
        <h3>Login page splash image</h3>
        <p class="">recommended size: 2000px x 1330px</p>
        <img src="{{url( $cms->splash_image) }}" class="img-responsive space-below" />

        <a href="{{route('image', 'splash_image')}}" class="btn btn-urc-secondary">Change Splash Image</a>
      </div>


    </div>

    <?php /*
    <div class="row">
      <div class="col-md-6">
          {!! Form::submit('Save Titles', ['class'=>'btn btn-urc']); !!}

      </div>
    </div>
    */ ?>

    {!! Form::close() !!}



  </div>
</div>

@endsection
