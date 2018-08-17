<?php $instructions= $casestudy->instructions(); ?>



<!-- Introduction Section -->
<div class="review-section well shadow-depth-3">
    <div class="row">

      <div class="col-md-4">
        <a class="section-header" data-toggle="collapse" href="#introduction" aria-expanded="false" aria-controls="introduction"><h2 class="section-header">Background</h2></a>
      </div>
      <div class="col-md-8">
        <a class="pull-right" data-toggle="collapse" href="#introduction" aria-expanded="false" aria-controls="introduction"><i class="fa fa-caret-down fa-2x"></i></a>
      </div>


      <div class="col-xs-12 collapse" id="introduction">
          <!-- start of narrative section -->
          <div id="narrative" class="col-md-7 col-md-push-5   col-lg-8 col-lg-push-4">

              @component('casestudy.partials.review-text', ['content'=>$casestudy->intro_context])
                <?= $instructions->introh1; ?>
              @endcomponent


              @component('casestudy.partials.review-text', ['content'=>$casestudy->intro_nuances])
                <?= $instructions->introh2; ?>
              @endcomponent

              @component('casestudy.partials.uploaded-files', ['attachments'=>$attachments["introduction"]])
              @endcomponent

          </div> <!-- end narative collumn -->

          <!-- start of sidebar section -->
          <div id="sidebar" class="col-md-5 col-md-pull-7  col-lg-4 col-lg-pull-8">

              @component('casestudy.partials.review-tooltip', ['content'=> $casestudy->intro_tips])
                @slot('tooltip')
                  <?= $instructions->tooltip11; ?>
                @endslot

                <?= $instructions->tooltip11h; ?>
              @endcomponent


              @component('casestudy.partials.review-tooltip', ['content'=> $casestudy->intro_acronyms])
                @slot('tooltip')
                  <?= $instructions->tooltip12; ?>
                @endslot

                <?= $instructions->tooltip12h; ?>
              @endcomponent


              @component('casestudy.partials.review-tooltip', ['content'=> $casestudy->intro_objectives])
                @slot('tooltip')
                  <?= $instructions->tooltip13; ?>
                @endslot

                <?= $instructions->tooltip13h; ?>
              @endcomponent


              @component('casestudy.partials.review-tooltip', ['content'=> $casestudy->implications_questions])
                @slot('tooltip')
                  <?= $instructions->tooltip14; ?>
                @endslot

                <?= $instructions->tooltip14h; ?>
              @endcomponent


          </div> <!-- end of sidebar -->
      </div>
  </div>

</div>


<!-- Methodology Section -->
<div class="review-section well shadow-depth-3">
    <div class="row">

      <div class="col-md-4">
          <a class="section-header" data-toggle="collapse" href="#methodology" aria-expanded="false" aria-controls="methodology"><h2 class="section-header">Implementation Science Approach</h2></a>
      </div>
      <div class="col-md-8">
        <a class="pull-right" data-toggle="collapse" href="#methodology" aria-expanded="false" aria-controls="methodology"><i class="fa fa-caret-down fa-2x"></i></a>
      </div>


      <div class="col-xs-12 collapse" id="methodology">
          <!-- start of narrative section -->
          <div id="narrative" class="col-md-7 col-md-push-5   col-lg-8 col-lg-push-4">

              @component('casestudy.partials.review-text', ['content'=>$casestudy->method_used])
                <?= $instructions->methodh1; ?>
              @endcomponent


              @component('casestudy.partials.review-text', ['content'=>$casestudy->method_challenges])
                <?= $instructions->methodh2; ?>
              @endcomponent

              @component('casestudy.partials.uploaded-files', ['attachments'=>$attachments["methodology"]])
              @endcomponent

          </div> <!-- end narative collumn -->

          <!-- start of sidebar section -->
          <div id="sidebar" class="col-md-5 col-md-pull-7  col-lg-4 col-lg-pull-8">

              @component('casestudy.partials.review-tooltip', ['content'=> $casestudy->method_tips])
                @slot('tooltip')
                  <?= $instructions->tooltip21; ?>
                @endslot

                <?= $instructions->tooltip21h; ?>
              @endcomponent


              @component('casestudy.partials.review-tooltip', ['content'=> $casestudy->method_partners])
                @slot('tooltip')
                  <?= $instructions->tooltip22; ?>
                @endslot

                <?= $instructions->tooltip22h; ?>
              @endcomponent

              @component('casestudy.partials.review-tooltip', ['content'=> $casestudy->method_questions])
                @slot('tooltip')
                  <?= $instructions->tooltip23; ?>
                @endslot

                <?= $instructions->tooltip23h; ?>
              @endcomponent


          </div> <!-- end of sidebar -->
      </div>
    </div>

</div>



<!-- Results Section -->
<div class="review-section well shadow-depth-3">
    <div class="row">

      <div class="col-md-4">
          <a class="section-header" data-toggle="collapse" href="#results" aria-expanded="false" aria-controls="results"><h2 class="section-header">Findings</h2></a>
      </div>
      <div class="col-md-8">
        <a class="pull-right" data-toggle="collapse" href="#results" aria-expanded="false" aria-controls="results"><i class="fa fa-caret-down fa-2x"></i></a>
      </div>


      <div class="col-xs-12 collapse" id="results">
          <!-- start of narrative section -->
          <div id="narrative" class="col-md-7 col-md-push-5   col-lg-8 col-lg-push-4">

            @component('casestudy.partials.review-text', ['content'=>$casestudy->results_discuss])
              <?= $instructions->resultsh1; ?>
            @endcomponent

            @component('casestudy.partials.uploaded-files', ['attachments'=>$attachments["results"]])
            @endcomponent

          </div> <!-- end narative collumn -->

          <!-- start of sidebar section -->
          <div id="sidebar" class="col-md-5 col-md-pull-7  col-lg-4 col-lg-pull-8">

              @component('casestudy.partials.review-tooltip', ['content'=> $casestudy->results_tips])
                @slot('tooltip')
                  <?= $instructions->tooltip31; ?>
                @endslot

                <?= $instructions->tooltip31h; ?>
              @endcomponent

              @component('casestudy.partials.review-tooltip', ['content'=> $casestudy->results_questions])
                @slot('tooltip')
                  <?= $instructions->tooltip32; ?>
                @endslot

                <?= $instructions->tooltip32h; ?>
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
                <?= $instructions->implicationsh1; ?>
              @endcomponent


              @component('casestudy.partials.review-text', ['content'=>$casestudy->implications_challenges])
                <?= $instructions->implicationsh2; ?>
              @endcomponent


              @component('casestudy.partials.uploaded-files', ['attachments'=>$attachments["implications"]])
              @endcomponent

          </div> <!-- end narative collumn -->

          <!-- start of sidebar section -->
          <div id="sidebar" class="col-md-5 col-md-pull-7  col-lg-4 col-lg-pull-8">

              @component('casestudy.partials.review-tooltip', ['content'=> $casestudy->implications_tips])
                @slot('tooltip')
                  <?= $instructions->tooltip41; ?>
                @endslot

                <?= $instructions->tooltip41h; ?>
              @endcomponent

              @component('casestudy.partials.review-tooltip', ['content'=> $casestudy->implications_questions])
                @slot('tooltip')
                  <?= $instructions->tooltip42; ?>
                @endslot

                <?= $instructions->tooltip42h; ?>
              @endcomponent


          </div> <!-- end of sidebar -->
      </div>
    </div>

</div>
