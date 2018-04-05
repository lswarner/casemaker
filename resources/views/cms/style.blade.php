@extends('app')

@section('content')
<div class="container-fluid container-wide">
  <div class="main">

    <div class="row">
      {!! Form::model($cms, ['action'=>['CMSController@style_update'], 'method' => 'patch', 'class'=>'form-horizontal']) !!}


      <div class="col-md-5">
          <h2>Color Palette</h2>

            @component('cms.palette-card', ['name'=>'primary'])
              Primary
            @endcomponent

            @component('cms.palette-card', ['name'=>'secondary'])
              Secondary
            @endcomponent

            @component('cms.palette-card', ['name'=>'info'])
              Info
            @endcomponent

            @component('cms.palette-card', ['name'=>'accent1'])
              Accent 1
            @endcomponent

            @component('cms.palette-card', ['name'=>'accent2'])
              Accent 2
            @endcomponent

            @component('cms.palette-card', ['name'=>'accent3'])
              Accent 3
            @endcomponent

      </div>


      <div class="col-md-5 col-md-offset-1">
        <h2>Page Sections</h2>

          <h3 class="navbar-demo">Navbar</h3>
          @component('cms.style-card', ['name'=>'navbar-default-bg'])
            background color
          @endcomponent

          @component('cms.style-card', ['name'=>'navbar-default-text'])
            text
          @endcomponent

          @component('cms.style-card', ['name'=>'navbar-border'])
            divider
          @endcomponent

          <h3 class="commonbar-demo">CaseStudy Panel</h3>
          @component('cms.style-card', ['name'=>'commonbar-bg'])
            background color
          @endcomponent

          @component('cms.style-card', ['name'=>'commonbar-text'])
            text
          @endcomponent

          <h3 class="footer-demo">Footer</h3>
          @component('cms.style-card', ['name'=>'footer-bg'])
            background color
          @endcomponent

          @component('cms.style-card', ['name'=>'footer-text'])
            text
          @endcomponent

      </div>

      <div class="col-md-6 col-md-offset-6">
          {!! Form::submit('Update Design', ['class'=>'btn btn-urc']); !!}

      </div>

      {!! Form::close() !!}
    </div>


  </div>
</div>

@endsection
