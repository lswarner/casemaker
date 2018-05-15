@extends('library-app')

@section('scripts')
  @include('scripts.masonry')
@endsection


@section('content')



<div class="container-fluid container-wide">


  <div class="common-bar">
    <div class="row">
      <span class="lead-text">Welcome</span>
Contràriament a la creença popular, Lorem Ipsum no és només text aleatori. Té les seves arrels en una peça clàssica de la literatura llatina del 45 aC, és a dir, de fa 2000 anys. Richard McClintock, un professor de llatí al Hampden-Sydney College a Virgínia, va buscar una de les paraules més estranyes del llatí, "consectetur", procedent d'un dels paràgrafs de Lorem Ipsum, i anant de citació en citació d'aquesta paraula a la literatura clàssica, en va descobrir l'orígen veritable. Lorem ipsum procedeix de les seccions 1.10.32 i 1.10.33 de "De Finibus Bonorum et Malorum" (Sobre el Bé i el Mal) de Ciceró, escrit l'any 45 aC. Aquest llibre és un tractat sobre la teoria de l'ètica, molt popular durant el Renaixement. La primera línia de Lorem Ipsum, "Lorem ipsum dolor sit amet..", prové d'una línia a la secció 1.10.32.

i vols fer servir un passatge de Lorem Ipsum, has d'estar segur que no hi haurà res comprometedor amagat en el text. Tots els generadors de Lorem ipsum a Internet tendeixen a repetir un tros determinat tantes vegades com calgui, i això fa que aquest sigui el primer generador real a Internet.
    </div>
  </div> <!-- end common bar -->

  <nav class="navbar navbar-default navbar-centered" id="progress-bar">

    <div class="collapse navbar-collapse" >

      <ul class="nav navbar-nav">
      <div class="btn-group">

        <button type="button" class="btn btn-urc-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Countries <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
          <li><a href="#">Bangladesh</a></li>
          <li><a href="#">Paraguay</a></li>
          <li><a href="#">Tanzania</a></li>
          <li><a href="#">Burundi</a></li>
        </ul>
      </div>

      <div class="btn-group">
        <button type="button" class="btn btn-urc-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Methods <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
          @foreach($method_suggestions as $m)
            <li><a href="#">{{$m->name}}</a></li>
          @endforeach
        </ul>
      </div>
    </ul>
    </div>
  </nav>


  <div class= "main">
    <div class="row">
        <div class="grid">
          <div class="grid-sizer"></div>
        @foreach($casestudies as $c)
          <div class="grid-item ">
            {{ $c->title }}
            {{ $c-> countries }}
          </div>


        @endforeach

      </div> <!-- end grid -->
    </div> <!-- end row -->

  </div> <!-- end main -->
</div>


@endsection
