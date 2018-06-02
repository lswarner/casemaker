  <?php
    $current_name= \Route::currentRouteName();
  ?>

  <div class="common-bar">
    {!! Form::model($casestudy, [ 'method' => 'patch', 'class'=>'form-horizontal autosave']) !!}


    <div class="row">



      <div class="col-md-4 col-lg-4">
        <h2>Project Info</h2>



    @if($current_name != "review")

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

        @else
          <h3>{{ $casestudy->title }}</h3>

          <p>{{ strip_tags($casestudy->countries) }}</p>
        @endif

      </div>

      <div class="col-md-4 col-lg-4 col-lg-offset-1">
        <h2>Team Members <button class="btn-icon hover-secondary" type="button" data-toggle="modal" data-target="#team-member-modal"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></h2>

        <ul class="team-member-list">
        @foreach($casestudy->team as $t)
          <li>{{ $t->name }}
            @if($t->id != Auth::user()->id)&nbsp;&nbsp;&nbsp;<i data-id="{{$t->id}}" data-name="{{$t->name}}" data-email="{{$t->email}}" class="remove-user fa fa-close text-danger" aria-hidden="true"></i>@endif
          </li>
        @endforeach

        @foreach($casestudy->invitations as $i)
          <li class="text-muted">{{ $i->email }} (invited)</li>
        @endforeach
        </ul>

      </div>

      <div class="col-md-4 col-lg-3">


          <?php
            if($casestudy->status == "created"):
              $status_text= "In Progress";
            elseif($casestudy->status == "submitted"):
              $status_text= "Submitted";
            elseif($casestudy->status == "published"):
              $status_text= "Live";
            endif;
          ?>

          <div style="margin-top:20px;" class="btn status-{{$casestudy->status}}">{{ $status_text }}</div>



          @if( "review" != \Route::currentRouteName() )
            <a href="{{ route('review', $casestudy) }}" class="btn btn-urc dawn">Preview</a>
          @endif

          <button type="button" class="btn btn-urc-danger" data-toggle="modal" data-target="#delete-modal">Delete</button>


          <h4>&nbsp;</h4>

      </div>
    </div> <!-- close top row -->

    <!-- bottom row of common bar -->
    <div class="row">
      <div class="col-md-4 col-lg-4">
        <h4>Keywords <button class="btn-icon hover-accent3" type="button" data-toggle="modal" data-target="#keywords-modal"><i class="fa fa-plus-circle fa-1x" aria-hidden="true"></i></button></h4>
        <ul id="keyword-bar">
        @foreach($casestudy->keywords as $k)
          <li>{{ $k->keyword }}
            &nbsp;&nbsp;&nbsp;<i data-id="{{$k->id}}" data-name="{{$k->keyword}}" class="remove-keyword fa fa-close text-danger" aria-hidden="true"></i>
          </li>
        @endforeach
        </ul>

        <h4>Methods
        <button class="btn-icon hover-accent3" type="button" data-toggle="modal" data-target="#methods-modal"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></h4>
        <ul id="method-bar">
        @foreach($casestudy->methods as $m)
          <li>{{ $m->name }}
            &nbsp;&nbsp;&nbsp;<i data-id="{{$m->id}}" data-name="{{$m->name}}" class="remove-method fa fa-close text-danger" aria-hidden="true"></i>
          </li>
        @endforeach
        </ul>
      </div>

      <div class="col-md-4 col-lg-4 col-lg-offset-1">
        <h4>Intended Audiences <button class="btn-icon hover-accent3" type="button" data-toggle="modal" data-target="#audience-modal"><i class="fa fa-plus-circle fa-1x" aria-hidden="true"></i></button></h4>
        <ul id="audience-bar">
        @foreach($casestudy->audiences as $x)
          <li>{{ $x->name }}
            &nbsp;&nbsp;&nbsp;<i data-id="{{$x->id}}" data-name="{{$x->name}}" class="remove-audience fa fa-close text-danger" aria-hidden="true"></i>
          </li>
        @endforeach
        </ul>


        <h4>Thematic Areas <button class="btn-icon hover-accent3" type="button" data-toggle="modal" data-target="#thematic-modal"><i class="fa fa-plus-circle fa-1x" aria-hidden="true"></i></button></h4>
        <ul id="thematic-bar">
        @foreach($casestudy->thematics as $x)
          <li>{{ $x->name }}
            &nbsp;&nbsp;&nbsp;<i data-id="{{$x->id}}" data-name="{{$x->name}}" class="remove-thematic fa fa-close text-danger" aria-hidden="true"></i>
          </li>
        @endforeach
        </ul>
      </div>

      <div class="col-md-4 col-lg-3">

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

        <h4 id="autosave-message">@isset($casestudy->updated_at) Updated on {{ $casestudy->updated_at->format('F d, Y') }}@endisset</h4>
      </div>

    </div>

    {!! Form::close() !!}
  </div>

  @include('casestudy.modals.team-member')
  @include('casestudy.modals.methods')
  @include('casestudy.modals.keywords')
  @include('casestudy.modals.audiences')
  @include('casestudy.modals.thematics')
  @include('casestudy.modals.delete1')
