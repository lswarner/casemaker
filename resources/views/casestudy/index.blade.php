@extends('app')


@include('casestudy.modals.delete')

@section('content')
<div class="container-fluid container-wide">
  <div class="main">


    <div class="row">
        <div class="col-md-4">
          <h1>All Case Studies</h1>
        </div>

        @include('casestudy.partials.color-key')
    </div>

    <div class="row">
      <div class="col-md-4">
        <h2 class="text-sky">In-Progress</h2>
        @foreach($created as $cs)

          @component('casestudy.partials.preview', ['cs'=>$cs]) @endcomponent

        @endforeach
      </div>

      <div class="col-md-4">
        <h2 class="text-blue">Submitted</h2>
        @foreach($submitted as $cs)

          @component('casestudy.partials.preview', ['cs'=>$cs]) @endcomponent

        @endforeach
      </div>

      <div class="col-md-4">
        <h2 class="text-dawn">Live</h2>
        @foreach($published as $cs)

          @component('casestudy.partials.preview', ['cs'=>$cs]) @endcomponent

        @endforeach
      </div>
    </div> <!-- end row -->



  </div>
</div>
@endsection
