@extends('app')

@section('css')
  <!-- include summernote css/js-->
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">

  <link href="{{ asset('css/casestudy-style.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid container-wide">

  @include('casestudy.partials.common-bar')

  @include('casestudy.partials.progress-bar')

  <div class="main">

    @yield('casestudy-page')

  </div>
</div>

@endsection
