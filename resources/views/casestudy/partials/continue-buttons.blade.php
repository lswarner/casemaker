<div class="form-group">
  <div class="col-md-4 col-lg-6">
    @if(isset($back))
      <a class="btn btn-link btn-back" href="{{ $back }}">< Back</a>
    @endif
  </div>
  <div class="col-md-8 col-lg-6">
    <a class="btn btn-urc-alt" href="{{ $next }}">{{ $slot }}</a>
  </div>
</div>
