<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/urc-style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/med-width.css') }}" rel="stylesheet">

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
                        <img src="{{ asset('img/isc-logo-web344.jpg')}}" />
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::user())

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ action('UserController@edit', Auth::user()) }}">Account</a>
                                    </li>

                                    @if (Auth::user()->is_admin)
                                    <li>
                                        <a href="{{ route('admin') }}">Dashboard</a>
                                    </li>
                                    @endif

                                    @if (Auth::user()->is_approved)
                                    <li>
                                        <a href="{{ route('home') }}">Case Studies</a>
                                    </li>
                                    @endif


                                    <li>
                                        <a href="#">How It Works</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
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
          <p class="text-muted text-center">&copy; {{ date('Y') }} CaseMaker</p>
        </div>
      </div>
    </footer>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://use.fontawesome.com/3f8a2a5be1.js"></script>

    @yield('scripts')

</body>
</html>
