@extends('casestudy.template')

@section('scripts')

  <script>
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();
    });
  </script>

  @include('scripts.autosave')

  @include('scripts.summernote', ['boxes' => [
                  ['name'=>'results_discuss', 'height'=>'600px', 'word_count'=>750],
                  ['name'=>'results_challenges', 'height'=>'600px', 'word_count'=>1000],
                  ['name'=>'results_tips', 'height'=>'200px'],
                  ['name'=>'results_questions' , 'height'=>'200px']
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
        <p>‘Call-out’ Box – Key Results: For the ‘Key Results’ Box to the left in this section, please list 1-3 key results the reader should take away from this case study.</p>
        <p>‘Call-out’ Box – Discussion Questions: For the ‘Discussion Questions’ Box to the left in this section, please list 1-3 discussion questions specific to this ‘Results’ section. These questions should help the reader achieve the learning objectives you have identified.</p>

        <h3>Instructions for Main Content Boxes (Below)</h3>
        <p>Describe the main results or impacts of the intervention, study, or program featured in this case study.  Remember to describe your result in easy to understand terms. For example, if your results are statistically significant, you may wish to describe their significance without referencing p-values. Keep in mind that you will have a chance in the next section to discuss the implications of these results. Please remember to fill out the call-out boxes to the left, and to add any graphics, charts, or tables using the upload bar at the bottom of this page. (~500-750 words)</p>

          @component('casestudy.partials.textarea', ['name'=>'results_discuss', 'content'=>$casestudy->results_discuss, 'word_count'=>1000])
            Discuss the results of this case study.
          @endcomponent


          @component('casestudy.partials.textarea', ['name'=>'results_challenges', 'content'=>$casestudy->results_challenges, 'word_count'=>1000])
            References
          @endcomponent


          @component('casestudy.partials.upload', ['attachments'=>$attachments])
            results
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
              Create a list of 1-3 key results the reader should take away from this case study.
            @endslot

            Key Results
          @endcomponent


          @component('casestudy.partials.tooltip-textarea', ['name'=>'results_questions'])
            @slot('tooltip')
              Create a list of 1-3 discussion questions relevant to this section. These questions should help the reader achieve the learning objectives you have identified.
            @endslot

            Discussion Questions
          @endcomponent


    </div> <!-- end of sidebar -->


  </div>

  {!! Form::close() !!}

@endsection
