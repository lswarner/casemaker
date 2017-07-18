<!-- Introduction Section -->
<div class="review-section well shadow-depth-3">
    <div class="row">

      <div class="col-md-4">
        <a class="section-header" data-toggle="collapse" href="#introduction" aria-expanded="false" aria-controls="introduction"><h2 class="section-header">Introduction</h2></a>
      </div>
      <div class="col-md-8">
        <a class="pull-right" data-toggle="collapse" href="#introduction" aria-expanded="false" aria-controls="introduction"><i class="fa fa-caret-down fa-2x"></i></a>
      </div>


      <div class="col-xs-12 collapse" id="introduction">
          <!-- start of narrative section -->
          <div id="narrative" class="col-md-7 col-md-push-5   col-lg-8 col-lg-push-4">

              @component('casestudy.partials.review-text', ['content'=>$casestudy->intro_context])
                Provide any relevant contextual information.
              @endcomponent


              @component('casestudy.partials.review-text', ['content'=>$casestudy->intro_nuances])
                Explain any cultural nuances and/or complexities that were unique to your research.
              @endcomponent


          </div> <!-- end narative collumn -->

          <!-- start of sidebar section -->
          <div id="sidebar" class="col-md-5 col-md-pull-7  col-lg-4 col-lg-pull-8">

              @component('casestudy.partials.review-tooltip', ['content'=> $casestudy->intro_tips])
                @slot('tooltip')
                  This tooltip gives you a little more information about this section.
                @endslot

                Tips
              @endcomponent


              @component('casestudy.partials.review-tooltip', ['content'=> $casestudy->intro_acronyms])
                @slot('tooltip')
                  This tooltip gives you a little more information about this section.
                @endslot

                Key Acronyms
              @endcomponent


              @component('casestudy.partials.review-tooltip', ['content'=> $casestudy->intro_objectives])
                @slot('tooltip')
                  This tooltip gives you a little more information about this section.
                @endslot

                Learning Objectives
              @endcomponent


              @component('casestudy.partials.review-tooltip', ['content'=> $casestudy->implications_questions])
                @slot('tooltip')
                  This tooltip gives you a little more information about this section.
                @endslot

                Discussion Questions
              @endcomponent


          </div> <!-- end of sidebar -->
      </div>
  </div>

</div>


<!-- Methodology Section -->
<div class="review-section well shadow-depth-3">
    <div class="row">

      <div class="col-md-4">
          <a class="section-header" data-toggle="collapse" href="#methodology" aria-expanded="false" aria-controls="methodology"><h2 class="section-header">Methodology</h2></a>
      </div>
      <div class="col-md-8">
        <a class="pull-right" data-toggle="collapse" href="#methodology" aria-expanded="false" aria-controls="methodology"><i class="fa fa-caret-down fa-2x"></i></a>
      </div>


      <div class="col-xs-12 collapse" id="methodology">
          <!-- start of narrative section -->
          <div id="narrative" class="col-md-7 col-md-push-5   col-lg-8 col-lg-push-4">

              @component('casestudy.partials.review-text', ['content'=>$casestudy->method_used])
                Discuss the methods of this case study.
              @endcomponent


              @component('casestudy.partials.review-text', ['content'=>$casestudy->method_challenges])
                Discuss any challenges and how you overcame them.
              @endcomponent


          </div> <!-- end narative collumn -->

          <!-- start of sidebar section -->
          <div id="sidebar" class="col-md-5 col-md-pull-7  col-lg-4 col-lg-pull-8">

              @component('casestudy.partials.review-tooltip', ['content'=> $casestudy->method_tips])
                @slot('tooltip')
                  This tooltip gives you a little more information about this section.
                @endslot

                Tips
              @endcomponent


              @component('casestudy.partials.review-tooltip', ['content'=> $casestudy->method_partners])
                @slot('tooltip')
                  This tooltip gives you a little more information about this section.
                @endslot

                Key Partners and their Roles
              @endcomponent

              @component('casestudy.partials.review-tooltip', ['content'=> $casestudy->method_questions])
                @slot('tooltip')
                  This tooltip gives you a little more information about this section.
                @endslot

                Discussion Questions
              @endcomponent


          </div> <!-- end of sidebar -->
      </div>
    </div>

</div>



<!-- Results Section -->
<div class="review-section well shadow-depth-3">
    <div class="row">

      <div class="col-md-4">
          <a class="section-header" data-toggle="collapse" href="#results" aria-expanded="false" aria-controls="results"><h2 class="section-header">Results</h2></a>
      </div>
      <div class="col-md-8">
        <a class="pull-right" data-toggle="collapse" href="#results" aria-expanded="false" aria-controls="results"><i class="fa fa-caret-down fa-2x"></i></a>
      </div>


      <div class="col-xs-12 collapse" id="results">
          <!-- start of narrative section -->
          <div id="narrative" class="col-md-7 col-md-push-5   col-lg-8 col-lg-push-4">

            @component('casestudy.partials.review-text', ['content'=>$casestudy->results_discuss])
              Discuss the results of this case study.
            @endcomponent


            @component('casestudy.partials.review-text', ['content'=>$casestudy->results_challenges])
              Discuss any challenges and how you overcame them.
            @endcomponent


          </div> <!-- end narative collumn -->

          <!-- start of sidebar section -->
          <div id="sidebar" class="col-md-5 col-md-pull-7  col-lg-4 col-lg-pull-8">

              @component('casestudy.partials.review-tooltip', ['content'=> $casestudy->results_tips])
                @slot('tooltip')
                  This tooltip gives you a little more information about this section.
                @endslot

                Tips
              @endcomponent

              @component('casestudy.partials.review-tooltip', ['content'=> $casestudy->results_questions])
                @slot('tooltip')
                  This tooltip gives you a little more information about this section.
                @endslot

                Discussion Questions
              @endcomponent


          </div> <!-- end of sidebar -->
      </div>
    </div>

    </div>



    <!-- Implications Section -->
    <div class="review-section well shadow-depth-3">
    <div class="row">

      <div class="col-md-4">
          <a class="section-header" data-toggle="collapse" href="#implications" aria-expanded="false" aria-controls="implications"><h2 class="section-header">Implications</h2></a>
      </div>
      <div class="col-md-8">
        <a class="pull-right" data-toggle="collapse" href="#implications" aria-expanded="false" aria-controls="implications"><i class="fa fa-caret-down fa-2x"></i></a>
      </div>


      <div class="col-xs-12 collapse" id="implications">
          <!-- start of narrative section -->
          <div id="narrative" class="col-md-7 col-md-push-5   col-lg-8 col-lg-push-4">

              @component('casestudy.partials.review-text', ['content'=>$casestudy->implications_discuss])
                Discuss the implications of this case study.
              @endcomponent


              @component('casestudy.partials.review-text', ['content'=>$casestudy->implications_challenges])
                Discuss any challenges and how you overcame them.
              @endcomponent


          </div> <!-- end narative collumn -->

          <!-- start of sidebar section -->
          <div id="sidebar" class="col-md-5 col-md-pull-7  col-lg-4 col-lg-pull-8">

              @component('casestudy.partials.review-tooltip', ['content'=> $casestudy->implications_tips])
                @slot('tooltip')
                  This tooltip gives you a little more information about this section.
                @endslot

                Tips
              @endcomponent

              @component('casestudy.partials.review-tooltip', ['content'=> $casestudy->implications_questions])
                @slot('tooltip')
                  This tooltip gives you a little more information about this section.
                @endslot

                Discussion Questions
              @endcomponent


          </div> <!-- end of sidebar -->
      </div>
    </div>

</div>
