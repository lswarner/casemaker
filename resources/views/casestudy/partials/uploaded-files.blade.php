<div>
  <label class="col-md-12">Attachments</label>
  <ul>
    @foreach($attachments as $a)
    <li><a href="{{ $a->url() }}">{{ $a->original_name }}</a></li>
    @endforeach
  </ul>
</div>
