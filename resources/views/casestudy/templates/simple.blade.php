@extends('library-app')

@section('scripts')
  <script>
    $( document ).ready(function(){
      setAffixContainerSize();
    });

    $('#section-bar').affix({
        offset: {
            top: $('#section-bar').offset().top
        }
    }).on('affix.bs.affix',function(){
        setAffixContainerSize();
    });

    /*Setting the width of the section-bar minus the padding built into the section-bar */
    function setAffixContainerSize(){
        parentWidth= $('#section-bar').parent().innerWidth();
        navPadding= 60;
        $('#section-bar').width(parentWidth - navPadding);
    }

    $(window).resize(function(){
        setAffixContainerSize();
    });


  </script>
@endsection

@section('content')



<div class="container-fluid container-wide navbar-shade-shift">


  <div class="template-bar" style="background-image: url('{{ $casestudy->featured_image }}')">
    <div class="row">
      <div class="col-xs-12"><h1 class="title">{{ $casestudy->title }}</h1></div>
      <div class="col-sm-2">
        <?php /*
        <button type="button" class="btn-icon template-icon"><i class="fa fa-twitter" aria-hidden="true"></i></button>
        <button type="button" class="btn-icon template-icon"><i class="fa fa-envelope" aria-hidden="true"></i></button></i>
        <button type="button" class="btn-icon template-icon"><i class="fa fa-print" aria-hidden="true"></i></button></i>
        */ ?> &nbsp;
      </div>
      <div class="col-sm-7">
        <p class="description">{{ $casestudy->description }}</p>

        <h2>Quick Facts</h2>
        <ul class="quick-facts">
          <li>Author(s):  <span class="quick-details">{{ $casestudy->author }}</span></li>
          <li>Country:  <span class="quick-details">{{ $casestudy->listCountries() }}</span></li>
          <li>Topics:  <span class="quick-details">{{ $casestudy->listTopics() }}</span></li>
          <li>Methods:  <span class="quick-details">{{ $casestudy->listMethods() }}</span></li>
        </ul>
      </div>

    </div>

    <div id="background-anchor">&nbsp;</div>
  </div>


  <div id="template-simple" class= "template-main">

    <div class="nav-wrapper">
      <nav class="navbar navbar-default navbar-centered" id="section-bar" data-spy="affix" data-offset-top="197">

        <div class="collapse navbar-collapse" id="app-navbar-collapse">

            <ul class="nav navbar-nav">
              <li><a class="" href="#background-anchor">Background</a></li>
              <li><a class="" href="#intervention-anchor">Intervention</a></li>
              <li><a class="" href="#lessons-anchor">Lessons Learned</a></li>
              <li><a class="" href="#references-anchor">References</a></li>
            </ul>

        </div>
      </nav>
    </div>

    <?php /****** Background ******************************/ ?>

    <div id="background" class="section">
      <div class="sub-section">
        <div class="row">
          <h2>Background</h2>
        </div>
      </div>

      <div class="sub-section">
        <div class="row">
          {!! $casestudy->intro_context !!}
        </div>
      </div>

      <div id="intervention-anchor">&nbsp;</div>
    </div>



    <?php /****** Intervention ******************************/ ?>

    <div id="intervention" class="section">
      <div class="sub-section">
        <div class="row">
          <h2>Implementation of the Intervention</h2>
          {!! $casestudy->intro_nuances !!}
        </div>
      </div>

      <div id="lessons-anchor">&nbsp;</div>
    </div>



    <?php /****** Findings ******************************/ ?>

    <div id="lessons" class="section">
      <div class="sub-section">
        <div class="row">
          <h2>Lessons Learned and Key Messages</h2>
        </div>
      </div>


      @empty($casestudy->results_discuss)
            <!-- -->
      @else
          <div class="sub-section">
            <div class="row">
              {!! $casestudy->results_discuss !!}
            </div>
          </div>
      @endempty

      <div id="references-anchor">&nbsp;</div>
    </div>



    <?php /****** Referencess ******************************/ ?>


    <div id="references" class="section">
      <div class="sub-section">
        <div class="row">
          <h2>References</h2>
          {!! $casestudy->implications_challenges !!}
        </div>
      </div>
    </div>

  </div> <!-- end main -->
</div>


@endsection
