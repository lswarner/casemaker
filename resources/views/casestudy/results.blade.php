@extends('casestudy.template')

@section('scripts')

  <script>
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();
    });
  </script>

  @include('scripts.autosave')

  @include('scripts.summernote', ['boxes' => [
                  ['name'=>'results_discuss', 'height'=>'600px'],
                  ['name'=>'results_challenges', 'height'=>'600px'],
                  ['name'=>'results_tips', 'height'=>'200px'],
                  ['name'=>'results_questions' , 'height'=>'200px']
                 ] ] )
@endsection

@section('casestudy-page')

    {!! Form::model($casestudy, [ 'method' => 'patch', 'class'=>'form-horizontal']) !!}


    <div class="row">

      <!-- start of narrative section -->
      <div id="narrative" class="col-md-7 col-md-push-5   col-lg-8 col-lg-push-4">
          <p>
            Tumblr in master cleanse consequat gluten-free veniam aesthetic. Snackwave ut tote bag trust fund put a bird on it organic commodo iPhone jean shorts authentic id. Affogato prism dolore artisan laborum mumblecore actually copper mug. Shaman kombucha celiac health goth umami try-hard dreamcatcher man braid neutra. Cold-pressed deserunt everyday carry whatever knausgaard unicorn bespoke hoodie mumblecore pour-over wolf intelligentsia umami waistcoat. Raw denim occaecat small batch lyft, tilde cardigan af VHS four dollar toast chia artisan plaid venmo 3 wolf moon vinyl. Adipisicing eiusmod brooklyn palo santo. Non palo santo pork belly ea incididunt, copper mug everyday carry bespoke consequat portland. Migas celiac sint, proident la croix flannel listicle live-edge edison bulb prism small batch labore.
          </p>

          @component('casestudy.partials.textarea', ['name'=>'results_discuss'])
            Discuss the results of this case study.
          @endcomponent


          @component('casestudy.partials.textarea', ['name'=>'results_challenges'])
            Discuss any challenges and how you overcame them.
          @endcomponent


          @component('casestudy.partials.continue-buttons', ['back'=>route('methodology', $casestudy), 'next'=>route('implications', $casestudy)])
            Continue to Implications
          @endcomponent

      </div> <!-- end narative collumn -->

      <!-- start of sidebar section -->
      <div id="sidebar" class="col-md-5 col-md-pull-7  col-lg-4 col-lg-pull-8">

        <h1 class="page-header">Results</h1>

          @component('casestudy.partials.tooltip-textarea', ['name'=>'results_tips'])
            @slot('tooltip')
              This tooltip gives you a little more information about this section.
            @endslot

            Tips
          @endcomponent


          @component('casestudy.partials.tooltip-textarea', ['name'=>'results_questions'])
            @slot('tooltip')
              This tooltip gives you a little more information about this section.
            @endslot

            Discussion Questions
          @endcomponent


    </div> <!-- end of sidebar -->


  </div>

  {!! Form::close() !!}

@endsection