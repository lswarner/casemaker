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
            <nav class="navbar navbar-default navbar-static-top navbar-urc1">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-left" href="{{ url('/') }}">
                        <!-- <img src="{{ asset('img/isc-logo-web344.jpg')}}" /> -->
                        <img class="casemaker-logo" src="{{ \App\CMS::first()->casemaker_logo }}" />
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">

                        @include('nav-user')

                    </ul>
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
          <p class="footer-text text-center">&copy; {{ date('Y') }} {{ \App\CMS::first()->casemaker_title }}</p>
        </div>
      </div>
    </footer>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://use.fontawesome.com/3f8a2a5be1.js"></script>

    @yield('scripts')

</body>
</html>
