

<div class="row resources">

  <div class="col-sm-12">
     <h3>Add a link to an external video or audio file</h3>
  </div>
  <div class="form-horizontal">
    <div class="form-group">
      <label for="video" class="col-sm-2 control-label">Video</label>
      <div class="col-sm-9">
          {!! Form::text('video', null, ['class'=>'form-control', 'placeholder'=>'URL to a video']) !!}
      </div>
    </div>

    <div class="form-group">
      <label for="audio" class="col-sm-2 control-label">Audio</label>
      <div class="col-sm-9">
          {!! Form::text('audio', null, ['class'=>'form-control', 'placeholder'=>'URL to an audio file']) !!}
      </div>
    </div>
  </div>


<?php /*

  // RESOURCES are not included in basic content management


  <div class="col-sm-12">
     <h3>Resources</h3>
  </div>
  <div class="form-horizontal">

    <div id="resource-bar">

    @foreach($casestudy->resources as $r)
      <div class="col-sm-2">{{ $r->name }}</div>
      <div class="col-sm-9">
        {{ $r->url }}&nbsp;&nbsp;&nbsp;<i data-id="{{$r->id}}" data-name="{{$r->name}}" class="remove-resource fa fa-close text-danger" aria-hidden="true"></i>
      </div>
    @endforeach

    <div class="form-group">
      <label for="new_resource" class="col-sm-2 control-label">Add a Resource</label>
      <div class="col-sm-3">
          {!! Form::text('new_resource_name', null, ['class'=>'form-control', 'placeholder'=>'Name']) !!}
      </div>
      <div class="col-sm-6">
          {!! Form::text('new_resource_url', null, ['class'=>'form-control', 'placeholder'=>'Url']) !!}
      </div>
      <div class="col-sm-1">
        {!! Form::submit('Add', ['class' => 'btn btn-urc btn-attach invisible']) !!}
        <button class="btn-icon hover-accent3" type="button" data-toggle="modal" data-target="#resources-modal"><i class="fa fa-plus-circle fa-1x" aria-hidden="true"></i></button></div>
    </div>


  </div>

  </div>
*/
 ?>

</div>

<h2>&nbsp;</h2>
