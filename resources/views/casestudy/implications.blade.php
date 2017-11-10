@extends('casestudy.template')

@section('scripts')

  <script>
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();
    });
  </script>

  @include('scripts.autosave')

  @include('scripts.summernote', ['boxes' => [
                  ['name'=>'implications_discuss', 'height'=>'600px', 'word_count'=>750],
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
        <h3>Instructions for ‘Call-out’ Boxes (Left)</h3>
        <p>‘Call-out’ Box – Program and Policy Implications: For the ‘Program and Policy Implications’ Box to the left in this section, please list the 1-3 key implications of your case study that ought to inform decisions related to implementation for implementing partners and policy makers. These should be the implications that you most wish the reader to understand after reading this case study.</p>
        <p>‘Call-out’ Box – Discussion Questions: For the ‘Discussion Questions’ Box to the left in this section, please list 1-3 discussion questions specific to this ‘Implications’ section. These questions should help the reader achieve the learning objectives you have identified.</p>

        <h3>Instructions for Main Content Box (Below)</h3>
        <p>Describe the main policy and/or program implications of the results. Use this section to explain your results more fully for the reader. What do your results tell us both about the health issue you address in this case study and the implementation challenge you discuss? How can these results be used to improve the effectiveness of programs and policies that seek to address the health challenges you have identified?  Please use this section to also include any next steps called for by your work. End with a paragraph that wraps up your case study and can serve as a conclusion. Please remember to fill out the call-out boxes to the left, and to add any graphics, charts, or tables using the upload bar at the bottom of this page. (~500-750 words)</p>

          @component('casestudy.partials.textarea', ['name'=>'implications_discuss', 'content'=>$casestudy->implications_discuss, 'word_count'=>1000])
            Discuss the implications of this case study.
          @endcomponent

        <p>Use this box to list any references cited in the text of your case study. Please follow the <a href="https://owl.english.purdue.edu/owl/resource/1017/01/" target="_blank">AMA Citation style</a>.</p>
          @component('casestudy.partials.textarea', ['name'=>'implications_challenges', 'content'=>$casestudy->implications_challenges, 'word_count'=>1000])
            References
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
