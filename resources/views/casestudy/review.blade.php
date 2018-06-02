@extends('casestudy.template')

@section('scripts')
  <script>
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();
    });
  </script>

  @include('scripts.autosave')

  @include('scripts.summernote', ['boxes' => [] ] )

  @include('scripts.autocomplete', ['boxes' => [
     ['id' => 'countries', 'suggestions' => $country_suggestions, 'width'=> '100%', 'height'=> '60px', 'placeholder'=>'List multiple countries, separated by a comma' ],
   ] ] )

  @include('scripts.filter-list', ['add_action'=>'add-user', 'add_url'=> route('team_add', $casestudy), 'remove_action'=>'remove-user', 'remove_url'=> route('team_remove', $casestudy) ])
  @include('scripts.manage-resource', ['resource'=>'method', 'add_url'=> route('method_add', $casestudy), 'remove_url'=> route('method_remove', $casestudy) ])
  @include('scripts.manage-resource', ['resource'=>'keyword', 'add_url'=> route('keyword_add', $casestudy), 'remove_url'=> route('keyword_remove', $casestudy) ])
  @include('scripts.manage-resource', ['resource'=>'audience', 'add_url'=> route('audience_add', $casestudy), 'remove_url'=> route('audience_remove', $casestudy) ])
  @include('scripts.manage-resource', ['resource'=>'thematic', 'add_url'=> route('thematic_add', $casestudy), 'remove_url'=> route('thematic_remove', $casestudy) ])

  @include('scripts.team-invitation', ['url'=> route('invite', $casestudy)])


@endsection

@section('casestudy-page')
    <h1 class="review-header">Review Case Study</h1>


    @include('casestudy.summary')



    <div class="row">
    @if( $casestudy->status == "submitted")

      <?php /* this case is no longer reached. If casestudy->status is submitted, the controller routes to show view */ ?>

    @elseif( ($casestudy->status == "created")  )


        {!! Form::model( $casestudy, ['action'=>['CaseStudyController@submit', $casestudy->id], 'method' => 'patch', 'class'=>'form-horizontal']) !!}

        <div class="form-group">
          <div class="col-md-8 col-md-offset-4 col-lg-6 col-lg-offset-6">
            <input type="submit" class="btn btn-urc-accent1" value="Submit Case Study" />
          </div>
        </div>

        {!! Form::close() !!}


    @endif


@endsection
