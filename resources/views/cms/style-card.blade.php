
<div class="col-md-6">
    <div class="well shadow-depth-3">
      <div class="row">
        <div class="col-md-4 col-sm-6">
          <h3>{{ $slot }}</h3>
          <div class="form-group{{ $errors->has( $name.'-bg' ) ? ' has-error' : '' }}">
            <label for="{{ $name.'-bg' }}" class="col-xs-3 control-label">color: </label>

            <div class="col-xs-9">
              {!! Form::text( $name.'-bg' , null, ['class'=>'form-control', 'id'=>$name.'-bg']) !!}

              @if ($errors->has('{{ $name."-bg" }}'))
                  <span class="help-block">
                      <strong>{{ $errors->first( $name.'-bg' ) }}</strong>
                  </span>
              @endif
            </div>
          </div>

          <div class="form-group{{ $errors->has( $name.'-text' ) ? ' has-error' : '' }}">
            <label for="{{ $name.'-text'  }}" class="col-xs-3 control-label">text: </label>

            <div class="col-xs-9">
              {!! Form::text( $name.'-text' , null, ['class'=>'form-control', 'id'=>$name.'-text']) !!}

              @if ($errors->has('{{ $name."-text" }}'))
                  <span class="help-block">
                      <strong>{{ $errors->first( $name."-text" ) }}</strong>
                  </span>
              @endif
            </div>
          </div>
        </div>

        <div class="col-md-4 col-sm-6">
          <h3>{{ $slot }} hover</h3>
          <div class="form-group{{ $errors->has( $name.'-bg' ) ? ' has-error' : '' }}">
            <label for="{{ $name.'-bg' }}" class="col-xs-3 control-label">color: </label>

            <div class="col-xs-9">
              {!! Form::text( $name.'-bg' , null, ['class'=>'form-control', 'id'=>$name.'-bg']) !!}

              @if ($errors->has('{{ $name."-bg" }}'))
                  <span class="help-block">
                      <strong>{{ $errors->first( $name.'-bg' ) }}</strong>
                  </span>
              @endif
            </div>
          </div>

          <div class="form-group{{ $errors->has( $name.'-text' ) ? ' has-error' : '' }}">
            <label for="{{ $name.'-text'  }}" class="col-xs-3 control-label">text: </label>

            <div class="col-xs-9">
              {!! Form::text( $name.'-text' , null, ['class'=>'form-control', 'id'=>$name.'-text']) !!}

              @if ($errors->has('{{ $name."-text" }}'))
                  <span class="help-block">
                      <strong>{{ $errors->first( $name."-text" ) }}</strong>
                  </span>
              @endif
            </div>
          </div>
        </div>


        <div class="col-md-4 col-sm-12">
          <h3>&nbsp;</h3>
          <a class="btn btn-urc-{{$name}} btn-demo" href="#">{{ $slot }}</a>
        </div>

      </div>
    </div>
</div>
