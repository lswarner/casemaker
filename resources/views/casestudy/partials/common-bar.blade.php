
  <div class="common-bar">
    <div class="row">

      {!! Form::model($casestudy, [ 'method' => 'patch', 'class'=>'form-horizontal']) !!}


      <div class="col-md-4 col-lg-4">
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

            <?php /*
            <input type="checkbox" id="{{ $k->id }}" value="{{ $k->keyword }}">
            <label class="checkbox-inline">
              {{ $k->keyword }}
            </label>
          */ ?>

          <div class="col-md-12">
            <h4>Keywords</h4>
            {!! Form::select('keywords[]', $keywords, $casestudy->keywords->pluck('id')->all(), ['class' => 'form-control', 'id' => 'keywords', 'multiple' => 'multiple']) !!}

            <?php /*
            <select class="" multiple="multiple" name="keywords[]" id="keywords">
                @foreach($keywords as $keyword)

                    <option value="{{$keyword->id}}"
                      @foreach($keywords as $k)
                        @if($keyword->id == $k->id)
                          selected="selected"
                        @endif
                      @endforeach
                    >{{$keyword->keyword}}</option>
                @endforeach
            </select>
            */ ?>
          </div>


        </div>


      </div>

      <div class="col-md-4 col-lg-4 col-lg-offset-1">
        <h2>Team Members</h2>

        @foreach($casestudy->team as $t)
          <p>{{ $t->name }}</p>
        @endforeach
        <p>Tobias Funke</p>

        <p><i class="fa fa-plus-circle fa-3x" aria-hidden="true"></i></p>
      </div>

      <div class="col-md-4 col-lg-3">
          <h2>&nbsp;</h2>
          <a href="#" class="btn btn-urc-alt">Preview</a>
          <h4>&nbsp;</h4>
          <h4 id="autosave-message">Updated on November 31, 2017</h4>

      </div>
      {!! Form::close() !!}
    </div>
  </div>
