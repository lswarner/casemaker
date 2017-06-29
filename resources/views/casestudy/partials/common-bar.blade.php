
  <div class="common-bar">
    <div class="row">

      {!! Form::model($casestudy, ['action'=>['CaseStudyController@update', $casestudy->id], 'method' => 'patch', 'class'=>'form-horizontal']) !!}
      {!! Form::hidden('destination', \Route::currentRouteName() ) !!}

      <div class="col-md-4">
        <h2>Project Info</h2>

        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
          <div class="col-md-12">
            {!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'CaseStudy Title']) !!}

            @if ($errors->has('title'))
              <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
              </span>
            @endif
          </div>
        </div>


        <div class="form-group{{ $errors->has('countries') ? ' has-error' : '' }}">
          <div class="col-md-12">
            {!! Form::text('countries', null, ['class'=>'form-control', 'placeholder'=>'Countries']) !!}

            @if ($errors->has('countries'))
              <span class="help-block">
                <strong>{{ $errors->first('countries') }}</strong>
              </span>
            @endif
          </div>
        </div>


        <div class="form-group{{ $errors->has('keywords') ? ' has-error' : '' }}">
            <h4>Keywords</h4>
            <?php /*
            <input type="checkbox" id="{{ $k->id }}" value="{{ $k->keyword }}">
            <label class="checkbox-inline">
              {{ $k->keyword }}
            </label>
          */ ?>

          <div class="col-md-12">
            {!! Form::select('keywords[]', $keywords, [], ['class' => 'form-control', 'id' => 'keywords', 'multiple' => 'multiple']) !!}

          </div>


        </div>


      </div>

      <div class="col-md-3 col-md-offset-1">
        <h2>Team Members</h2>

        <p>Luke Warner</p>
        <p>Christina Vernon</p>
        <p>LaDainian Tomlinson</p>
        <p>Phillip Rivers</p>
        <p>Toby McKeehan</p>
        <p>Tobias Funke</p>

        <p><i class="fa fa-plus-circle fa-3x" aria-hidden="true"></i></p>
      </div>

      <div class="col-md-3 col-md-offset-1">
          <h2>&nbsp;</h2>
          <button type="submit" class="btn btn-urc">
              Save CaseStudy
          </button>

      </div>
      {!! Form::close() !!}
    </div>
  </div>
