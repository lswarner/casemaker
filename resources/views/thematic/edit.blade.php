@extends('app')

@section('content')
<div class="container-fluid container-wide">
  <div class="main">

    <div class="row">
      <div class="col-md-6">
        <h2>CaseStudies with Thematic Area "{{ $thematic->name }}"</h2>
        @forelse($casestudies as $cs)
          <a href="{{ route('background', $cs) }}" class="btn btn-urc">{{ $cs->title or "Case Study Title"}}</a>
        @empty
          <p>No case studies use this thematic area</p>
        @endforelse

      </div>
      <div class="col-md-6">
        <h2>Edit Thematic Area</h2>

        {!! Form::model($thematic, ['action'=>['ThematicController@update', $thematic], 'method' => 'patch', 'class'=>'form-horizontal']) !!}

          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

            <div class="col-md-10">
              {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Thematic area name']) !!}

              @if ($errors->has('name'))
                <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
              @endif
            </div>

          </div>


          <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <div class="col-md-10">
              <textarea id="description" class="form-control" name="description" placeholder="A short description of this thematic area">{{ $thematic->description or ""}}</textarea>

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
