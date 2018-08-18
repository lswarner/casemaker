
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
                <a href="{{ route('library') }}"><b>Library</b></a>
            </li>
            <li>
                <a href="{{ route('library_demo') }}"><b>Library Demo</b></a>
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

@else
  <li><a href="{{ route('login') }}">Login</a></li>
@endif
