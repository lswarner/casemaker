@extends('app')


@section('scripts')
	@include('scripts.file-upload')
@endsection


@section('content')
<div class="container-fluid container-wide">
  <div class="main">

		<div class="row">
			<div class="col-md-6 col-md-offset-3 col-xs-12">
			@if ( !empty($image) )
				<h4>Current image:</h4>
				<img src="{{ url($image) }}" class="img-responsive current-photo" />
			@else
				<h4>You currently dont have a logo</h4>
			@endif
					<h2 class="hidden-xs hidden-sm" >&nbsp;</h2>

					<h4>Upload a new image:</h4>

					{!! Form::model( $cms, ['action'=>['CMSController@update_image', $field], 'enctype'=>'multipart/form-data', 'class'=>'form-horizontal']) !!}
					<div class="col-md-8">
						@if ($errors->has('attachment'))
								<span class="flash-danger">
										<strong>{{ $errors->first('attachment') }}</strong>
								</span>
						@endif
						 <div class="input-group input-group-ub">

								<span class="input-group-btn">
										<span class="btn btn-ub btn-file primary-text">
												Click here to attach&hellip; <input type="file" name="attachment"></input>
										</span>
								</span>
								<input type="text" class="form-control" readonly />
							</div>
					</div>
					<div class="col-md-4">
							<span class="input-group-btn">
								{!! Form::submit('Upload Image', ['class' => 'btn btn-urc-primary btn-attach invisible']) !!}
							</span>
					</div>

						{!! Form::close() !!}
				</div>
		</div>
	</div>
</div>
@endsection
