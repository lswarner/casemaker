@extends('app')

@section('css')
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <!-- include summernote css/js-->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">

    <link href="{{ asset('css/casestudy-style.css') }}" rel="stylesheet">

@endsection

@section('scripts')
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>


  <script>
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();
    });
  </script>

  <script src="{{ asset('js/jquery.autosave.js') }}"></script>



  <script type="text/javascript">
    jQuery(function($) {
      $("form").autosave({
        callbacks: {
          // Add three triggers:
          // 1. change - when an input is changed on blur
          // 2. save button press - when button name=save is clicked
          // 3. interval - on a regular timer
          //
          // All three are applied to the same scope of inputs, defined below.
          trigger: ["change", function() {
            // A trigger for the save button.
            var self = this;
            $("[name=save]").click(function() {
              self.save();
            });
          }, {
            method: "interval",
            options: {
              interval: 30000 // in milliseconds.
            }
          }],
          scope: {
            method: function() {
              // Builtin scope "changed" does not catch textareas being edited,
              // so add textareas marked as undergoing an edit.
              // See textarea typing callback below.
              return this.changedInputs().add("textarea.editing");
            }
          },
          save: {
            method: "ajax",
            options: {
              method: 'post',
              url: "{{ url('autosave/'.$casestudy->id) }}",
              headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },

              success: function(data) {
                if (!data) {
                  // Error occurred: server returns data, but there's no data.
                  // For some reason, success callback fires instead of an
                  // error callback in this options object.
                  console.log("Unable to save.");
                } else {
                  // Callback for successfully saved data.
                  // This data is returned by jsonify in Flask app.

                  var dt = new Date();
                  var currentTime = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
                  $("#message").text('autosaved at '+currentTime);

                  // Now that data is saved, remove editing class.
                  // editing class should stay if user typed since save,
                  // but as this code stands now, remove it always.
                  $("textarea.editing").removeClass("editing");
                }
              },
              error: function() {
                // This is never called (and is not considered a bug).
                // https://github.com/nervetattoo/jquery-autosave/issues/7
                console.log("Unable to save. (error callback)");
              }
            }
          }
        }
      });

/*
      $("textarea").keyup(function () {
         // Prevent redundant saving of textareas by detecting typing.
         // If textarea text length changes, mark textarea as undergoing edit.
         // Minor limitation: does not catch single highlighted char changes.
         if ($(this).attr("count") != $(this).val().length) {
           $(this).addClass("editing");
         }
         $(this).attr("count", $(this).val().length);
      });
      */
    });
  </script>

  @include('scripts.summernote', ['boxes' => [
                  ['name'=>'intro_context', 'height'=>'600px'],
                  ['name'=>'intro_nuances', 'height'=>'600px'],
                  ['name'=>'intro_tips', 'height'=>'200px'],
                  ['name'=>'intro_acronyms', 'height'=>'200px'],
                  ['name'=>'intro_objectives', 'height'=>'200px'],
                  ['name'=>'intro_questions' , 'height'=>'200px']
                 ] ] )



@endsection


@section('content')
<div class="container-fluid container-wide">
  <div class="main">



    {!! Form::model( $casestudy, ['class'=>'form-horizontal']) !!}

        <div class="common-bar">
          <div class="row">
            <div class="col-md-4 col-lg-4">
              <h2>Project Info</h2>

              <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <div class="col-md-12">
                  {!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'CaseStudy Title']) !!}

                  @if ($errors->has('title'))
                    <span class="help-block">
                      <strong>{{ $errors->first('title') }}</strong>
                    </span>
                  @endif
                </div>
              </div>


              <div class="form-group{{ $errors->has('countries') ? ' has-error' : '' }}">
                <div class="col-md-12">
                  {!! Form::text('countries', null, ['class'=>'form-control', 'placeholder'=>'Countries']) !!}

                  @if ($errors->has('countries'))
                    <span class="help-block">
                      <strong>{{ $errors->first('countries') }}</strong>
                    </span>
                  @endif
                </div>
              </div>


            </div>

            <div class="col-md-4 col-lg-4 col-lg-offset-1">
              <h2>Team Members</h2>

              @foreach($casestudy->team as $t)
                <p>{{ $t->name }}</p>
              @endforeach
              <p>Tobias Funke</p>

              <p><i class="fa fa-plus-circle fa-3x" aria-hidden="true"></i></p>
            </div>

            <div class="col-md-4 col-lg-3">
                <h2>&nbsp;</h2>
                <button type="submit" class="btn btn-urc">
                    Save Case Study
                </button>

                <div id="message"></div>

            </div>
          </div>
        </div>




        <div class="row">

          <!-- start of narrative section -->
          <div id="narrative" class="col-md-7 col-md-push-5   col-lg-8 col-lg-push-4">
              <p>
                Tumblr in master cleanse consequat gluten-free veniam aesthetic. Snackwave ut tote bag trust fund put a bird on it organic commodo iPhone jean shorts authentic id. Affogato prism dolore artisan laborum mumblecore actually copper mug. Shaman kombucha celiac health goth umami try-hard dreamcatcher man braid neutra. Cold-pressed deserunt everyday carry whatever knausgaard unicorn bespoke hoodie mumblecore pour-over wolf intelligentsia umami waistcoat. Raw denim occaecat small batch lyft, tilde cardigan af VHS four dollar toast chia artisan plaid venmo 3 wolf moon vinyl. Adipisicing eiusmod brooklyn palo santo. Non palo santo pork belly ea incididunt, copper mug everyday carry bespoke consequat portland. Migas celiac sint, proident la croix flannel listicle live-edge edison bulb prism small batch labore.
              </p>


              @component('casestudy.partials.textarea', ['name'=>'intro_context'])
                Provide any relevant contextual information.
              @endcomponent


              @component('casestudy.partials.textarea', ['name'=>'intro_nuances'])
                Explain any cultural nuances and/or complexities that were unique to your research.
              @endcomponent


              @component('casestudy.partials.continue-buttons', ['back'=>route('introduction', $casestudy)])
                Continue to Methods
              @endcomponent

          </div> <!-- end narative collumn -->

          <!-- start of sidebar section -->
          <div id="sidebar" class="col-md-5 col-md-pull-7  col-lg-4 col-lg-pull-8">
            <h1 class="page-header">Introduction</h1>

              @component('casestudy.partials.tooltip-textarea', ['name'=>'intro_tips'])
                @slot('tooltip')
                  This tooltip gives you a little more information about this section.
                @endslot

                Tips
              @endcomponent


              @component('casestudy.partials.tooltip-textarea', ['name'=>'intro_acronyms'])
                @slot('tooltip')
                  This tooltip gives you a little more information about this section.
                @endslot

                Key Acronyms
              @endcomponent

              @component('casestudy.partials.tooltip-textarea', ['name'=>'intro_objectives'])
                @slot('tooltip')
                  This tooltip gives you a little more information about this section.
                @endslot

                Learning Objectives
              @endcomponent

              @component('casestudy.partials.tooltip-textarea', ['name'=>'intro_questions'])
                @slot('tooltip')
                  This tooltip gives you a little more information about this section.
                @endslot

                Discussion Questions
              @endcomponent


        </div> <!-- end of sidebar -->


      </div>

    {!! Form::close() !!}

   </div>
</div>
@endsection
