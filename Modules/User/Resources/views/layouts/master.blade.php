    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>App name @yield('title')</title>
        {{-- Laravel Mix - CSS File --}}
        {{-- <link rel="stylesheet" href="{{ mix('css/user.css') }}"> --}}

        @extends('user::layouts.styles')


    </head>
{{--<body>--}}
        <body class="hold-transition sidebar-mini layout-fixed">
{{--        <body class="hold-transition sidebar-mini layout-fixed" style="background-color: red">--}}
{{--        <div class="wrapper ">--}}

            <!-- Preloader -->
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__shake" src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
            </div>
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href={{ url('/user') }} class="brand-link">

                    <img style="border-radius: 100px; border-style:double; border-color:#009933; padding: 1px;" src="{{ asset('img/vas_new.png') }}" height="60" width="60" class="img-responsive" alt="Admin logo" class="img-rounded">
                    <span class="brand-text font-weight-light">Administrator</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                        <div class="info">
{{--                            <a href="#" class="d-block">{{ $adminName->adminName }}</a>--}}
                        </div>
                    </div>

                    <!-- SidebarSearch Form -->
                    <div class="form-inline">
                        <div class="input-group" data-widget="sidebar-search">
                            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-sidebar">
                                    <i class="fas fa-search fa-fw"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                 with font-awesome or any other icon font library -->
                            <li class="nav-item menu-open">
                                <a href="#" class="nav-link active">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('/user') }}" class="nav-link active">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Dashboard </p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="pages/widgets.html" class="nav-link">
                                            <i class="nav-icon fas fa-th"></i>
                                            <p>
                                                Widgets
                                                <span class="right badge badge-danger">New</span>
                                            </p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon fas fa-chart-pie"></i>
                                            <p>
                                                VAS CINEMA
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="{{ route('manageAjahCinema') }}" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Manage Cinema [AJAH]</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('manageIkejaCinema') }}" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Manage Cinema  [IKEJA]</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('manageLekkiCinema') }}" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Manage Cinema [LEKKI]</p>
                                                </a>
                                            </li>

                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>



            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
{{--        </div>--}}
        <!-- ./wrapper -->



    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light" >
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Cinema</a>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->

            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                    <a href="" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="{{ asset('dist/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">

                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm" style="text-align: justify"> </p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>
                                    <span style="float: right" class="badge badge-info pull-right">

                </span>
                                </p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>

                    <div class="dropdown-divider"></div>


                    <a href="" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>
{{--    @extends('user::layouts.navbar')--}}
    <!-- /.navbar -->



        @yield('content')
        {{--    @extends('user::layouts.sidebar')--}}



    {{-- Laravel Mix - JS File --}}
    {{-- <script src="{{ mix('js/user.js') }}"></script> --}}

    @extends('user::layouts.footer')
    @extends('user::layouts.scripts')
    </body>
    </html>
