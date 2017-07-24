  <div class="common-bar">
    <div class="row">

      {!! Form::model($casestudy, [ 'method' => 'patch', 'class'=>'form-horizontal autosave']) !!}


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
            {!! Form::textarea('countries', null, ['class'=>'form-control', 'rows'=>3, 'id' => 'countries']) !!}

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

        <ul class="team-member-list">
        @foreach($casestudy->team as $t)
          <li>{{ $t->name }}
            @if($t->id != Auth::user()->id)&nbsp;&nbsp;&nbsp;<i data-id="{{$t->id}}" data-name="{{$t->name}}" data-email="{{$t->email}}" class="remove-user fa fa-close text-danger" aria-hidden="true"></i>@endif
          </li>
        @endforeach
        </ul>
        <button class=" btn-icon" type="button" data-toggle="modal" data-target="#team-member-modal"><i class="fa fa-plus-circle fa-3x" aria-hidden="true"></i></button>
      </div>

      <div class="col-md-4 col-lg-3">
          <h2>&nbsp;</h2>

          @if( "review" != \Route::currentRouteName() )
            <a href="{{ route('review', $casestudy) }}" class="btn btn-urc-alt">Preview</a>
          @endif

          <h4>&nbsp;</h4>

          <?php /*
          <div class="btn status-{{$casestudy->status}}">{{ $casestudy->status }}</div>
          */ ?>


          @if($casestudy->status == "created")
            <h4>Created on {{ $casestudy->created_at->format('F d, Y')  }}</h4>
          @endif


          @if($casestudy->status == "submitted")
            <h4>Created on {{ $casestudy->created_at->format('F d, Y')  }}</h4>
            <h4>Submitted on {{ $casestudy->submitted_at->format('F d, Y')  }}</h4>
          @endif


          @if($casestudy->status == "published")
            <h4>Created on {{ $casestudy->created_at->format('F d, Y')  }}</h4>
            <h4>Submitted on {{ $casestudy->submitted_at->format('F d, Y')  }}</h4>
            <h4>Live on {{ $casestudy->published_at->format('F d, Y')  }}</h4>
          @endif

          <h4 id="autosave-message">Updated on {{ $casestudy->updated_at->format('F d, Y') }}</h4>

      </div>
      {!! Form::close() !!}
    </div>
  </div>

  @include('casestudy.modals.team-member')
