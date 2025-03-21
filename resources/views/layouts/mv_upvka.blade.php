<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Fonts -->
    <link href="{{ asset('assets/images/favicon.ico') }}" rel="shortcut icon"/>

    <!-- Bootstrap Css -->

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->

    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/style.css')}}" id="app-style" rel="stylesheet" type="text/css" />


    @yield('link')

    <!-- Scripts -->
    {{--    @vite(['resources/sass/app.scss', 'resources/js/app.js'])--}}
</head>
<body data-sidebar="dark">
<div id="layout-wrapper">
    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="#" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset('assets/images/logo.png') }}" alt="" height="50" width="50">
                                </span>
                        <span class="logo-lg">
                                <img src="{{ asset('assets/images/logo.png') }}" alt="" height="45" stre>
                                </span>
                        <span class="font-size-20 text-white pt-1">
                                E-harbiy ta'lim
                                </span>
                    </a>
                </div>

{{--                <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">--}}
{{--                    <i class="ri-menu-2-line align-middle"></i>--}}
{{--                </button>--}}

            </div>

            <div class="d-flex">

                <div class="dropdown d-inline-block d-lg-none ml-2">
                    <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ri-search-line"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                         aria-labelledby="page-header-search-dropdown">

                        <form class="p-3">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ...">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><i class="ri-search-line"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="dropdown d-none d-lg-inline-block ml-1">
                    <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                        <i class="ri-fullscreen-line"></i>
                    </button>
                </div>

                <div class="dropdown d-inline-block user-dropdown">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user"
                                 src="{{asset('assets/images/users/logo.png')}}"
                             alt="MV UPVKA">
                        <span class="d-none d-xl-inline-block ml-1">{{auth()->user()->login}}</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        <a class="dropdown-item" href="#"><i class="ri-user-line align-middle mr-1"></i> Kabinet</a>
                        <div class="dropdown-divider"></div>
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            @method('post')
                            <button class="dropdown-item text-danger" type="submit"><i class="ri-shut-down-line align-middle mr-1 text-danger"></i><span>Chiqish</span></button>
                        </form>

                    </div>
                </div>

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                        <i class="ri-settings-2-line"></i>
                    </button>
                </div>

            </div>
        </div>
    </header>

    <div style="overflow: hidden;
    overflow-y: auto;" class="vertical-menu">

        <div data-simplebar class="h-150">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title">OHTMlar</li>

                    @foreach(Session::get('ohtms') as $ohtm)
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-store-2-line"></i>
                                <span>{{$ohtm->qs_nomi}}</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="/">Fakultetlar</a></li>
                                <li><a href="{{route('mv_upvka.yunalish.index', $ohtm->id)}}">Yo'nalishlar</a></li>
                                <li><a href="/">Chet eldagi kursantlar</a></li>
                                <li><a href="/">Xorijiy kursantlar</a></li>
                                <li><a href="/">Statistika</a></li>
                            </ul>
                        </li>
                    @endforeach
                    <li class="menu-title">Xabar</li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-mail-send-line"></i>
                            <span>Xabarlar</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="email-inbox.html">Kiruvchi xabarlar</a></li>
                            <li><a href="email-read.html">Xabarlarni o'qish</a></li>
                        </ul>
                    </li>
                    <li class="menu-title">Qabul</li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-bar-chart-line"></i>
                            <span>Qabul statistikasi</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="charts-apex.html">Apexcharts</a></li>
                            <li><a href="charts-chartjs.html">Chartjs</a></li>
                            <li><a href="charts-flot.html">Flot</a></li>
                            <li><a href="charts-knob.html">Jquery Knob</a></li>
                            <li><a href="charts-sparkline.html">Sparkline</a></li>
                        </ul>
                    </li>
                    <li class="menu-title">Akkreditatsiya</li>
                    <li>
                        <a href="{{route('mv_upvka.akkreditatsiya.index')}}" class=" waves-effect">
                            <i class="ri-share-line"></i>
                            <span>Akkreditatsiya</span>
                        </a>
                    </li>
                    <li class="menu-title">Admin</li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-bar-chart-line"></i>
                            <span>Admin</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{route('mv_upvka.ohtm.index')}}">OHTM</a></li>
                            <li><a href="{{route('mv_upvka.ohtmadmin.index')}}">OHTM adminlar</a></li>
                            <li><a href="{{route('mv_upvka.unvon.index')}}">Ilmiy unvonlar</a></li>
                            <li><a href="{{route('mv_upvka.daraja.index')}}">Ilmiy darajalar</a></li>
                        </ul>
                    </li>


                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>

    @yield('content')

</div>
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>document.write(new Date().getFullYear())</script>
                 - AKT va AHI
            </div>
            <div class="col-sm-6">
                <div class="text-sm-right d-none d-sm-block">
                    Developed<i class="mdi text-danger"></i> by AKT va AHI
                </div>
            </div>
        </div>
    </div>
</footer>
@yield('script')
<!-- JAVASCRIPT -->
<script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}" src=""></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>
