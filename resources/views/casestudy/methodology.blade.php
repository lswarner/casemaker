@extends('casestudy.template')

@section('scripts')

  <script>
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();
    });
  </script>

  @include('scripts.autosave')

  @include('scripts.summernote', ['boxes' => [
                  ['name'=>'method_used', 'height'=>'600px', 'word_count'=>300],
                  ['name'=>'method_challenges', 'height'=>'600px', 'word_count'=>500],
                  ['name'=>'method_tips', 'height'=>'200px'],
                  ['name'=>'method_partners', 'height'=>'200px'],
                  ['name'=>'method_questions' , 'height'=>'200px']
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
        <h3>Instructions for ‘Call-out’ Boxes (Left)</h3>
        <p>‘Call-out’ Box – Methods Summary:  For the ‘Methods Summary’ box to the left in this section, please list the main research methods used in either the development of this case study, or in the study that is featured in this case study (e.g. survey, focus group discussions, etc.). </p>
        <p>‘Call-out’ Box – Key Partners and their Roles: For the ‘Key Partners and their Roles’ Box to the left in this section, please list the 3-5 key actors/groups of actors in your case study along with a brief description of their roles.</p>
        <p>‘Call-out’ Box – Discussion Questions: For the ‘Discussion Questions’ Box to the left in this section, please list 1-3 discussion questions specific to this ‘Methodology’ section. These questions should help the reader achieve the learning objectives you have identified.</p>

        <h3>Instructions for Main Content Boxes (Below)</h3>

        <p>Please use the first box below to describe the methods you used in creating this case study. If your case study covers an implementation research study, please use the second box to describe the methods used in that study. More details may be found prior to each box below, as well as in our CaseMaker user guide. Please remember to fill in the ’call-out’ boxes to the left, and to add any graphics, charts, or tables using the upload bar at the bottom of this page.</p>
        <p>Please keep in mind that not all readers of this case study will be researchers, so be sure to use clear language that assumes a familiarity with the health sector in general, but does not assume formal research methods training. For example, if your research methods involved inferential statistics, you may wish to name your methods, but not spend too detail on your specific models. For examples of how other authors have written this section, as well as more tips for making your case study accessible to different audiences, please see our user guide.</p>
        <p><i>Methodology Content Box 1: Case Study Methods</i></p>
        <p>Clearly describe how you gathered the information included in this case study. For example, if your case study is based on data from key informant interviews and secondary data analysis, describe which methods you used and how they contributed to your case study. For some case studies, it may be that case study development involves identifying and summarizing key program documentation, performing secondary data analysis, and/or conducting primary qualitative data collection among the implementers, researchers, beneficiaries, and policy makers whose perspectives are key to documenting the case. For others case studies, it may be that the case study authors have intimate knowledge about the case, and may have developed the case study based on their first-hand experience and understanding, and based on documentation they have access to already. Either scenario is acceptable, and this space should be used to explain how your case study was developed. (~150-300 words)</p>
        <p><i>Methodology Content Box 2: Featured Implementation Research Study Methods</i></p>
        <p>If your case study features an implementation research study, clearly describe the research methods used in that study. If applicable, include the hypotheses tested as well as the methods used to test them. (~300-500 words)</p>

          @component('casestudy.partials.textarea', ['name'=>'method_used', 'content'=>$casestudy->method_used, 'word_count'=>1000])
            Case Study Methods
          @endcomponent


          @component('casestudy.partials.textarea', ['name'=>'method_challenges', 'content'=>$casestudy->method_challenges, 'word_count'=>1000])
            Featured Implementation Research Study Methods
          @endcomponent


          @component('casestudy.partials.upload', ['attachments'=>$attachments])
            methodology
          @endcomponent


          @component('casestudy.partials.continue-buttons', ['back'=>route('introduction', $casestudy), 'next'=>route('results', $casestudy)])
            Continue to Results
          @endcomponent

      </div> <!-- end narative collumn -->

      <!-- start of sidebar section -->
      <div id="sidebar" class="col-md-5 col-md-pull-7  col-lg-4 col-lg-pull-8">

        <h1 class="page-header">Methodology</h1>

          @component('casestudy.partials.tooltip-textarea', ['name'=>'method_tips'])
            @slot('tooltip')
              List the main research methods used in either the development of this case study, or in the study that is featured in this case study (e.g. survey, focus group discussions, etc.).
            @endslot

            Methods Summary
          @endcomponent


          @component('casestudy.partials.tooltip-textarea', ['name'=>'method_partners'])
            @slot('tooltip')
              List the 3-5 key actors/groups of actors in your case study along with a brief description of their roles.
            @endslot

            Key Partners and their Roles
          @endcomponent


          @component('casestudy.partials.tooltip-textarea', ['name'=>'method_questions'])
            @slot('tooltip')
              Create a list of 1-3 discussion questions relevant to this section. These questions should help the reader achieve the learning objectives you have identified.
            @endslot

            Discussion Questions
          @endcomponent


    </div> <!-- end of sidebar -->


  </div>

  {!! Form::close() !!}

@endsection
