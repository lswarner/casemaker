@extends('casestudy.template')

@section('scripts')

  <script>
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();
    });
  </script>

  @include('scripts.autosave')

  @include('scripts.summernote', ['boxes' => [
                  ['name'=>'intro_context', 'height'=>'600px', 'word_count'=>1000],
                  ['name'=>'intro_nuances', 'height'=>'600px', 'word_count'=>1000],
                  ['name'=>'intro_tips', 'height'=>'200px'],
                  ['name'=>'intro_acronyms', 'height'=>'200px'],
                  ['name'=>'intro_objectives', 'height'=>'200px'],
                  ['name'=>'intro_questions' , 'height'=>'200px']
                 ] ] )

  @include('scripts.autocomplete', ['boxes' => [
                  ['id' => 'countries', 'suggestions' => $country_suggestions, 'width'=> '100%', 'height'=> '60px', 'placeholder'=>'List multiple countries, separated by a comma' ],
                ] ] )

  @include('scripts.filter-list', ['add_action'=>'add-user', 'add_url'=> route('team_add', $casestudy), 'remove_action'=>'remove-user', 'remove_url'=> route('team_remove', $casestudy) ])
  @include('scripts.manage-resource', ['resource'=>'method', 'add_url'=> route('method_add', $casestudy), 'remove_url'=> route('method_remove', $casestudy) ])
  @include('scripts.manage-resource', ['resource'=>'keyword', 'add_url'=> route('keyword_add', $casestudy), 'remove_url'=> route('keyword_remove', $casestudy) ])

  @include('scripts.team-invitation', ['url'=> route('invite', $casestudy)])

@endsection

@section('casestudy-page')

    {!! Form::model($casestudy, [ 'method' => 'patch', 'class'=>'form-horizontal autosave']) !!}


    <div class="row">

      <!-- start of narrative section -->
      <div id="narrative" class="col-md-7 col-md-push-5   col-lg-8 col-lg-push-4">
          <p>
            Tumblr in master cleanse consequat gluten-free veniam aesthetic. Snackwave ut tote bag trust fund put a bird on it organic commodo iPhone jean shorts authentic id. Affogato prism dolore artisan laborum mumblecore actually copper mug. Shaman kombucha celiac health goth umami try-hard dreamcatcher man braid neutra. Cold-pressed deserunt everyday carry whatever knausgaard unicorn bespoke hoodie mumblecore pour-over wolf intelligentsia umami waistcoat. Raw denim occaecat small batch lyft, tilde cardigan af VHS four dollar toast chia artisan plaid venmo 3 wolf moon vinyl. Adipisicing eiusmod brooklyn palo santo. Non palo santo pork belly ea incididunt, copper mug everyday carry bespoke consequat portland. Migas celiac sint, proident la croix flannel listicle live-edge edison bulb prism small batch labore.
          </p>

          @component('casestudy.partials.textarea', ['name'=>'intro_context', 'content'=>$casestudy->intro_context, 'word_count'=>1000])
            Provide any relevant contextual information.
          @endcomponent


          @component('casestudy.partials.textarea', ['name'=>'intro_nuances', 'content'=>$casestudy->intro_nuances, 'word_count'=>1000])
            References
          @endcomponent


          @component('casestudy.partials.continue-buttons', [ 'next'=>route('methodology', $casestudy)])
            Continue to Methodology
          @endcomponent

      </div> <!-- end narative collumn -->

      <!-- start of sidebar section -->
      <div id="sidebar" class="col-md-5 col-md-pull-7  col-lg-4 col-lg-pull-8">
        <h1 class="page-header">Introduction</h1>

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
