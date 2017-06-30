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


          <span class="casestudy-date">
            <span class="subtext">CREATED: </span> {{ $cs->created_at->format('F d, Y')  }}
          </span>

      </div>
  </a>
