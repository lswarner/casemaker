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

  @include('scripts.file-upload')

@endsection

@section('casestudy-page')

    {!! Form::model($casestudy, [ 'method' => 'patch', 'class'=>'form-horizontal autosave', 'action'=>['CaseStudyController@upload', $casestudy->id], 'enctype'=>'multipart/form-data']) !!}


    <div class="row">

      <!-- start of narrative section -->
      <div id="narrative" class="col-md-7 col-md-push-5   col-lg-8 col-lg-push-4">

        <?php $instructions= $casestudy->instructions(); ?>
        <?= $instructions->intro0; ?>

        <?= $instructions->intro1; ?>


          @component('casestudy.partials.textarea', ['name'=>'intro_context', 'content'=>$casestudy->intro_context, 'word_count'=>400])
            <?= $instructions->introh1; ?>
          @endcomponent


          <?= $instructions->intro2; ?>

          @component('casestudy.partials.textarea', ['name'=>'intro_nuances', 'content'=>$casestudy->intro_nuances, 'word_count'=>400])
            <?= $instructions->introh2; ?>
          @endcomponent


          @component('casestudy.partials.upload', ['attachments'=>$attachments])
            introduction
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
              Use this box to input the information asked for in the instructions to the right.
            @endslot

            Case Study Details
          @endcomponent


          @component('casestudy.partials.tooltip-textarea', ['name'=>'intro_acronyms'])
            @slot('tooltip')
              List for the reader what new knowledge or skills they will have after finishing the case study (include 2-4 learning objectives).
            @endslot

            Learning Objectives
          @endcomponent

          @component('casestudy.partials.tooltip-textarea', ['name'=>'intro_objectives'])
            @slot('tooltip')
              List any acronyms used in your case study in alphabetical order, as well as what they stand for. If you only use a term once the full text, do not include it as an acronym either in the text or in this box.
            @endslot

            Key Acronyms
          @endcomponent

          @component('casestudy.partials.tooltip-textarea', ['name'=>'intro_questions'])
            @slot('tooltip')
              Create a list of 1-3 discussion questions relevant to this section. These questions should help the reader achieve the learning objectives you have identified.
            @endslot

            Discussion Questions
          @endcomponent


    </div> <!-- end of sidebar -->


  </div>

  {!! Form::close() !!}

@endsection
