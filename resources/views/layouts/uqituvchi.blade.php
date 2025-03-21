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
            <div class="d-flex ">
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
                             @if(auth()->user()->uqituvchi == null || auth()->user()->uqituvchi->rasm == null)
                             src="{{asset('assets/images/users/logo.png')}}"
                             @else
                             src="{{asset('storage/' . auth()->user()->uqituvchi->rasm)}}"
                             @endif

                             alt="">
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
                    @if(auth()->check() && !is_null(auth()->user()) && isset(auth()->user()->uqituvchi) && isset(auth()->user()->uqituvchi->rahbar) && auth()->user()->uqituvchi->rahbar)
                        <li class="menu-title">Kafedra Boshlig'i</li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-store-2-line"></i>
                                <span>Kafedra Boshlig'i</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{route('uqituvchi.kaf_bosh_uqituvchi.index')}}">Bosh sahifa</a></li>
                                <li><a href="{{route('uqituvchi.fanlar_uqituvchi.index')}}">Fanlar</a></li>
                                <li><a href="{{route('uqituvchi.uqituvchilar.index')}}">O'qituvchilar</a></li>
                                <li><a href="{{route('uqituvchi.jurnal_uqituvchi.index')}}">Jurnal</a></li>
                                <li><a href="{{route('uqituvchi.fan_uqituvchi.index')}}">Fan Biriktirish</a></li>
                                <li><a href="{{route('uqituvchi.reja.index')}}">Yillik Reja</a></li>
                                <li><a href="{{route('uqituvchi.guruh.index')}}">Guruhlar</a></li>
                                <li><a href="{{route('uqituvchi.jadval_excel.index')}}">Mashg'ulot jadvali</a></li>
                                <li><a href="{{route('uqituvchi.kunlik_nazorat.index')}}">Kunlik nazorat

                                        <span style="width: 20px;
                                height: 20px;background-color: deepskyblue;border-radius: 10px;padding: 5px;color: #0b0b0b">{{$extra_data}}</span>

                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    <li class="menu-title">O'qituvchi</li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect ">
                            <i class="ri-store-2-line"></i>
                            <span>O'qituvchi</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">

                            <li><a href="{{route('uqituvchi.uqituvchi_home.index')}}">Bosh sahifa</a></li>

                            <li><a href="{{route('uqituvchi.uqituvchi_fanlar.index')}}">Fanlar</a></li>
                            <li><a href="{{route('uqituvchi.uqituvchi_shax_mal.index')}}">O'qituvchi shaxsiy malumotlar</a></li>
                            <li><a href="{{route('uqituvchi.uqituvchi_mavzukirit.index')}}">Mavzular</a></li>
                            <li><a href="{{route('uqituvchi.jadval_excel.index')}}">Mashg'ulot jadvali</a></li>
                            <li><a href="{{route('uqituvchi.nashr.index')}}">Nashr</a></li>
                            <li><a href="{{route('uqituvchi.oraliq.index')}}">Oraliqlar</a></li>
                            <li><a href="{{route('uqituvchi.yakuniy.index')}}">Yakuniy</a></li>
                            <li><a href="{{ route('uqituvchi.get_uqituvchi_yutuq.index') }}">Yutuqlar</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                @yield('content')
            </div>
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
    </div>

</div>

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
