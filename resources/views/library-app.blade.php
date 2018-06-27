<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CaseMaker') }}</title>

    <link rel="shortcut icon" href="{{ \App\CMS::first()->favicon }}" type="image/x-icon">
    <link rel="icon" href="{{ \App\CMS::first()->favicon }}" type="image/x-icon">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @yield('css')

</head>
<body>
    <div id="app">
        <div class="container-fluid container-wide">




            <nav class="navbar navbar-default navbar-static-top navbar-urc1">

                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="{{ url('/') }}"><img class="library-logo" src="{{ \App\CMS::first()->casemaker_logo }}" /></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav library-navbar">
                      <li><a class="nav-big" href="#">About</a></li>
                      <li><a class="nav-big" href="#">View Case Studies</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                      <div class="collapse navbar-collapse" id="app-navbar-collapse">
                          <!-- Right Side Of Navbar -->
                          <ul class="nav navbar-nav navbar-right">

                            @include('nav-user')

                          </ul>
                      </div>
                      <li class="pull-right"><a class="btn btn-urc-accent3" href="#">Create Case Studies</a></li>
                    </ul>
                </div>



                <?php /*




                    <ul class="nav navbar-nav navbar-left library-navbar">
                      <li></li>
                      <li><a class="nav-big" href="#">About</a></li>
                      <li><a class="nav-big" href="#">View Case Studies</a></li>
                      <li class="pull-right"><a class="nav-big" href="#">Create Case Study</a></li>
                    </ul>


                  <?php /*
                    <a class="navbar-left" href="{{ url('/') }}">
                        <img class="library-logo" src="{{ \App\CMS::first()->casemaker_logo }}" />
                        <ul class="nav navbar-nav library-navbar library-navbar-mid ">
                          <li><a class="nav-big" href="#">About</a></li>
                          <li><a class="nav-big" href="#">View</a></li>
                          <li><a class="nav-big" href="#">Create</a></li>
                        </ul>
                    </a>
                  ?>

                </div>

                */
                ?>

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
          <p class="footer-text text-center">&copy; {{ date('Y') }} {{ config('app.name', 'CaseMaker') }}</p>
        </div>
      </div>
    </footer>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://use.fontawesome.com/3f8a2a5be1.js"></script>

    @yield('scripts')

</body>
</html>
