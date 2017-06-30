@extends('app')

@section('content')
<div class="container-fluid container-wide">
  <div class="main">

    <div class="row">
      <div class="col-md-6">
        <h2>Methods</h2>
        @forelse($methods as $m)
          <a href="{{ route('method.edit', $m) }}" class="btn btn-urc">{{ $m->name or "method name"}}</a>
        @empty
          <p>There are no methods</p>
        @endforelse

      </div>
      <div class="col-md-6">
        <h2>Create Method</h2>

        {!! Form::open( ['action'=>['MethodController@store'], 'method' => 'post', 'class'=>'form-horizontal']) !!}

          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

            <div class="col-md-10">
              {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Method name']) !!}

              @if ($errors->has('name'))
                <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
              @endif
            </div>

          </div>


          <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <div class="col-md-10">
              <textarea id="description" class="form-control" name="description" placeholder="A short description of this method"></textarea>

              @if ($errors->has('description'))
                  <span class="help-block">
                      <strong>{{ $errors->first('description') }}</strong>
                  </span>
              @endif
            </div>
          </div>


          <div class="form-group">
            <div class="col-md-10">
              {!! Form::submit('Save Method', ['class'=>'btn btn-urc']); !!}
            </div>
          </div>

        {!! Form::close() !!}

      </div>
    </div>
  </div>
</div>

@endsection
