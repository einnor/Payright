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

                <button class="close-button" aria-label="Close menu" type="button" data-close>
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul class="mobile-ofc vertical menu blackish mymenu">

                    @if($signedIn)
                        <li><a href="#">MENU</a></li>

                        <li class="border">
                            <a href="#">Invoices</a>
                            <ul class="submenu menu vertical" data-submenu>

                                <li><a href="/invoices">All Invoices</a></li>
                                <li><a href="/invoices/type/uncommitted">Uncommitted Invoices</a></li>
                                <li><a href="/invoices/type/committed">Committed Invoices</a></li>
                                <li><a href="/invoices/type/reviewed">Reviewed Payments</a></li>
                                <li><a href="/invoices/type/approved">Approved Payments</a></li>
                                <li><a href="/invoices/type/settled">Settled Payments</a></li>
                            </ul>
                        </li>

                        <li class="border"><a href="/clients">Clients</a></li>

                        @if($role_key == 4)
                            <li class="border"><a href="/users">Users</a></li>
                        @endif

                    @else
                        <h6 class="text-center">You need to be logged in to access this menu</h6>
                    @endif
                </ul>


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
                                        <span class="role">( {{ $role[$role_key] }} )</span>
                                    </a>
                                    <ul class="menu black">
                                        <li><a href="/auth/password/edit">Change Password</a></li>
                                        <li><a href="/auth/logout">Logout</a></li>
                                    </ul>
                                </li>



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

    @yield('scripts.footer')

    @include('flash')

    </body>
</html>
