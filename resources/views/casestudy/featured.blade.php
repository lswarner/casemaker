@extends('app')


@section('scripts')
	@include('scripts.file-upload')
@endsection


@section('content')
<div class="container-fluid container-wide">
  <div class="main">

		<div class="row">
			<div class="col-md-6 col-md-offset-3 col-xs-12">
			@if ( !empty($casestudy->featured_image) )
				<h4>Current image:</h4>
				<img src="{{ url($casestudy->featured_image) }}" class="img-responsive current-photo" />
			@else
				<h4>Your case study doesn't have a featured image.</h4>
			@endif
					<h2 class="hidden-xs hidden-sm" >&nbsp;</h2>

					<h4>Upload a new featured image:</h4>

					{!! Form::model( $casestudy, ['action'=>['CaseStudyController@update_featured', $casestudy], 'enctype'=>'multipart/form-data', 'class'=>'form-horizontal']) !!}
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
