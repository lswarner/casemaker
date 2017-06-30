@extends('app')

@section('content')
<div class="container-fluid container-wide">
  <div class="main">


    <div class="row">
        <div class="col-md-4">
          <h1>Accounts</h1>
        </div>
        <div class="col-md-2">
          <div class="text-right" style="margin-top:16px;">Color key:</div>
        </div>
        <div class="col-md-2">
          <div class="dawn" style="padding:10px; text-align: center;">Pending</div>
        </div>
        <div class="col-md-2">
          <div class="blue" style="padding:10px; text-align: center;">Members</div>
        </div>
        <div class="col-md-2">
          <div class="sunset" style="padding:10px; text-align: center;">Admins</div>
        </div>
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
