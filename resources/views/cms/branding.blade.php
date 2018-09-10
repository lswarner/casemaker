@extends('app')

@section('content')
<div class="container-fluid container-wide">
  <div class="main">


    <h2>Case Study Branding</h2>

    {!! Form::model($cms, ['action'=>['CMSController@branding_update'], 'method' => 'patch', 'class'=>'form-horizontal']) !!}

    <div class="cms">

      <div class="row">
        <div class="col-md-12">

          <h2>Text</h2>
          <div class="form-group">

            <label for="casemaker_title" class="col-cs-12 col-sm-4 control-label branding-label">{{ $cms->casemaker_title }} title</label>
            <div class="col-cs-12 col-sm-8">
              <input id="casemaker_title" type="text" class="form-control" name="casemaker_title" value="{{ $cms->casemaker_title }}" required autofocus placeholder="Title of Case Study App">
            </div>

          </div>

          <div class="form-group">

            <label for="library_title" class="col-cs-12 col-sm-4 control-label branding-label">{{ $cms->library_title }} title</label>
            <div class="col-cs-12 col-sm-8">
               <input id="library_title" type="text" class="form-control" name="library_title" value="{{ $cms->library_title }}" required autofocus placeholder="Title of Case Study Library">
            </div>
          </div>

          <div class="form-group">

            <label for="welcome_text" class="col-cs-12 col-sm-4 control-label branding-label">{{ $cms->library_title }} description</label>
            <div class="col-cs-12 col-sm-8">
               <textarea id="welcome_text" class="form-control" name="welcome_text" required autofocus placeholder="Description text for the Case Study Library">{{ $cms->welcome_text }}</textarea>
            </div>
          </div>

          <div class="form-group">

            <label for="about_text" class="col-cs-12 col-sm-4 control-label branding-label">About page</label>
            <div class="col-cs-12 col-sm-8">
               <textarea id="about_text" class="form-control" name="about_text" required autofocus placeholder="Text for the About page">{{ $cms->about_text }}</textarea>
            </div>
          </div>


          <div class="row">
            <div class=" col-md-offset-8 col-md-4">
                {!! Form::submit('Save Text', ['class'=>'btn btn-urc']); !!}

            </div>
          </div>


        </div>
      </div>
    </div>

    <div class="cms">

      <div class="row">
        <h2>{{ $cms->casemaker_title }} Logos</h2>
        <div class="col-md-4">


          <h3>CaseMaker logo</h3>
          <p class="">max size: 420px x 90px</p>
          <img src="{{url( $cms->casemaker_logo) }}" class="img-responsive space-below" />

          <a href="{{route('image', 'casemaker_logo')}}" class="btn btn-urc-secondary">Change Logo</a>
        </div>

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


        <div class="col-md-4">

          <h3>Favicon</h3>
          <p class=""><a href="http://www.favicomatic.com/">Create Favicon</a> size: 32px x 32px</p>
          <img src="{{url( $cms->favicon) }}" class="img-responsive space-below" />

          <a href="{{route('image', 'favicon')}}" class="btn btn-urc-secondary">Change Favicon</a>
        </div>

      </div>
    </div>



    <div class="cms">

      <div class="row">
        <h2>{{ $cms->library_title }} Logos</h2>


        <div class="col-md-4">

          <h3>Library logo</h3>
          <p class="">max size: 420px x 90px</p>
          <img src="{{url( $cms->library_logo) }}" class="img-responsive space-below" />

          <a href="{{route('image', 'library_logo')}}" class="btn btn-urc-info">Change Logo</a>
        </div>

        <div class="col-md-4">
          <?php /*
          <div class="form-group">
            <label for="splash_image" class="col-sm-12 control-label" style="text-align:left !important;">Login page splash image</label>
          </div>
          */ ?>
          <h3>Library splash image</h3>
          <p class="">recommended size: 1400px x 720px</p>
          <img src="{{url( $cms->library_splash) }}" class="img-responsive space-below" />

          <a href="{{route('image', 'library_splash')}}" class="btn btn-urc-info">Change Splash Image</a>
        </div>

      </div>

    </div>




    {!! Form::close() !!}



  </div>
</div>

@endsection
