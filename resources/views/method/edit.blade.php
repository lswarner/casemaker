@extends('app')

@section('content')
<div class="container-fluid container-wide">
  <div class="main">

    <div class="row">
      <div class="col-md-6">
        <h2>CaseStudies with method "{{ $method->name }}"</h2>
        @forelse($casestudies as $cs)
          <a href="{{ route('introduction', $cs) }}" class="btn btn-urc">{{ $cs->title or "Case Study Title"}}</a>
        @empty
          <p>No case studies use this method</p>
        @endforelse

      </div>
      <div class="col-md-6">
        <h2>Edit Method</h2>

        {!! Form::model($method, ['action'=>['MethodController@update', $method], 'method' => 'patch', 'class'=>'form-horizontal']) !!}

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
              <textarea id="description" class="form-control" name="description" placeholder="A short description of this method">{{ $method->description or ""}}</textarea>

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
