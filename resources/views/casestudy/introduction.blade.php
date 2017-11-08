@extends('casestudy.template')

@section('scripts')

  <script>
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();
    });
  </script>

  @include('scripts.autosave')

  @include('scripts.summernote', ['boxes' => [
                  ['name'=>'intro_context', 'height'=>'600px', 'word_count'=>400],
                  ['name'=>'intro_nuances', 'height'=>'600px', 'word_count'=>400],
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
        <h3>Getting Started</h3>
<p>As you input your case study on this CaseMaker platform, you will find five sections to fill in: introduction, methodology, results, implications, and references. Each of the four narrative sections (i.e. the first four sections) should be approximately 500-750 words. At the beginning of each section, you will find guidance to indicate the type of content you should include in each. For more information on any section or CaseMaker in general, please download the CaseMaker user guide, coming soon under "How It Works" in the dropdown menu. </p><p>
Don’t forget to fill out the ‘call-out’ boxes to the left in each section as you go through. You will find instructions on what to put in each box at the beginning of each section. You can also click on the “i” button for more information on what to include in each box. </p>

        <h3>Instructions for ‘Call-out’ Boxes (Left)</h3>
        <p>
        ‘Call-out’ Box – Case Study Details: For the ‘Case Study Details box to the left in this section, please include the following information:
        </p>
        <ol>
        <li>Dates of Implementation (for the project, intervention, etc. you are describing in your case study)</li>
        <li>Case study setting (e.g. country or region; within a country/countries, at what scale? National? Or in X districts?)</li>
        <li>Health topic area (choose key words that describe the health issue or problem that the project, intervention, or study featured in your case study seeks to address, e.g. mHealth, maternal and newborn health, TB, TB in prisons</li>
        <li>Implementation challenge (choose key words that describe the implementation challenge(s) that the project, intervention, or study featured in your case study seeks to address, e.g. access to health services, health worker shortages, effective TB prevention, screening, and treatment in prisons, scaling-up effective TB prevention, screening, and treatment programs)</li>
        </ol>

        <p>‘Call-out’ Box – Key Acronyms: For the ‘Key Acronyms’ box to the left in this section, please list any acronyms used in your case study in alphabetical order, as well as what they stand for. If you only use a term once in the full text, do not include it as an acronym either in the text or in this box. Please include acronyms for the entire case study here (not just acronyms used in the introduction section), as this is the only ‘Acronyms’ box. </p>
        <p>‘Call-out’ Box – Learning Objectives: For the ‘Learning Objectives’ box to the left in this section, please list for the reader what new knowledge or skills they will have after reading the case study (include 2-4 learning objectives).</p>
        <p>‘Call-out’ Box – Discussion Questions: Create a list of 1-3 discussion questions specific to this ‘Introduction’ section. These questions should help the reader achieve the learning objectives you have identified. Please note: You will have the opportunity to identify discussion questions in each of the later narrative sections of the case study (Methodology, Results, and Implications).</p>

        <h3>Instructions for Main Content Boxes (Below)</h3>
        <p><i>Introduction Content Box 1 (Challenge and Intervention Background)</i></p>

        <p>In this section, identify the problem or challenge featured in your case study for the reader. For example, your case study may feature the findings of a study focused on how or how well a particular intervention was implemented in a particular context, and/or how those findings were used to try to improve the implementation of that intervention. In this case, you might want to detail the problem the intervention seeks to address, why the intervention was chosen, and the basic background of that intervention in this particular setting. (~200-400 words)</p>


          @component('casestudy.partials.textarea', ['name'=>'intro_context', 'content'=>$casestudy->intro_context, 'word_count'=>400])
            Challenge and Intervention Background
          @endcomponent


          <p><i>Introduction Content Box 2 (Additional Contextual Background)</i></p>
          <p>Provide the reader with any background or contextual information important for understanding this case study. This may be information on the relevant context (e.g. health, social, political context) specific to the setting the case study pertains to, along with additional background information on the project, intervention, or study featured in your case study. (~200-400 words)</p>
          <p>Please note: In our guidance, we have provided suggestions for the content you should consider including in the two parts of the introduction. Depending on your particular case study, you may decide that a different order makes sense – that some contextual elements belong in the first content box, and the detailed explanation of the problem or opportunity being addressed ought to go in the second content box. Please arrange the flow of your introduction in the way that you feel will make the most sense to the reader.</p>

          @component('casestudy.partials.textarea', ['name'=>'intro_nuances', 'content'=>$casestudy->intro_nuances, 'word_count'=>400])
            Additional Contextual Background
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
