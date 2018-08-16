@extends('casestudy.template')

@section('scripts')

  <script>
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();
    });
  </script>

  @include('scripts.autosave')

  @include('scripts.summernote', ['boxes' => [
                  ['name'=>'method_used', 'height'=>'600px', 'word_count'=>1000],
                  ['name'=>'method_challenges', 'height'=>'600px', 'word_count'=>1000],
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
   @include('scripts.manage-resource', ['resource'=>'audience', 'add_url'=> route('audience_add', $casestudy), 'remove_url'=> route('audience_remove', $casestudy) ])
   @include('scripts.manage-resource', ['resource'=>'thematic', 'add_url'=> route('thematic_add', $casestudy), 'remove_url'=> route('thematic_remove', $casestudy) ])

   @include('scripts.team-invitation', ['url'=> route('invite', $casestudy)])

   @include('scripts.file-upload')

@endsection

@section('casestudy-page')

    {!! Form::model($casestudy, [ 'method' => 'patch', 'class'=>'form-horizontal autosave', 'action'=>['CaseStudyController@upload', $casestudy->id], 'enctype'=>'multipart/form-data']) !!}


    <div class="row">

      <!-- start of narrative section -->
      <div id="narrative" class="col-md-7 col-md-push-5   col-lg-8 col-lg-push-4">
        <?php $instructions= $casestudy->instructions(); ?>
        <?= $instructions->method0; ?>

        <?= $instructions->method1; ?>
          @component('casestudy.partials.textarea', ['name'=>'method_used', 'content'=>$casestudy->method_used, 'word_count'=>1000])
            <?= $instructions->methodh1; ?>
          @endcomponent


          <?= $instructions->method2; ?>

          @component('casestudy.partials.textarea', ['name'=>'method_challenges', 'content'=>$casestudy->method_challenges, 'word_count'=>1000])
            <?= $instructions->methodh2; ?>
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
              <?= $instructions->tooltip21; ?>
            @endslot

            <?= $instructions->tooltip21h; ?>
          @endcomponent


          @component('casestudy.partials.tooltip-textarea', ['name'=>'method_partners'])
            @slot('tooltip')
              <?= $instructions->tooltip22; ?>
            @endslot

            <?= $instructions->tooltip22h; ?>
          @endcomponent


          @component('casestudy.partials.tooltip-textarea', ['name'=>'method_questions'])
            @slot('tooltip')
              <?= $instructions->tooltip23; ?>
            @endslot

            <?= $instructions->tooltip23h; ?>
          @endcomponent


    </div> <!-- end of sidebar -->


  </div>

  {!! Form::close() !!}

@endsection
