

      <div class="row">
        <a class="btn btn-urc-{{$name}} btn-demo" href="#">{{ $slot }}</a>
        <div class="col-md-6 col-sm-6">
          <div class="form-group{{ $errors->has( $name.'-bg' ) ? ' has-error' : '' }}">
            <label for="{{ $name.'-bg' }}" class="col-xs-4 control-label">color: </label>

            <div class="col-xs-6">
              {!! Form::text( $name.'-bg' , null, ['class'=>'form-control', 'id'=>$name.'-bg']) !!}

              @if ($errors->has('{{ $name."-bg" }}'))
                  <span class="help-block">
                      <strong>{{ $errors->first( $name.'-bg' ) }}</strong>
                  </span>
              @endif
            </div>
          </div>

          <div class="form-group{{ $errors->has( $name.'-text' ) ? ' has-error' : '' }}">
            <label for="{{ $name.'-text'  }}" class="col-xs-4 control-label">text: </label>

            <div class="col-xs-6">
              {!! Form::text( $name.'-text' , null, ['class'=>'form-control', 'id'=>$name.'-text']) !!}

              @if ($errors->has('{{ $name."-text" }}'))
                  <span class="help-block">
                      <strong>{{ $errors->first( $name."-text" ) }}</strong>
                  </span>
              @endif
            </div>
          </div>
        </div>

        <div class="col-md-6 col-sm-6">
          <div class="form-group{{ $errors->has( $name.'-hover-bg' ) ? ' has-error' : '' }}">
            <label for="{{ $name.'-hover-bg' }}" class="col-xs-5 control-label">hover color: </label>

            <div class="col-xs-6">
              {!! Form::text( $name.'-hover-bg' , null, ['class'=>'form-control', 'id'=>$name.'-hover-bg']) !!}

              @if ($errors->has('{{ $name."-hover-bg" }}'))
                  <span class="help-block">
                      <strong>{{ $errors->first( $name.'-hover-bg' ) }}</strong>
                  </span>
              @endif
            </div>
          </div>

          <div class="form-group{{ $errors->has( $name.'-hover-text' ) ? ' has-error' : '' }}">
            <label for="{{ $name.'-hover-text'  }}" class="col-xs-5 control-label">hover text: </label>

            <div class="col-xs-6">
              {!! Form::text( $name.'-hover-text' , null, ['class'=>'form-control', 'id'=>$name.'-hover-text']) !!}

              @if ($errors->has('{{ $name."-hover-text" }}'))
                  <span class="help-block">
                      <strong>{{ $errors->first( $name."-hover-text" ) }}</strong>
                  </span>
              @endif
            </div>
          </div>
        </div>
        <hr>
      </div>
