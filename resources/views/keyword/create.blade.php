@extends('app')

@section('content')
<div class="container-fluid container-wide">
  <div class="main">

    <div class="row">
      <div class="col-md-6">
        <h2>Keywords</h2>
        @forelse($keywords as $k)
          <a href="{{ route('keyword.edit', $k) }}" class="btn btn-urc">{{ $k->keyword or "keyword name"}}</a>
        @empty
          <p>There are no keywords</p>
        @endforelse

      </div>
      <div class="col-md-6">
        <h2>Create Keyword</h2>

        {!! Form::open( ['action'=>['KeywordController@store'], 'method' => 'post', 'class'=>'form-horizontal']) !!}

          <div class="form-group{{ $errors->has('keyword') ? ' has-error' : '' }}">

            <div class="col-md-10">
              {!! Form::text('keyword', null, ['class'=>'form-control', 'placeholder'=>'Keyword']) !!}

              @if ($errors->has('keyword'))
                <span class="help-block">
                  <strong>{{ $errors->first('keyword') }}</strong>
                </span>
              @endif
            </div>

          </div>


          <div class="form-group">
            <div class="col-md-10">
              {!! Form::submit('Save Keyword', ['class'=>'btn btn-urc']); !!}
            </div>
          </div>

        {!! Form::close() !!}

      </div>
    </div>
  </div>
</div>

@endsection
