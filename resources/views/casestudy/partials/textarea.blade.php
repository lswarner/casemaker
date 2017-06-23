<div class="top-space form-group{{ $errors->has( $name ) ? ' has-error' : '' }}">

  <label for="{{ $name }}" class="col-md-12">{{ $slot }}</label>

  <div class="col-md-12">
    {!! Form::textarea( $name , null, ['class'=>'form-control', 'id'=>$name]) !!}

    @if ($errors->has('{{ $name }}'))
        <span class="help-block">
            <strong>{{ $errors->first( $name ) }}</strong>
        </span>
    @endif
  </div>
</div>
