<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>PayRight</title>
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>


    <div class="top-bar" id="main-menu">
        <div class="top-bar-left">
            <ul class="dropdown menu" data-dropdown-menu>
                <li class="menu-text">PayRight</li>
            </ul>
        </div>
        <div class="top-bar-right">
            <ul class="menu" data-responsive-menu="drilldown medium-dropdown">

                @if($signedIn)

                    <li class="has-submenu">
                        <a href="#">{{ $user->name }}</a>
                        <ul class="submenu menu vertical" data-submenu>
                            <li><a href="/auth/logout">Logout</a></li>
                        </ul>
                    </li>

                @else

                    <li><a href="/auth/login">Login</a></li>
                    <li><a href="#">Sign up</a></li>

                @endif

            </ul>


        </div>
    </div>






    <div class="container">
        @yield('content')
    </div>



    <script src="/js/all.js"></script>

    @include('flash')

    </body>
</html>
