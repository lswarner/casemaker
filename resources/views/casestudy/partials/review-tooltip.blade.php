<div class="well shadow-depth-3">

      <h2 class="callout-title">{{ $slot }}</h2>
      <a href="javascript://" class="casestudy-tooltip">
        <span class="fa fa-info-circle" data-toggle="popover" data-content="{{ $tooltip }}" data-placement="top"></span>
      </a>

      <div class="review-tooltip-content">{!! $content !!}</div>
</div>
