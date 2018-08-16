@extends('library-app')


@section('scripts')
  @include('scripts.masonry')
@endsection


@section('content')



<div class="container-fluid container-wide navbar-shade-shift">


<div class="welcome-bar" style="background-image: url('{{ $cms->library_splash }}')">
  <h1 class="library-title">{{ $cms->library_title }}</h1>
  <p class="lead">{{ $cms->welcome_text }}</p>
</div>

  <!-- <div class="welcome-bar" style="background-image: url('{{ \App\CMS::first()->library_splash }}')">
  <div class="welcome-bar" style="background-image: url('img/library-bg.png')">
    <div class="row clearfix">
      <div class="col-xs-12 col-lg-12">
        <div class="lead-text">Case Maker</div>
      </div>
      <div class="col-xs-12 col-lg-12">
        <p>
        Contràriament a la creença popular, Lorem Ipsum no és només text aleatori. Té les seves arrels en una peça clàssica de la literatura llatina del 45 aC, és a dir, de fa 2000 anys. Richard McClintock, un professor de llatí al Hampden-Sydney College a Virgínia, va buscar una de les paraules més estranyes del llatí, "consectetur", procedent d'un dels paràgrafs de Lorem Ipsum, i anant de citació en citació d'aquesta paraula a la literatura clàssica, en va descobrir l'orígen veritabll.
        </p>

      </div>
    </div>
  </div> <!-- end common bar -->




  <div class= "library-main">
    <nav class="navbar navbar-default" id="filter-bar">


      <div class="" id="app-filterbar-collapse">

        <ul class="nav navbar-nav">
          <div class="filter-header">FILTER BY:</div>


          <div class="btn-group">
            <div class="dropdown">
              <button id="dropdown-country" type="button" class="btn btn-urc-secondary dropdown-toggle filters-dropdown" data-value="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                All Countries <span class="caret"></span>
              </button>
              <ul class="dropdown-menu filter-menu">
                <li><a class="do_filter" data-filter="country" data-name="All Countries" data-value="" href="#">All Countries</a></li>
                
                @foreach($countries as $k => $a )
                  <li><a class="do_filter" data-filter="country" data-name="{{$a}}" data-value=".{{ strtolower($a) }}" href="#">{{$a}}</a></li>
                @endforeach


              </ul>
            </div>
          </div>

          <div class="btn-group">
            <button id="dropdown-keyword" type="button" class="btn btn-urc-secondary dropdown-toggle filters-dropdown" data-value="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              All Topics <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
              <li><a class="do_filter" data-filter="keyword" data-name="All Topics" data-value=""  href="#">All Topics</a></li>    <?php   /* "keywords" changed to "topics" in L027 */ ?>
              @foreach($keywords as $a)
                <li><a class="do_filter" data-filter="keyword" data-name="{{$a->keyword}}" data-value=".k{{$a->id}}" href="#">{{$a->keyword}}</a></li>
              @endforeach
            </ul>
          </div>

          <div class="btn-group">
            <button id="dropdown-method" type="button" class="btn btn-urc-secondary dropdown-toggle filters-dropdown" data-value="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              All Methods <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
              <li><a class="do_filter" data-filter="method" data-name="All Methods" data-value=""  href="#">All Methods</a></li>
              @foreach($methods as $a)
                <li><a class="do_filter" data-filter="method" data-name="{{$a->name}}" data-value=".m{{$a->id}}" href="#">{{$a->name}}</a></li>
              @endforeach
            </ul>
          </div>


          <?php
          /*   removed in L027
          <div class="btn-group">
            <button id="dropdown-thematic" type="button" class="btn btn-urc-secondary dropdown-toggle filters-dropdown" data-value="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              All Thematic Areas <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
              <li><a class="do_filter" data-filter="thematic" data-name="All Thematic Areas" data-value="" href="#">All Thematic Areas</a></li>
              @foreach($thematics as $a)
                <li><a class="do_filter" data-filter="thematic" data-name="{{$a->name}}" data-value=".t{{$a->id}}"  href="#">{{$a->name}}</a></li>
              @endforeach
            </ul>
          </div>


          <div class="btn-group">
            <button id="dropdown-audience" type="button" class="btn btn-urc-secondary dropdown-toggle filters-dropdown" data-value="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              All Audiences <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
              <li><a class="do_filter" data-filter="audience" data-name="All Audiences" data-value="" href="#">All Audiences</a></li>
              @foreach($audiences as $a)
                <li><a class="do_filter" data-filter="audience" data-name="{{$a->name}}" data-value=".a{{$a->id}}"  href="#">{{$a->name}}</a></li>
              @endforeach
            </ul>
          </div>
          */ ?>




        </ul>
      </div>
    </nav>

    <div class="row">
        <div class="grid">
          <div class="grid-sizer"></div>

        <?php for($q=0; $q <3; $q++){ ?>
        @foreach($casestudies as $c)
          <?php
            usleep(200);
            $image= "img/stock/".mt_rand(1,10).'.jpeg';
          ?>


          <div class="grid-item <?= $c->filters(); ?>" >
            <a href="#">
              <div class="hovereffect">
                <img src="{{$image}}" class="img-responsive"/>
                <div class="overlay">
                  &nbsp; <!-- -->
                </div>
              </div>
              <div class="cs-item-information">
                <h3>{{ $c->title }}</h3>
                <div class="row">
                  <div class="col-xs-4 col-sm-5 col-md-4 cs-item-title">Countries:</div><div class="col-xs-8 col-sm-7 col-md-8 cs-item-details">{{ $c->listCountries() }}</div>
                </div>
                <div class="row">
                  <div class="col-xs-4 col-sm-5 col-md-4 cs-item-title">Topics:</div><div class="col-xs-8 col-sm-7 col-md-8 cs-item-details">{{ $c->listTopics() }}</div>
                </div>
                <div class="row">
                  <div class="col-xs-4 col-sm-5 col-md-4 cs-item-title">Methods:</div><div class="col-xs-8 col-sm-7 col-md-8 cs-item-details">{{ $c->listMethods() }}</div>
                </div>
              </div>
            </a>
          </div>


        @endforeach
        <?php } ?>

      </div> <!-- end grid -->
    </div> <!-- end row -->

  </div> <!-- end main -->
</div>


@endsection
