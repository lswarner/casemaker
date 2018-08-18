@extends('app')

@section('content')
<div class="container-fluid container-wide">
  <div class="main">

    <div class="row">
      <div class="col-md-6">
        <h2>Templates</h2>
        @forelse($templates as $m)
          <a href="{{ route('template.edit', $m) }}" class="btn btn-urc">{{ $m->name or "template name"}}</a>
        @empty
          <p>There are no template</p>
        @endforelse

      </div>
      <div class="col-md-6">
        <h2>Create Template</h2>

        {!! Form::open( ['action'=>['TemplateController@store'], 'method' => 'post', 'class'=>'form-horizontal']) !!}

          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

            <div class="col-md-10">
              {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'The name of the template area']) !!}

              @if ($errors->has('name'))
                <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
              @endif
            </div>

          </div>


          <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <div class="col-md-10">
              <textarea id="description" class="form-control" name="description" placeholder="A short description of this template"></textarea>

              @if ($errors->has('description'))
                  <span class="help-block">
                      <strong>{{ $errors->first('description') }}</strong>
                  </span>
              @endif
            </div>
          </div>


          <div class="form-group{{ $errors->has('blade') ? ' has-error' : '' }}">

            <div class="col-md-10">
              {!! Form::text('blade', null, ['class'=>'form-control', 'placeholder'=>'The name of the blade']) !!}

              @if ($errors->has('blade'))
                <span class="help-block">
                  <strong>{{ $errors->first('blade') }}</strong>
                </span>
              @endif
            </div>

          </div>


          <div class="form-group">
            <div class="col-md-10">
              {!! Form::submit('Save Template', ['class'=>'btn btn-urc']); !!}
            </div>
          </div>

        {!! Form::close() !!}

      </div>
    </div>
  </div>
</div>

@endsection
