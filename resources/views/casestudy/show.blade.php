@extends('app')

@section('scripts')
  <script>
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();
    });
  </script>

  @include('scripts.autosave')

@endsection

@section('css')
  <!-- include summernote css/js-->
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">

  <link href="{{ asset('css/casestudy-style.css') }}" rel="stylesheet">
@endsection


@section('content')
<div class="container-fluid container-wide">



  <div class="common-bar">

    <h2>{{ $casestudy->title }}</h2>


    <div class="row">

      <div class="col-md-4 col-lg-4">
        <h4>{{ $casestudy->description }}</h4>

        <p><b>Countries:</b> {{ strip_tags($casestudy->countries) }}</p>
        <p><b>Author(s):</b> {{ $casestudy->author }}</p>
      </div>




      <div class="col-md-4 col-lg-4 col-lg-offset-1">
        <h3>Team Members</h3>

        <ul class="">
        @foreach($casestudy->team as $t)
          <li>{{ $t->name }}</li>
        @endforeach

        @foreach($casestudy->invitations as $i)
          <li class="text-muted">{{ $i->email }} (invited)</li>
        @endforeach
        </ul>


        <h3>Topics</h3>
        <ul id="keyword-bar">
        @foreach($casestudy->keywords as $k)
          <li>{{ $k->keyword }}</li>
        @endforeach
        </ul>

        <h3>Methods</h3>
        <ul id="method-bar">
        @foreach($casestudy->methods as $m)
          <li>{{ $m->name }}</li>
        @endforeach
      </ul>
      </div>


      <div class="col-md-4 col-lg-3">
          @if($casestudy->featured_image != "")
            <img class="img-responsive" src="{{ url($casestudy->featured_image) }}" />
          @endif

          <h4>&nbsp;</h4>

          <?php
            if($casestudy->status == "created"):
              $status_text= "In Progress";
            elseif($casestudy->status == "submitted"):
              $status_text= "Submitted";
            elseif($casestudy->status == "published"):
              $status_text= "Live";
            endif;
            ?>

          <div class="btn status-{{$casestudy->status}}">{{ $status_text }}</div>

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

      </div>

    </div>
  </div>











  <div class="main">

    <h1 class="review-header">Review Case Study</h1>


    @include('casestudy.summary')


    <div class="row">
    @if( $casestudy->status == "submitted" )

      {!! Form::model( $casestudy, ['action'=>['CaseStudyController@reopen', $casestudy->id], 'method' => 'patch', 'class'=>'form-horizontal']) !!}

      <div class="form-group">
        <div class="col-sm-10 col-sm-offset-1">
          <h3 class="text-left">This case study has been submitted.</h3>
          <p>If you want to make changes, you or a team member can re-open the casestudy. This will mark the case study as "In Progress". When you have completed your changes, you can submit your case study once again.</p>
        </div>
      </div>
      <div class="form-group">

        <div class="col-sm-6 col-sm-offset-6">
          <input type="submit" class="btn btn-urc-accent1" value="Re-Open Case Study" />
        </div>
      </div>

      {!! Form::close() !!}

    @elseif( $casestudy->status == "published")

      @if( Auth::user()->is_admin == FALSE )
        <div class="form-group">
          <div class="col-sm-10 col-sm-offset-1">
            <h3 class="text-left">This case study is live.</h3>
            <p>Once a case study has been published to the {{ \App\CMS::first()->library_title }}, only a {{ \App\CMS::first()->casemaker_title }} administrator can make changes. </p>
          </div>
        </div>
      @else

        {!! Form::model( $casestudy, ['action'=>['CaseStudyController@reopen', $casestudy->id], 'method' => 'patch', 'class'=>'form-horizontal']) !!}

        <div class="form-group">
          <div class="col-sm-10 col-sm-offset-1">
            <h3 class="text-left">This case study has been published.</h3>
            <p>If you want to make changes, you can re-open the casestudy. This will mark the case study as "In Progress". When you have completed your changes, you can submit the case study once again.</p>
          </div>
        </div>
        <div class="form-group">

          <div class="col-sm-6 col-sm-offset-6">
            <input type="submit" class="btn btn-urc-accent1" value="Re-Open Case Study" />
          </div>
        </div>

        {!! Form::close() !!}
      @endif

    @endif

    </div>
  </div>
</div>

@endsection
