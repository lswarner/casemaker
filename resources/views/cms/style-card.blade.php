<div class="row">
  <div class="col-md-12 col-sm-12">
    <div class="form-group{{ $errors->has( $name ) ? ' has-error' : '' }}">
      <label for="{{ $name }}" class="col-xs-4 control-label">{{ $name }}: </label>

      <div class="col-xs-6">
        {!! Form::text( $name , null, ['class'=>'form-control', 'id'=>$name]) !!}

        @if ($errors->has('{{ $name }}'))
            <span class="help-block">
                <strong>{{ $errors->first( $name ) }}</strong>
            </span>
        @endif
      </div>
    </div>
  </div>
</div>
