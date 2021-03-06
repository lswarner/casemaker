

<div class="row file-upload">

  <div class="col-md-12">
     <h3>Attach a file, image or tool</h3>
     <ul>
       @foreach($attachments as $a)
       <li><a href="{{ $a->url() }}">{{ $a->original_name }}</a></li>
       @endforeach
     </ul>
  </div>

  <div class="col-md-8">
     <div class="input-group input-group-ub">
        <span class="input-group-btn">
            <span class="btn btn-ub btn-file">
                Click here to attach&hellip; <input type="file" name="attachment"></input>
            </span>
        </span>
        <input type="text" class="form-control" readonly />
        <input type="hidden" name="section" value="{{ $slot }}"/>
      </div>
  </div>
  <div class="col-md-4">


      <span class="input-group-btn">
        {!! Form::submit('Attach File', ['class' => 'btn btn-urc btn-attach invisible']) !!}
      </span>

  </div>

</div>

<h2>&nbsp;</h2>
