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
    <div class="row">

      <div class="col-md-4 col-lg-4">
        <h2>Project Info</h2>


        <h3>{{ $casestudy->title }}</h3>

        <p>{{ strip_tags($casestudy->countries) }}</p>

        <h4>Keywords</h4>
        <ul id="keyword-bar">
        @foreach($casestudy->keywords as $k)
          <li>{{ $k->keyword }}</li>
        @endforeach
        </ul>

        <h4>Methods</h4>
        <ul id="method-bar">
        @foreach($casestudy->methods as $m)
          <li>{{ $m->name }}</li>
        @endforeach
        </ul>

      </div>



      <div class="col-md-4 col-lg-4 col-lg-offset-1">
        <h2>Team Members</h2>

        <ul class="team-member-list">
        @foreach($casestudy->team as $t)
          <li>{{ $t->name }}</li>
        @endforeach

        @foreach($casestudy->invitations as $i)
          <li class="text-muted">{{ $i->email }} (invited)</li>
        @endforeach
      </ul>

      </div>

      <div class="col-md-4 col-lg-3">
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
    @if( $casestudy->status == "submitted"  )
      @if(Auth::user()->is_admin == true)

        {!! Form::model( $casestudy, ['action'=>['CaseStudyController@publish', $casestudy->id], 'method' => 'patch', 'class'=>'form-horizontal']) !!}

        <div class="form-group">
          <div class="col-md-8 col-md-offset-4 col-lg-6 col-lg-offset-6">
            <input type="submit" class="btn btn-urc-alt" value="Publish Case Study" />
          </div>
        </div>

        {!! Form::close() !!}
      @else
      <h3 class="text-center">This case study has been submitted and is awaiting review.</h3>
      @endif
    @endif

    </div>
  </div>
</div>

@endsection
