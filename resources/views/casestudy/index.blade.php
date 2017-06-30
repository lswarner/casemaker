@extends('app')

@section('content')
<div class="container-fluid container-wide">
  <div class="main">


    <div class="row">
        <div class="col-md-4">
          <h1>All Case Studies</h1>
        </div>

        <div class="col-md-2">
          <div class="text-right" style="margin-top:16px;">Color key:</div>
        </div>
        <div class="col-md-2">
          <div class="sky" style="padding:10px; text-align: center;">In Progress</div>
        </div>
        <div class="col-md-2">
          <div class="blue" style="padding:10px; text-align: center;">Submitted</div>
        </div>
        <div class="col-md-2">
          <div class="dawn" style="padding:10px; text-align: center;">Live</div>
        </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <h2>In-Progress</h2>
        @foreach($created as $cs)

          @component('casestudy.partials.preview', ['cs'=>$cs]) @endcomponent

        @endforeach
      </div>

      <div class="col-md-4">
        <h2>Submitted</h2>
        @foreach($submitted as $cs)

          @component('casestudy.partials.preview', ['cs'=>$cs]) @endcomponent

        @endforeach
      </div>

      <div class="col-md-4">
        <h2>Published</h2>
        @foreach($published as $cs)

          @component('casestudy.partials.preview', ['cs'=>$cs]) @endcomponent

        @endforeach
      </div>
    </div> <!-- end row -->



  </div>
</div>
@endsection
