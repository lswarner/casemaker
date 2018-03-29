@extends('app')

@section('content')
<div class="container-fluid container-wide">
  <div class="main">

    <div class="row">
      {!! Form::model($cms, ['action'=>['CMSController@style_update'], 'method' => 'patch', 'class'=>'form-horizontal']) !!}
      <div class="col-md-12">
        <h2>Customize Design</h2>

      </div>


      @component('cms.style-card', ['name'=>'primary'])
        Primary
      @endcomponent

      @component('cms.style-card', ['name'=>'secondary'])
        Secondary
      @endcomponent

      @component('cms.style-card', ['name'=>'info'])
        Info
      @endcomponent

      @component('cms.style-card', ['name'=>'accent1'])
        Accent 1
      @endcomponent

      @component('cms.style-card', ['name'=>'accent2'])
        Accent 2
      @endcomponent

      @component('cms.style-card', ['name'=>'accent3'])
        Accent 3
      @endcomponent

      <div class="col-md-6 col-md-offset-6">
          {!! Form::submit('Update Design', ['class'=>'btn btn-urc']); !!}

      </div>

      {!! Form::close() !!}
    </div>


  </div>
</div>

@endsection
