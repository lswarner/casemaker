@extends('casestudy.template')

@section('scripts')

  <script>
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();
    });
  </script>

  @include('scripts.autosave')

  @include('scripts.summernote', ['boxes' => [
                  ['name'=>'implications_discuss', 'height'=>'600px', 'word_count'=>1000],
                  ['name'=>'implications_challenges', 'height'=>'600px', 'word_count'=>1000],
                  ['name'=>'implications_tips', 'height'=>'200px'],
                  ['name'=>'implications_questions' , 'height'=>'200px']
                 ] ] )

  @include('scripts.autocomplete', ['boxes' => [
                  ['id' => 'countries', 'suggestions' => $country_suggestions, 'width'=> '100%', 'height'=> '60px', 'placeholder'=>'List multiple countries, separated by a comma' ],
                ] ] )

  @include('scripts.filter-list', ['add_action'=>'add-user', 'add_url'=> route('team_add', $casestudy), 'remove_action'=>'remove-user', 'remove_url'=> route('team_remove', $casestudy) ])
  @include('scripts.manage-resource', ['resource'=>'method', 'add_url'=> route('method_add', $casestudy), 'remove_url'=> route('method_remove', $casestudy) ])
  @include('scripts.manage-resource', ['resource'=>'keyword', 'add_url'=> route('keyword_add', $casestudy), 'remove_url'=> route('keyword_remove', $casestudy) ])

  @include('scripts.team-invitation', ['url'=> route('invite', $casestudy)])

  @include('scripts.file-upload')

@endsection

@section('casestudy-page')

    {!! Form::model($casestudy, [ 'method' => 'patch', 'class'=>'form-horizontal autosave', 'action'=>['CaseStudyController@upload', $casestudy->id], 'enctype'=>'multipart/form-data']) !!}


    <div class="row">

      <!-- start of narrative section -->
      <div id="narrative" class="col-md-7 col-md-push-5   col-lg-8 col-lg-push-4">
        <?php $instructions= $casestudy->instructions(); ?>
        <?= $instructions->implications0; ?>

        <?= $instructions->implications1; ?>
          @component('casestudy.partials.textarea', ['name'=>'implications_discuss', 'content'=>$casestudy->implications_discuss, 'word_count'=>1000])
            <?= $instructions->implicationsh1; ?>
          @endcomponent


        <?= $instructions->implications2; ?>
          @component('casestudy.partials.textarea', ['name'=>'implications_challenges', 'content'=>$casestudy->implications_challenges, 'word_count'=>1000])
            <?= $instructions->implicationsh2; ?>
          @endcomponent


          @component('casestudy.partials.upload', ['attachments'=>$attachments])
            implications
          @endcomponent



          @component('casestudy.partials.continue-buttons', ['back'=>route('results', $casestudy), 'next'=>route('review', $casestudy)])
            Continue to Review
          @endcomponent

      </div> <!-- end narative collumn -->

      <!-- start of sidebar section -->
      <div id="sidebar" class="col-md-5 col-md-pull-7  col-lg-4 col-lg-pull-8">

        <h1 class="page-header">Implications</h1>

          @component('casestudy.partials.tooltip-textarea', ['name'=>'implications_tips'])
            @slot('tooltip')
              Create a list of the 1-3 key implications of your case study that ought to inform decisions related to implementation for implementing partners and policy makers.
            @endslot

            Program and Policy Implications
          @endcomponent

          @component('casestudy.partials.tooltip-textarea', ['name'=>'implications_questions'])
            @slot('tooltip')
              Create a list of 1-3 discussion questions relevant to this section. These questions should help the reader achieve the learning objectives you have identified.
            @endslot

            Discussion Questions
          @endcomponent


    </div> <!-- end of sidebar -->


  </div>

  {!! Form::close() !!}

@endsection
