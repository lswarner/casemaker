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



  </div> <!-- end main -->
</div>


@endsection
