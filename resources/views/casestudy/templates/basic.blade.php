@extends('library-app')

@section('content')



<div class="container-fluid container-wide navbar-shade-shift">


  <div class="template-bar" style="background-image: url('{{ $casestudy->featured_image }}')">
    <div class="row">
      <div class="col-xs-12"><h1 class="title">{{ $casestudy->title }}</h1></div>
      <div class="col-sm-2">
        <button type="button" class="btn-icon template-icon"><i class="fa fa-twitter" aria-hidden="true"></i></button>
        <button type="button" class="btn-icon template-icon"><i class="fa fa-envelope" aria-hidden="true"></i></button></i>
        <button type="button" class="btn-icon template-icon"><i class="fa fa-print" aria-hidden="true"></i></button></i>
      </div>
      <div class="col-sm-7">
        <p class="description">{{ $casestudy->description }} {{ $casestudy->description }} {{ $casestudy->description }} {{ $casestudy->description }} </p>

        <h2>Quick Facts</h2>
        <ul class="quick-facts">
          <li>Author(s):  <span class="quick-details">Luke Warner</span></li>
          <li>Country:  <span class="quick-details">Bangladesh, Burundi, Kenya, Guatemala</span></li>
          <li>Topics:  <span class="quick-details">Food Security, Water Sanitation Hygiene</span></li>
          <li>Methods:  <span class="quick-details">Design, Implementation, Evaluation</span></li>
        </ul>
      </div>

    </div>
  </div>


  <div id="template-basic" class= "template-main">
    <nav class="navbar navbar-default navbar-centered" id="section-bar">

      <div class="collapse navbar-collapse" id="app-navbar-collapse">

          <ul class="nav navbar-nav">
            <li><a class="" href="#background">Background</a></li>
            <li><a class="" href="#intervention">Intervention</a></li>
            <li><a class="" href="#approach">IS Approach</a></li>
            <li><a class="" href="#findings">Findings</a></li>
            <li><a class="" href="#implications">Implications</a></li>
            <li><a class="" href="#references">References</a></li>
          </ul>

      </div>
    </nav>

    <?php /****** Background ******************************/ ?>

    <div id="background" class="section">
      <div class="sub-section">
        <div class="row">
          <h2>Background</h2>
        </div>
      </div>

      <div class="sub-section">
        <div class="row">
          <div class="col-sm-5">
            <div class="callout">
              <h3>Case Study Details</h3>
              <p>
                Dates: <br />
                Setting: <br />
                Topic: <br />
                Challenge <br />
              </p>
            </div>
          </div>

          <div class="col-sm-5 col-sm-offset-1">
            <div class="callout">
              <h3>Key Acronyms</h3>
              <ul>
                <li>ABCD</li>
                <li>NFL</li>
                <li>PEBKAC</li>
              </ul>
            </div>
          </div>

        </div>
      </div>

      <div class="sub-section accent3">
        <div class="row">
          <h3>Learning Objectives</h3>
          <ol>
            <li>First question</li>
            <li>Second question</li>
          </ol>
        </div>
      </div>

      <div class="sub-section">
        <div class="row">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin auctor sit amet ipsum vel
            posuere. Curabitur arcu justo, pellentesque ut finibus in, faucibus sit amet libero. Vestibulum
            scelerisque consequat nisi, nec feugiat neque fermentum non. In congue ligula vel tempor
            tempor. Pellentesque egestas imperdiet mi in iaculis. Donec faucibus sagittis felis, ut venenatis
            est bibendum eget. Sed egestas facilisis sodales. Curabitur id sem nulla. Aenean vitae
            maximus massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id blandit dolor.
          </p>
        </div>
      </div>
    </div>



    <?php /****** Intervention ******************************/ ?>

    <div id="intervention" class="section">
      <div class="sub-section">
        <div class="row">
          <h2>Intervention</h2>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin auctor sit amet ipsum vel
            posuere. Curabitur arcu justo, pellentesque ut finibus in, faucibus sit amet libero. Vestibulum
            scelerisque consequat nisi, nec feugiat neque fermentum non. In congue ligula vel tempor
            tempor. Pellentesque egestas imperdiet mi in iaculis. Donec faucibus sagittis felis, ut venenatis
            est bibendum eget. Sed egestas facilisis sodales. Curabitur id sem nulla. Aenean vitae
            maximus massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id blandit dolor.
          </p>
        </div>
      </div>

      <div class="sub-section primary">
        <div class="row">
          <h3>Discussion Questions</h3>
          <ol>
            <li>First question</li>
            <li>Second question</li>
          </ol>
        </div>
      </div>
    </div>




    <?php /****** Approach ******************************/ ?>

    <div id="approach" class="section">
      <div class="sub-section">
        <div class="row">
          <h2>Implementation Science (IS) Approach</h2>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin auctor sit amet ipsum vel
            posuere. Curabitur arcu justo, pellentesque ut finibus in, faucibus sit amet libero. Vestibulum
            scelerisque consequat nisi, nec feugiat neque fermentum non. In congue ligula vel tempor
            tempor. Pellentesque egestas imperdiet mi in iaculis. Donec faucibus sagittis felis, ut venenatis
            est bibendum eget. Sed egestas facilisis sodales. Curabitur id sem nulla. Aenean vitae
            maximus massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id blandit dolor.
          </p>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin auctor sit amet ipsum vel
            posuere. Curabitur arcu justo, pellentesque ut finibus in, faucibus sit amet libero. Vestibulum
            scelerisque consequat nisi, nec feugiat neque fermentum non. In congue ligula vel tempor
            tempor. Pellentesque egestas imperdiet mi in iaculis. Donec faucibus sagittis felis, ut venenatis
            est bibendum eget. Sed egestas facilisis sodales. Curabitur id sem nulla. Aenean vitae
            maximus massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id blandit dolor.
          </p>
        </div>
      </div>


      <div class="sub-section">
        <div class="row">
          <div class="col-xs-12">
            <div class="callout">
              <h3>Key Partners and Roles</h3>
              <ol>
                <li>Partner</li>
                <li>Organization</li>
                <li>Associations</li>
              </ol>
            </div>
          </div>
        </div>
      </div>

      <div class="sub-section primary">
        <div class="row">
          <h3>Discussion Questions</h3>
          <ol>
            <li>First question</li>
            <li>Second question</li>
          </ol>
        </div>
      </div>
    </div>





    <?php /****** Findings ******************************/ ?>

    <div id="findings" class="section">
      <div class="sub-section">
        <div class="row">
          <h2>Findings</h2>
        </div>
      </div>

      <div class="sub-section accent3">
        <div class="row">
          <h3>Key Results</h3>
          <ol>
            <li>Result</li>
            <li>Second result</li>
          </ol>
        </div>
      </div>

      <div class="sub-section">
        <div class="row">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin auctor sit amet ipsum vel
            posuere. Curabitur arcu justo, pellentesque ut finibus in, faucibus sit amet libero. Vestibulum
            scelerisque consequat nisi, nec feugiat neque fermentum non. In congue ligula vel tempor
            tempor. Pellentesque egestas imperdiet mi in iaculis. Donec faucibus sagittis felis, ut venenatis
            est bibendum eget. Sed egestas facilisis sodales. Curabitur id sem nulla. Aenean vitae
            maximus massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id blandit dolor.
          </p>
        </div>
      </div>

      <div class="sub-section primary">
        <div class="row">
          <h3>Discussion Questions</h3>
          <ol>
            <li>First question</li>
            <li>Second question</li>
          </ol>
        </div>
      </div>
    </div>


    <?php /****** Implications ******************************/ ?>

    <div id="implications" class="section">
      <div class="sub-section">
        <div class="row">
          <h2>Implications</h2>
        </div>
      </div>

      <div class="sub-section accent3">
        <div class="row">
          <h3>Program and Policy Implications</h3>
          <ol>
            <li>Implications</li>
            <li>Another implication.</li>
          </ol>
        </div>
      </div>

      <div class="sub-section">
        <div class="row">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin auctor sit amet ipsum vel
            posuere. Curabitur arcu justo, pellentesque ut finibus in, faucibus sit amet libero. Vestibulum
            scelerisque consequat nisi, nec feugiat neque fermentum non. In congue ligula vel tempor
            tempor. Pellentesque egestas imperdiet mi in iaculis. Donec faucibus sagittis felis, ut venenatis
            est bibendum eget. Sed egestas facilisis sodales. Curabitur id sem nulla. Aenean vitae
            maximus massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id blandit dolor.
          </p>
        </div>
      </div>

      <div class="sub-section primary">
        <div class="row">
          <h3>Discussion Questions</h3>
          <ol>
            <li>First question</li>
            <li>Second question</li>
          </ol>
        </div>
      </div>
    </div>



    <?php /****** Relevant Documents ******************************/ ?>

    <div class="section">
      <div class="sub-section">
        <div class="row">
          <h2>Relevant Documents</h2>
        </div>
      </div>
    </div>

    <?php /****** Referencess ******************************/ ?>

    <div id="references" class="section">
      <div class="sub-section">
        <div class="row">
          <h2>References</h2>
          <ol>
            <li>"Curabitur arcu justo, pellentesque ut finibus in" LaDainian Tomlinson. Curabitur arcu justo, pellentesque ut finibus in, faucibus sit amet libero. Vestibulum scelerisque consequat nisi, nec feugiat neque fermentum non. In congue ligula vel tempor tempor. faucibus sit amet libero. faucibus sit amet libero. 1997.</li>
            <li>"Name of text." LaDainian Tomlinson. Source. 1997.</li>
          </ol>
        </div>
      </div>




  </div> <!-- end main -->
</div>


@endsection
