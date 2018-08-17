@extends('app')

@section('content')
<div class="container-fluid container-wide">
  <div class="main">

    <div class="row">
      <div class="col-md-6">
        <h2>CaseStudies with topic "{{ $keyword->keyword }}"</h2>
        @forelse($casestudies as $cs)
          <a href="{{ route('background', $cs) }}" class="btn btn-urc">{{ $cs->title or "Case Study Title"}}</a>
        @empty
          <p>No case studies use this topic</p>
        @endforelse

      </div>
      <div class="col-md-6">
        <h2>Edit Topic</h2>

        {!! Form::model($keyword, ['action'=>['KeywordController@update', $keyword], 'method' => 'patch', 'class'=>'form-horizontal']) !!}

          <div class="form-group{{ $errors->has('keyword') ? ' has-error' : '' }}">

            <div class="col-md-10">
              {!! Form::text('keyword', null, ['class'=>'form-control', 'placeholder'=>'Topic']) !!}

              @if ($errors->has('keyword'))
                <span class="help-block">
                  <strong>{{ $errors->first('keyword') }}</strong>
                </span>
              @endif
            </div>

          </div>


          <div class="form-group">
            <div class="col-md-10">
              {!! Form::submit('Update Topic', ['class'=>'btn btn-urc']); !!}
            </div>
          </div>

        {!! Form::close() !!}

      </div>
    </div>
  </div>
</div>

@endsection
