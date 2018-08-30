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
        <button type="button" class="btn-icon template-icon"><i class="fa fa-twitter" aria-hidden="true"></i></button>
        <button type="button" class="btn-icon template-icon"><i class="fa fa-envelope" aria-hidden="true"></i></button></i>
        <button type="button" class="btn-icon template-icon"><i class="fa fa-print" aria-hidden="true"></i></button></i>
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


  <div id="template-basic" class= "template-main">

      <nav class="navbar navbar-default navbar-centered" id="section-bar" data-spy="affix" data-offset-top="197">

        <div class="collapse navbar-collapse" id="app-navbar-collapse">

            <ul class="nav navbar-nav">
              <li><a class="" href="#background-anchor">Background</a></li>
              <li><a class="" href="#intervention-anchor">Intervention</a></li>
              <li><a class="" href="#approach-anchor">IS Approach</a></li>
              <li><a class="" href="#findings-anchor">Findings</a></li>
              <li><a class="" href="#implications-anchor">Implications</a></li>
              <li><a class="" href="#references-anchor">References</a></li>
            </ul>

        </div>
      </nav>


    <?php /****** Background ******************************/ ?>

    <div id="background" class="section">
      <div class="sub-section">
        <div class="row">
          <h2>Background</h2>
        </div>
      </div>

      <div class="sub-section">
        <div class="row">

          <?php
            if( empty($casestudy->intro_acronyms) ){
              $css_details= "col-sm-12";
              $css_acronym= "hidden";
            }
            else{
                $css_details= "col-sm-5";
                $css_acronym= "col-sm-5 col-sm-offset-1";
            }
          ?>
          <div class="{{ $css_details }}">
            <div class="callout">
              <h3>Case Study Details</h3>

                {!! $casestudy->intro_tips !!}

            </div>
          </div>

          <div class="{{ $css_acronym }}">
            <div class="callout">
              <h3>Key Acronyms</h3>
              {!! $casestudy->intro_acronyms !!}
            </div>
          </div>

        </div>
      </div>

      <div class="sub-section accent3">
        <div class="row">
        @empty($casestudy->intro_objectives)
              <p>&nbsp;</p>
        @else
          <h3>Learning Objectives</h3>
          {!! $casestudy->intro_objectives !!}
        @endempty
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
          <h2>Intervention</h2>
          {!! $casestudy->intro_nuances !!}
        </div>
      </div>

      <div class="sub-section primary">
        <div class="row">
          @empty($casestudy->intro_questions)
                <p>&nbsp;</p>
          @else
                <h3>Discussion Questions</h3>
                {!! $casestudy->intro_questions !!}
          @endempty
        </div>
      </div>

      <div id="approach-anchor">&nbsp;</div>
    </div>




    <?php /****** Approach ******************************/ ?>

    <div id="approach" class="section">
      <div class="sub-section">
        <div class="row">
          <h2>Implementation Science (IS) Approach</h2>
          {!! $casestudy->method_used !!}
          {!! $casestudy->method_challenges !!}
        </div>
      </div>

      @empty($casestudy->method_partners)
        <!-- -->
      @else
          <div class="sub-section">
            <div class="row">

                <div class="col-xs-12">
                  <div class="callout">

                    <h3>Key Partners and Roles</h3>
                    {!! $casestudy->method_partners !!}

                  </div>
                </div>
            </div>
          </div>
      @endempty

      <div class="sub-section primary">
        <div class="row">
          @empty($casestudy->method_questions)
                <p>&nbsp;</p>
          @else
              <h3>Discussion Questions</h3>
              {!! $casestudy->method_questions !!}
          @endempty
        </div>
      </div>

      <div id="findings-anchor">&nbsp;</div>
    </div>





    <?php /****** Findings ******************************/ ?>

    <div id="findings" class="section">
      <div class="sub-section">
        <div class="row">
          <h2>Findings</h2>
        </div>
      </div>

      <div class="sub-section accent3">
        <div class="row">
          @empty($casestudy->results_tips)
                <p>&nbsp;</p>
          @else
              <h3>Key Results</h3>
              {!! $casestudy->results_tips !!}
          @endempty
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

      <div class="sub-section primary">
        <div class="row">
          @empty($casestudy->results_questions)
                <p>&nbsp;</p>
          @else
                <h3>Discussion Questions</h3>
                {!! $casestudy->results_questions !!}
          @endempty
        </div>
      </div>

      <div id="implications-anchor">&nbsp;</div>
    </div>


    <?php /****** Implications ******************************/ ?>

    <div id="implications" class="section">
      <div class="sub-section">
        <div class="row">
          <h2>Implications</h2>
        </div>
      </div>

      <div class="sub-section accent3">
        <div class="row">
          @empty($casestudy->implications_tips)
                <p>&nbsp;</p>
          @else
                <h3>Program and Policy Implications</h3>
                {!! $casestudy->implications_tips !!}
          @endempty
        </div>
      </div>

      @empty($casestudy->implications_discuss)
            <!-- -->
      @else
            <div class="sub-section">
              <div class="row">
                {!! $casestudy->implications_discuss !!}
              </div>
            </div>
      @endempty

      <div class="sub-section primary">
        <div class="row">
          @empty($casestudy->implications_questions)
                <p>&nbsp;</p>
          @else
                <h3>Discussion Questions</h3>
                {!! $casestudy->implications_questions !!}
        @endempty
        </div>
      </div>
    </div>



    <?php /****** Relevant Documents ******************************/ ?>

    @if($casestudy->allAttachments()->count() == 0)
          <p>&nbsp;</p>
    @else
    <div class="section">
      <div class="sub-section">
        <div class="row">
          <h2>Relevant Documents</h2>
          <ul>
          @foreach( $casestudy->allAttachments() as $a )
            <li><a href="{{ $a->url() }}" target="_blank" >{{ $a->original_name }}</a></li>
          @endforeach
        </ul>
        </div>
      </div>
    </div>
    @endif

    <div id="references-anchor">&nbsp;</div>
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
