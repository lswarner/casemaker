@extends('app')

@section('content')
<div class="container-fluid container-wide">
  <div class="main">

    <div class="row">
      <div class="col-md-6">
        <h2>Update Instructions</h2>


        {!! Form::model($instructions, ['action'=>['InstructionsController@update'], 'method' => 'patch', 'class'=>'form-horizontal']) !!}

          <div class="form-group">

            <div class="col-md-10">
              {!! Form::text('intro0', null, ['class'=>'form-control', 'placeholder'=>'initial instructions']) !!}

            </div>

          </div>

          <div class="form-group">
            <div class="col-md-10">
              {!! Form::text('introh1', null, ['class'=>'form-control', 'placeholder'=>'Content Box Header 1']) !!}
              <textarea id="intro1" class="form-control" name="intro1" placeholder="Instructions for content box 1">
                {{ $method->intro1 or ""}}
              </textarea>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-10">
              {!! Form::text('introh2', null, ['class'=>'form-control', 'placeholder'=>'Content Box Header 2']) !!}
              <textarea id="intro2" class="form-control" name="intro2" placeholder="Instructions for content box 2">
                {{ $method->intro2 or ""}}
              </textarea>
            </div>
          </div>



          <div class="form-group">
            <div class="col-md-10">
              {!! Form::submit('Save Instructions', ['class'=>'btn btn-urc']); !!}
            </div>
          </div>

        {!! Form::close() !!}

      </div>
    </div>
  </div>
</div>

@endsection
