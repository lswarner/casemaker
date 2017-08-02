
  <a class="btn btn-casestudy {{ $cs->status }}" href="{{ route('introduction', $cs) }}">

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


          <span class="subtext">COUNTRIES:</span> {{ strip_tags($cs->countries) }}<br />


          <span class="casestudy-date">
            @if($cs->status == "submitted")
              <span class="subtext">SUBMITTED: </span> {{ $cs->submitted_at->format('F d, Y')  }}
            @elseif($cs->status == "published")
              <span class="subtext">LIVE: </span> {{ $cs->published_at->format('F d, Y')  }}
            @else
                <span class="subtext">CREATED: </span> {{ $cs->created_at->format('F d, Y')  }}
            @endif
          </span>

      </div>
  </a>
