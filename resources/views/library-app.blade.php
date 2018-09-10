<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ \App\CMS::first()->casemaker_title }}</title>

    <link rel="shortcut icon" href="{{ \App\CMS::first()->favicon }}" type="image/x-icon">
    <link rel="icon" href="{{ \App\CMS::first()->favicon }}" type="image/x-icon">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @yield('css')

</head>
<body>
    <div id="app">
        <div class="container-fluid container-wide">

          <?php
            $current_name= \Route::currentRouteName() or "";
          ?>

<?php /*

          <!-- Static navbar -->
                <div class="navbar navbar-default navbar-shade">
                  <a class="pull-left"><img class="library-logo" src="{{ \App\CMS::first()->library_logo }}"></a>
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                  </div>
                  <div class="navbar-collapse collapse navbar-library">
                    <ul class="nav navbar-nav">
                      <li><a class="nav-big" href="#filter-bar">Case Studies</a></li>
                      <li><a class="nav-big" href="#">About</a></li>

                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Luke Warner <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="#">Action</a></li>
                          <li><a href="#">Another action</a></li>
                          <li><a href="#">Something else here</a></li>
                          <li class="divider"></li>
                          <li class="dropdown-header">Nav header</li>
                          <li><a href="#">Separated link</a></li>
                          <li><a href="#">One more separated link</a></li>
                        </ul>
                      </li>
                      <li><a href="../navbar-static-top/">Create Case Study</a></li>
                    </ul>
                  </div><!--/.nav-collapse -->
                </div>


*/ ?>




            <nav class="navbar navbar-default navbar-static-top navbar-shade">

              <div class="container-fluid">

                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="{{ url('/') }}"><img class="library-logo" src="{{ \App\CMS::first()->library_logo }}" /></a>
                </div>
                <div id="navbar" class="navbar-library navbar-collapse collapse">
                    <ul class="nav navbar-nav library-navbar">
                      @if($current_name == "library")
                      <li><a class="nav-big" href="#filter-bar">Case Studies</a></li>
                      @else
                      <li><a class="nav-big" href="{{ route('library') }}">Case Studies</a></li>
                      @endif
                      <li><a class="nav-big" href="{{ route('library_about') }}">About</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                      <div class="collapse navbar-collapse" id="app-navbar-collapse">
                          <!-- Right Side Of Navbar -->
                          <ul class="nav navbar-nav nav-pull-right ">

                            @include('nav-user')

                          </ul>
                      </div>
                      <li class="pull-right"><a class="btn btn-urc-accent2 btn-create-casestudy" href="{{ route('home') }}">Create Case Studies</a></li>
                    </ul>
                </div>

              </div>
            </nav>



        </div>


        @if(Session::has('message'))
           <div class="container-fluid container-wide">
               <div class="row row-flash">
                   <div class="col-md-12 {{ Session::get('alert-class', 'flash-success') }}"><h3>{{ Session::get('message') }}</h3></div>
               </div>
           </div>
       @endif


        @yield('content')
    </div>


    <footer class="footer">
      <div class="container-fluid container-wide">
        <div class="footer-main">
          <p class="footer-text text-center">&copy; {{ date('Y') }}  {{ \App\CMS::first()->casemaker_title }}</p>
        </div>
      </div>
    </footer>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://use.fontawesome.com/3f8a2a5be1.js"></script>

    @yield('scripts')

</body>
</html>
