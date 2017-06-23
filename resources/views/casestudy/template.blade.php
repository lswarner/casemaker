@extends('app')

@section('css')
  <link href="{{ asset('css/casestudy-style.css') }}" rel="stylesheet">
  <!-- include summernote css/js-->
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid container-wide">
  <div class="main">

    @yield('casestudy-page')

  </div>
</div>

@endsection
