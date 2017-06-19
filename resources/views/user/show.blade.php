@extends('app')

@section('content')
<div class="container main">
	<div class="row">
		<div class="col-md-4">
			<p><b>email:</b> {{ $user->email }}</p>
			<p><b>affiliation:</b> {{ $user->affiliation }}</p>
			<p><b>introduction:</b> {{ $user->introduction }}</p>
      @if($user->is_admin)
        <p>I'm an admin</p>
      @endif
		</div>
		<div class="col-md-4">
			<a href="{{ url('user/'.$user->id.'/edit') }}">edit account</a>
		</div>

	</div>
</div>
@endsection
