<div class="well shadow-depth-3">
  <div class=" form-group{{ $errors->has( $name ) ? ' has-error' : '' }}">

    <label for="{{ $name }}" class="col-md-12">
      {{ $slot }}
      <a href="javascript://" class="casestudy-tooltip">
        <span class="fa fa-info-circle" data-toggle="popover" data-content="{{ $tooltip }}" data-placement="top"></span>
      </a>
    </label>



    <div class="col-md-12">
      {!! Form::textarea( $name , null, ['class'=>'form-control', 'id'=>$name]) !!}

      @if ($errors->has('{{ $name }}'))
          <span class="help-block">
              <strong>{{ $errors->first( $name ) }}</strong>
          </span>
      @endif
    </div>
  </div>
</div>
