<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>PayRight</title>
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>


    <div class="off-canvas-wrapper">
        <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
            <div class="off-canvas position-left" id="offCanvas" data-off-canvas>

                <!--Side Menu-->

                <aside class="left-off-canvas-menu">

                    <div class="icon-bar vertical five-up">
                        <a class="item">
                            <i class="fi-home"></i>
                            <label>Home</label>
                        </a>
                        <a class="item">
                            <i class="fi-home"></i>
                            <label>Bookmark</label>
                        </a>
                        <a class="item">
                            <i class="fi-home"></i>
                            <label>Info</label>
                        </a>
                        <a class="item">
                            <i class="fi-home"></i>
                            <label>Mail</label>
                        </a>
                        <a class="item">
                            <i class="fi-home"></i>
                            <label>Like</label>
                        </a>
                    </div>

                </aside>


            </div>


            <div class="off-canvas-content" data-off-canvas-content>

                <!-- Main -->

                <div class="title-bar" id="main-menu">
                    <div class="top-bar-left">
                        <ul class="dropdown menu" data-dropdown-menu>
                            <button class="menu-icon" type="button" data-toggle="offCanvas" aria-expanded="false" aria-controls="offCanvas"></button>
                            <div class="title-bar-title">PayRight</div>
                        </ul>
                    </div>
                    <div class="top-bar-right">
                        <ul class="dropdown menu" data-dropdown-menu>

                            @if($signedIn)

                                <li>
                                    <a href="#">
                                        {{ $user->name }}
                                        <span class="role">( {{ $role }} )</span>
                                    </a>
                                    <ul class="menu black">
                                        <li><a href="#">Change Password</a></li>
                                    </ul>
                                </li>
                                <li><a href="/auth/logout">Logout</a></li>


                            @else

                                <li><a href="/auth/login">Login</a></li>

                            @endif

                        </ul>
                    </div>
                </div>





                <div class="container">
                    @yield('content')
                </div>


            </div>
        </div>
    </div>






    <script src="/js/all.js"></script>

    @include('flash')

    </body>
</html>
