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
  @include('scripts.manage-resource', ['resource'=>'audience', 'add_url'=> route('audience_add', $casestudy), 'remove_url'=> route('audience_remove', $casestudy) ])
  @include('scripts.manage-resource', ['resource'=>'thematic', 'add_url'=> route('thematic_add', $casestudy), 'remove_url'=> route('thematic_remove', $casestudy) ])

  @include('scripts.team-invitation', ['url'=> route('invite', $casestudy)])

  @include('scripts.file-upload')

@endsection

@section('casestudy-page')
    <h1 class="review-header">Review Case Study</h1>


    @include('casestudy.summary')




    @if( $casestudy->status == "submitted")

      <?php // thanks to route filtering in Team middleware, only admins will get here to edit and publish a case study ?>
      @if(Auth::user()->is_admin == true)

        <h1>&nbsp;</h1>
        <h1 class="review-header">Choose a template</h1>


          {!! Form::model( $casestudy, ['action'=>['CaseStudyController@publish', $casestudy->id], 'method' => 'patch', 'class'=>'form-horizontal']) !!}


          <div class="form-group">
            <div class="col-sm-11 ">
              <p>Before publishing a case study, choose which template should be used to present it to viewers in the library.</p>
                <label for="template">Choose a template: </label>
                <select name="template" class="selectpicker" style="width:200px;">
                  @foreach($templates as $t)
                    <option value="{{ $t->id }}">{{$t->name}}</option>
                  @endforeach
                </select>
              <h2>&nbsp;</h2>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-8 col-lg-6 ">
              <input type="submit" class="btn btn-urc-accent1" value="Publish Case Study" />
            </div>
          </div>

          {!! Form::close() !!}


      @endif

    @elseif( ($casestudy->status == "created")  )

      <div class="row">

        {!! Form::model( $casestudy, ['action'=>['CaseStudyController@submit', $casestudy->id], 'method' => 'patch', 'class'=>'form-horizontal']) !!}

        <div class="form-group">
          <div class="col-md-8 col-md-offset-4 col-lg-6 col-lg-offset-6">
            <input type="submit" class="btn btn-urc-accent1" value="Submit Case Study" />
          </div>
        </div>

        {!! Form::close() !!}
      </div>

    @endif


@endsection
