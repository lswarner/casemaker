@extends('app')

@section('content')
<div class="container-fluid container-wide">
  <div class="main">

    <div class="row">
      <div class="col-md-6">
        <h2>Thematic Areas</h2>
        @forelse($thematics as $m)
          <a href="{{ route('thematic.edit', $m) }}" class="btn btn-urc">{{ $m->name or "thematic area name"}}</a>
        @empty
          <p>There are no thematic areas</p>
        @endforelse

      </div>
      <div class="col-md-6">
        <h2>Create Thematic Area</h2>

        {!! Form::open( ['action'=>['ThematicController@store'], 'method' => 'post', 'class'=>'form-horizontal']) !!}

          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

            <div class="col-md-10">
              {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'The name of the thematic area']) !!}

              @if ($errors->has('name'))
                <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
              @endif
            </div>

          </div>


          <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <div class="col-md-10">
              <textarea id="description" class="form-control" name="description" placeholder="A short description of this thematic area"></textarea>

              @if ($errors->has('description'))
                  <span class="help-block">
                      <strong>{{ $errors->first('description') }}</strong>
                  </span>
              @endif
            </div>
          </div>


          <div class="form-group">
            <div class="col-md-10">
              {!! Form::submit('Save Thematic Area', ['class'=>'btn btn-urc']); !!}
            </div>
          </div>

        {!! Form::close() !!}

      </div>
    </div>
  </div>
</div>

@endsection
