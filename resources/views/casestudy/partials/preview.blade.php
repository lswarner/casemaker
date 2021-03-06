
  <a class="btn btn-casestudy status-{{ $cs->status }}" href="{{ route('background', $cs) }}">

      <div class="casestudy-title">{{ $cs->title ?: "My New Case Study" }}</div>
      <button type="button" class="btn-icon hover-accent1 btn-top-right" data-toggle="modal" data-title="{{ $cs->title }}" data-action="{{ route('casestudy.destroy', $cs)}}"><i class="casestudy-delete fa fa-trash-o" aria-hidden="true"></i></button>

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
              <?php //  <span class="subtext">CREATED: </span> {{ $cs->created_at->format('F d, Y')  }} ?>
            @endif
          </span>

      </div>
  </a>
