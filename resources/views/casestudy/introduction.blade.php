@extends('casestudy.template')

@section('scripts')
  @include('scripts.summernote', ['boxes' => [
                  ['name'=>'intro_context', 'height'=>'600px'],
                  ['name'=>'intro_nuances', 'height'=>'600px'],
                  ['name'=>'intro_tips', 'height'=>'200px'],
                  ['name'=>'intro_acronyms', 'height'=>'200px'],
                  ['name'=>'intro_objectives', 'height'=>'200px'],
                  ['name'=>'intro_questions' , 'height'=>'200px']
                 ] ] )

  <script>
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();
    });
  </script>
@endsection

@section('casestudy-page')

    {!! Form::model($casestudy, ['action'=>['CaseStudyController@update', $casestudy->id], 'method' => 'patch', 'class'=>'form-horizontal']) !!}
    {!! Form::hidden('destination', 'introduction') !!}

    <div class="row">

      <!-- start of narrative section -->
      <div id="narrative" class="col-md-8 col-md-push-4">
          <p>
            Tumblr in master cleanse consequat gluten-free veniam aesthetic. Snackwave ut tote bag trust fund put a bird on it organic commodo iPhone jean shorts authentic id. Affogato prism dolore artisan laborum mumblecore actually copper mug. Shaman kombucha celiac health goth umami try-hard dreamcatcher man braid neutra. Cold-pressed deserunt everyday carry whatever knausgaard unicorn bespoke hoodie mumblecore pour-over wolf intelligentsia umami waistcoat. Raw denim occaecat small batch lyft, tilde cardigan af VHS four dollar toast chia artisan plaid venmo 3 wolf moon vinyl. Adipisicing eiusmod brooklyn palo santo. Non palo santo pork belly ea incididunt, copper mug everyday carry bespoke consequat portland. Migas celiac sint, proident la croix flannel listicle live-edge edison bulb prism small batch labore.
          </p>

          @component('casestudy.partials.textarea', ['name'=>'intro_context'])
            Provide any relevant contextual information.
          @endcomponent


          @component('casestudy.partials.textarea', ['name'=>'intro_nuances'])
            Explain any cultural nuances and/or complexities that were unique to your research.
          @endcomponent


          @component('casestudy.partials.button')
            Next Section
          @endcomponent

      </div> <!-- end narative collumn -->

      <!-- start of sidebar section -->
      <div id="sidebar" class="col-md-4 col-md-pull-8">
        <h2 class="page-header">Introduction</h2>

          @component('casestudy.partials.tooltip-textarea', ['name'=>'intro_tips'])
            @slot('tooltip')
              This tooltip gives you a little more information about this section.
            @endslot

            Tips
          @endcomponent


          @component('casestudy.partials.tooltip-textarea', ['name'=>'intro_acronyms'])
            @slot('tooltip')
              This tooltip gives you a little more information about this section.
            @endslot

            Key Acronyms
          @endcomponent

          @component('casestudy.partials.tooltip-textarea', ['name'=>'intro_objectives'])
            @slot('tooltip')
              This tooltip gives you a little more information about this section.
            @endslot

            Learning Objectives
          @endcomponent

          @component('casestudy.partials.tooltip-textarea', ['name'=>'intro_questions'])
            @slot('tooltip')
              This tooltip gives you a little more information about this section.
            @endslot

            Discussion Questions
          @endcomponent


    </div> <!-- end of sidebar -->


  </div>

  {!! Form::close() !!}

@endsection
