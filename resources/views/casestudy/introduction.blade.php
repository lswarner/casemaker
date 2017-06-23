@extends('app')

@section('css')
  <!-- include summernote css/js-->
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
@endsection

@section('scripts')
  <?php
    $boxes = []
  ?>
  @include('scripts.summernote', ['boxes' => [ 'intro_context', 'intro_nuances' ] ] )
@endsection

@section('content')
<div class="container-fluid container-wide">
  <div class="main">

    {!! Form::model($casestudy, ['action'=>['CaseStudyController@update', $casestudy], 'method' => 'post', 'class'=>'form-horizontal']) !!}

    <div class="row">

      <!-- start of narrative section -->
      <div id="narrative" class="col-md-8 col-md-push-4">
          <p>
            Tumblr in master cleanse consequat gluten-free veniam aesthetic. Snackwave ut tote bag trust fund put a bird on it organic commodo iPhone jean shorts authentic id. Affogato prism dolore artisan laborum mumblecore actually copper mug. Shaman kombucha celiac health goth umami try-hard dreamcatcher man braid neutra. Cold-pressed deserunt everyday carry whatever knausgaard unicorn bespoke hoodie mumblecore pour-over wolf intelligentsia umami waistcoat. Raw denim occaecat small batch lyft, tilde cardigan af VHS four dollar toast chia artisan plaid venmo 3 wolf moon vinyl. Adipisicing eiusmod brooklyn palo santo. Non palo santo pork belly ea incididunt, copper mug everyday carry bespoke consequat portland. Migas celiac sint, proident la croix flannel listicle live-edge edison bulb prism small batch labore.
          </p>

          <p>&nbsp;</p>

            @component('casestudy.partials.textarea', ['name'=>'intro_context'])
              Provide any relevant contextual information.
            @endcomponent

          <p>&nbsp;</p>

            @component('casestudy.partials.textarea', ['name'=>'intro_nuances'])
              Explain any cultural nuances and/or complexities that were unique to your research.
            @endcomponent



      </div> <!-- end narative collumn -->

      <!-- start of sidebar section -->
      <div id="sidebar" class="col-md-4 col-md-pull-8">
        <h2 class="page-header">Introduction</h2>

        <div class="well">
          @component('casestudy.partials.tooltip-textarea', ['name'=>'intro_tips'])
            @slot('tooltip')
              This tooltip gives you a little more information about this section.
            @endslot

            Tips
          @endcomponent
        </div>

        <div class="well">
          @include('casestudy.partials.textarea', ['name'=>'intro_acronyms', 'slot'=>'Key Acronymns'])
        </div>

        <div class="well">
          @include('casestudy.partials.textarea', ['name'=>'intro_objectives', 'slot'=>'Learning Objectives'])
        </div>

        <div class="well">
        @include('casestudy.partials.textarea', ['name'=>'intro_questions', 'slot'=>'Discussion Questions'])
        </div>

    </div> <!-- end of sidebar -->


  </div>

  {!! Form::close() !!}

</div>

@endsection
