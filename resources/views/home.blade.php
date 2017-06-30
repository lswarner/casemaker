@extends('app')

@section('content')
<div class="container-fluid container-wide">
  <div class="main">


    <div class="row">
        <div class="col-md-8">
          <h2>My Case Studies</h2>
        </div>
        <div class="col-md-4">
          {!! Form::open( ['action'=>['CaseStudyController@store'], 'method' => 'post', 'class'=>'form-horizontal']) !!}
            <button type="submit" class="btn btn-urc">Create New Case Study</button>
          {!! Form::close() !!}
        </div>
    </div>


    <div class="row">
      <div class="col-md-6">
        @foreach($casestudies as $cs)
          <?php
            $i= rand(1,99) % 3;
            $colors= [0=>'sky', 1=>'blue', 2=>'dawn'];
            $class= $colors[$i];
          ?>
          <a class="btn btn-casestudy {{ $class }}" href="{{ route('introduction', $cs) }}">
              <div class="casestudy-title">{{ $cs->title ?: "My New Case Study" }}</div>

              <div class="casestudy-details">
                <span class="subtext">TEAM:</span>
                  @foreach($cs->team as $team)
                    @if ($loop->last)
                      {{$team->name}}
                    @else
                      {{$team->name}},&nbsp;
                    @endif
                  @endforeach
                <br />
                <span class="subtext">COUNTRIES:</span> {{ $cs->countries }}<br />
                <span class="subtext">CREATED: </span> {{ $cs->created_at->format('F d, Y')  }}
              </div>
          </a>
        @endforeach
      </div>
    </div>




  </div>
</div>
@endsection
