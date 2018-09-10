@extends('library-app')


@section('scripts')
  @include('scripts.masonry')
@endsection


@section('content')



<div class="container-fluid container-wide navbar-shade-shift">


<div class="welcome-bar" style="background-image: url( '{{ asset($cms->library_splash) }}')">
  <h1 class="library-title">About the {{ $cms->library_title }}</h1>
</div>


  <div class= "main">
    <div class="col-md-10 col-md-offset-1">{{ $cms->about_text }}</div>
  </div> <!-- end main -->
</div>


@endsection
