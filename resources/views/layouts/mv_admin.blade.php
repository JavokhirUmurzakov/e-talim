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

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style1" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->

    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
{{--    @dd(asset('assets/css/bootstrap.min.css') )--}}

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

{{--                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">--}}
{{--                        <i class="ri-menu-2-line align-middle"></i>--}}
{{--                    </button>--}}

                    <!-- App Search-->
{{--                    <form class="app-search d-none d-lg-block">--}}
{{--                        <div class="position-relative">--}}
{{--                            <input type="text" class="form-control" placeholder="Search...">--}}
{{--                            <span class="ri-search-line"></span>--}}
{{--                        </div>--}}
{{--                    </form>--}}
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
                            <img class="rounded-circle header-profile-user" src="{{ asset('assets/images/users/avatar-2.jpg') }}" alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ml-1">Kevin</span>
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

        <!-- ========== Left Sidebar Start ========== -->
        <div style="overflow: hidden;
    overflow-y: auto;" class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Jadvallar</li>

                        <li>
                            <a href="{{ route('mv_admin.akkreditatsiya.index') }}" class="waves-effect">
                                <i class="ri-dashboard-line"></i>
                                <span>Akkreditatsiya</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('mv_admin.ohtm.index') }}" class="waves-effect">
                                <i class="ri-dashboard-line"></i>
                                <span>OHTM</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('mv_admin.fak_kaf_turi.index') }}" class="waves-effect">
                                <i class="ri-dashboard-line"></i>
                                <span>Fakultet kafedra turi</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('mv_admin.dars_vaqti.index') }}" class="waves-effect">
                                <i class="ri-dashboard-line"></i>
                                <span>Dars vaqti</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('mv_admin.dars_turi.index') }}" class="waves-effect">
                                <i class="ri-dashboard-line"></i>
                                <span>Dars turi</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('mv_admin.tinglovchi_holat.index') }}" class="waves-effect">
                                <i class="ri-dashboard-line"></i>
                                <span>Tinglovchi holat</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('mv_admin.uquv_yili.index') }}" class="waves-effect">
                                <i class="ri-dashboard-line"></i>
                                <span>O'quv yili nomi</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('mv_admin.uquv_turi.index') }}" class="waves-effect">
                                <i class="ri-dashboard-line"></i>
                                <span>O'quv turi</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('mv_admin.kurs_holat.index') }}" class="waves-effect">
                                <i class="ri-dashboard-line"></i>
                                <span>Kurs holati</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('mv_admin.kurs_bosqich.index') }}" class="waves-effect">
                                <i class="ri-dashboard-line"></i>
                                <span>Kurs bosqich</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('mv_admin.baho_davomat_holat.index') }}" class="waves-effect">
                                <i class="ri-dashboard-line"></i>
                                <span>Baho davomat holati</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('mv_admin.ilmiy_unvon.index') }}" class="waves-effect">
                                <i class="ri-dashboard-line"></i>
                                <span>Ilmiy unvon</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('mv_admin.ilmiy_daraja.index') }}" class="waves-effect">
                                <i class="ri-dashboard-line"></i>
                                <span>Ilmiy daraja</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('mv_admin.harbiy_unvon.index') }}" class="waves-effect">
                                <i class="ri-dashboard-line"></i>
                                <span>Harbiy unvon</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('mv_admin.uqituvchi_holat.index') }}" class="waves-effect">
                                <i class="ri-dashboard-line"></i>
                                <span>O'qituvchi holat</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('mv_admin.role.index') }}" class="waves-effect">
                                <i class="ri-dashboard-line"></i>
                                <span>Role</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('mv_admin.til.index') }}" class="waves-effect">
                                <i class="ri-dashboard-line"></i>
                                <span>Tillar</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('mv_admin.nashr_turi.index') }}" class="waves-effect">
                                <i class="ri-dashboard-line"></i>
                                <span>Nashr turi</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('mv_admin.yutuq_yunalish.index') }}" class="waves-effect">
                                <i class="ri-dashboard-line"></i>
                                <span>Yutuq yo'nalish</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('mv_admin.tinglovchi_diplom.index') }}" class="waves-effect">
                                <i class="ri-dashboard-line"></i>
                                <span>Tinglovchi diplom</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('mv_admin.xabarlar.index') }}" class="waves-effect">
                                <i class="ri-dashboard-line"></i>
                                <span>Xabarlar</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('mv_admin.qabul_statistika.index') }}" class="waves-effect">
                                <i class="ri-dashboard-line"></i>
                                <span>Qabul statistikasi</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('mv_admin.fakultet_kafedra.index') }}" class="waves-effect">
                                <i class="ri-dashboard-line"></i>
                                <span>Fakultet kafedra</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('mv_admin.yunalishlar.index') }}" class="waves-effect">
                                <i class="ri-dashboard-line"></i>
                                <span>Yo'nalishlar</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('mv_admin.uquv_yili_ohtm.index') }}" class="waves-effect">
                                <i class="ri-dashboard-line"></i>
                                <span>O'quv yili OHTM</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('mv_admin.fanlar.index') }}" class="waves-effect">
                                <i class="ri-dashboard-line"></i>
                                <span>Fanlar</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('mv_admin.foydalanuvchi.index') }}" class="waves-effect">
                                <i class="ri-dashboard-line"></i>
                                <span>Tizim foydalanuvchilari</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('mv_admin.fan_uqituvchi.index') }}" class="waves-effect">
                                <i class="ri-dashboard-line"></i>
                                <span>Fan o'qituvchi</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    @yield('body-content')
                </div>
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> © Nazox.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-right d-none d-sm-block">
                                Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div data-simplebar class="h-100">
            <div class="rightbar-title px-3 py-4">
                <a href="javascript:void(0);" class="right-bar-toggle float-right">
                    <i class="mdi mdi-close noti-icon"></i>
                </a>
                <h5 class="m-0">Sozlamlar</h5>
            </div>

            <!-- Settings -->
            <hr class="mt-0" />
            <h6 class="text-center mb-0">Ko'rish rejimlari</h6>

            <div class="p-4">
{{--                <div class="mb-2">--}}
{{--                    <img src="assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="">--}}
{{--                </div>--}}
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
                    <label class="custom-control-label" for="light-mode-switch">Kunduzgi rejim</label>
                </div>

{{--                <div class="mb-2">--}}
{{--                    <img src="assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="">--}}
{{--                </div>--}}
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.css" />
                    <label class="custom-control-label" for="dark-mode-switch">Tungi rejim</label>
                </div>

{{--                <div class="mb-2">--}}
{{--                    <img src="assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="">--}}
{{--                </div>--}}
{{--                <div class="custom-control custom-switch mb-5">--}}
{{--                    <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css" />--}}
{{--                    <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>--}}
{{--                </div>--}}


            </div>

        </div> <!-- end slimscroll-menu-->
    </div>

</body>




<!-- JAVASCRIPT -->
<script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}" src=""></script>
<script src="{{ asset('assets/js/app.js') }}"></script>

@yield('script')
</html>
