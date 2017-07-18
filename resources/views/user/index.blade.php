@extends('app')

@section('content')
<div class="container-fluid container-wide">
  <div class="main">


    <div class="row">
        <div class="col-md-4">
          <h1>Accounts</h1>
        </div>

        @include('user.partials.color-key')

    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="row">
          @php $initial=""; @endphp
          @foreach($users as $u)

          <?php /*************************/
          if( $initial != $u->lastInitial() ){
            $initial= $u->lastInitial(); ?>
        </div>

        <div class="row">
          <h3>{{$initial}}</h3> <?php
          } /*****************************/ ?>


          <div class="col-md-4">
            @component('user.partials.preview', ['u'=>$u]) @endcomponent
          </div>
          @endforeach

        </div>
      </div>
    </div> <!-- end row -->

  </div>
</div>
@endsection
