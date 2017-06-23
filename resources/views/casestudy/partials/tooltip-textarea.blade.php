<div class="top-space form-group{{ $errors->has( $name ) ? ' has-error' : '' }}">

  <label for="{{ $name }}" class="col-md-12">{{ $slot }}</label>&nbsp;<button type="button" class="btn btn-default" aria-label="Left Align">
    <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
  </button>
  

  <div class="col-md-12">
    {!! Form::textarea( $name , null, ['class'=>'form-control', 'id'=>$name]) !!}

    @if ($errors->has('{{ $name }}'))
        <span class="help-block">
            <strong>{{ $errors->first( $name ) }}</strong>
        </span>
    @endif
  </div>
</div>
