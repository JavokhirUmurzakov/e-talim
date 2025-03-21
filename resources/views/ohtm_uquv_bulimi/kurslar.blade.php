@extends('layouts.ohtm_uquv_bulimi')

@section('title', "OHTM UQUV BO'LIMI")

@section('link')

    <link href="{{asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet"
          type="text/css"/>
    <!-- DataTables -->
    <link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"
          type="text/css"/>

    <!-- Responsive datatable examples -->
    <link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/libs/select2/css/select2.min.css" rel="stylesheet')}}" type="text/css"/>
    <link href="{{asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- DataTables -->
    <link href="{{asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css')}}" rel="stylesheet"
          type="text/css"/>

    <link href="{{asset('assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css"/>
    <style>

    </style>

@endsection

@section('content')

{{--    <div class="page-content mt-0">--}}
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Kurslar</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">E-ta'lim</a></li>
                                <li class="breadcrumb-item active">Kurslar</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="container-fluid w-100">
                <div class="container-fluid">
                    <div>
                        <p class="w-100 border border-secondary my-2 p-0"></p>
                        <div class="page-title-box d-flex align-items-center justify-content-between p-0 m-0">
                            <div class="page-title-left">
                                <button class="btn btn-success">Kurs yaratish</button>
                            </div>
                            <div class="page-title-right">
                                <button class="btn btn-secondary">Arxiv</button>
                            </div>
                        </div>
                        <p class="w-100 border border-secondary my-2 p-0"></p>
                    </div>


                    <p class="w-100 text-center bg-white py-3 h3"><b>Bakalavr</b> </p>

                    <div>
                        <div class="page-title-box mb-0 py-2">
                            <h4 class="mb-0 text-success">O'zbek</h4>
                        </div>

                        <div class="row">
                            @foreach($kurslar as $kurs)
                                <div class="col-md-3">
                                <div class="card border border-success">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body overflow-hidden">
                                                <p class="text-truncate font-size-14 mb-2">



                                                </p>
                                                <a href="" class="mb-0"><h4>kuzgi semestr - 2020-2022 yil({{$kurs->nomi}}) </h4></a>
                                            </div>
                                            <div class="text-primary">
                                                <img style="height: 24px" src="{{asset('assets\images\flags\uz.png')}}" >
                                            </div>
                                        </div>
{{--                                        @dd($course)--}}
                                        @foreach($course as $cour)
{{--                                            @dd($cour)--}}
                                        <p class="m-0 pt-2">{{$cour->guruhs_count}} ta guruh, {{$cour->tinglovchi_count}} ta tinglovchi.</p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="col-md-3">
                                <div class="card border border-success">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body overflow-hidden">
                                                <p class="text-truncate font-size-14 mb-2">Ta'tilda</p>
                                                <h4 class="mb-0">5-bosqich (2021-2023 yil)</h4>
                                            </div>
                                            <div class="text-primary">
                                                <img style="height: 24px" src="./assets/images/flags/uz.png" >
                                            </div>
                                        </div>
                                        <p class="m-0 pt-2">3 ta guruh, 100 ta tinglovchi.</p>
                                    </div>

                                    <div class="card-body border-top py-3">
                                        <div class="text-truncate">
                                            <span><b>Kurs rahbari:</b></span>
                                            <span class="text-muted ml-2">Testov T.T</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="page-title-box mb-0 py-2">
                            <h4 class="mb-0 text-warning">Qirg'iz</h4>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="card border border-warning">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body overflow-hidden">
                                                <p class="text-truncate font-size-14 mb-2">Amalyotda</p>
                                                <h4 class="mb-0">5-bosqich (2021-2023 yil)</h4>
                                            </div>
                                            <div class="text-primary">
                                                <img style="height: 24px" src="./assets/images/flags/kr.png" >
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-body overflow-hidden">
                                                <p class="text-truncate font-size-14 mb-2">3 ta guruh, 100 ta tinglovchi</p>
                                            </div>
                                            <div class="text-truncate">
                                                <span><b>Kurs rahbari:</b></span>
                                                <span class="ml-2">Testov T.T</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="page-title-box mb-0 py-2">
                            <h4 class="mb-0 text-warning">Tojik</h4>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="card border border-warning">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body overflow-hidden">
                                                <p class="text-truncate font-size-14 mb-2">Amalyotda</p>
                                                <h4 class="mb-0">5-bosqich (2021-2023 yil)</h4>
                                            </div>
                                            <div class="text-primary">
                                                <img style="height: 24px" src="./assets/images/flags/tj.png" >
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-body overflow-hidden">
                                                <p class="text-truncate font-size-14 mb-2">3 ta guruh, 100 ta tinglovchi</p>
                                            </div>
                                            <div class="text-black">
                                                <span><b>Kurs rahbari:</b></span>
                                                <span class="text-muted ml-2">Testov T.T</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="container-fluid">
                    <p class="w-100 text-center bg-white py-3 h3"><b>Magistratura</b></p>

                    <div>
                        <div class="page-title-box mb-0 py-2">
                            <h4 class="mb-0 text-success">O'zbek</h4>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="card border border-success">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body overflow-hidden">
                                                <p class="text-truncate font-size-14 mb-2">Ta'tilda</p>
                                                <h4 class="mb-0">Magistratura (2020-2022 yil)</h4>
                                            </div>
                                            <div class="text-primary">
                                                <img style="height: 24px" src="file:///D:/Azizjon/web%20uquv/ohtm_upvka/dist/assets/images/flags/uz.png" >
                                            </div>
                                        </div>
                                        <p class="m-0 pt-2">3 ta guruh, 100 ta tinglovchi.</p>
                                    </div>

                                    <div class="card-body border-top py-3">
                                        <div class="text-truncate">
                                            <span><b>Kurs rahbari:</b></span>
                                            <span class="text-muted ml-2">Testov T.T</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card border border-success">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body overflow-hidden">
                                                <p class="text-truncate font-size-14 mb-2">Ta'tilda</p>
                                                <h4 class="mb-0">Magistratura (2021-2023 yil)</h4>
                                            </div>
                                            <div class="text-primary">
                                                <img style="height: 24px" src="file:///D:/Azizjon/web%20uquv/ohtm_upvka/dist/assets/images/flags/uz.png" >
                                            </div>
                                        </div>
                                        <p class="m-0 pt-2">3 ta guruh, 100 ta tinglovchi.</p>
                                    </div>

                                    <div class="card-body border-top py-3">
                                        <div class="text-truncate">
                                            <span><b>Kurs rahbari:</b></span>
                                            <span class="text-muted ml-2">Testov T.T</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="container-fluid">
                    <p class="w-100 text-center bg-white py-3 h3"><b>Malaka oshirish</b></p>

                    <div>
                        <div class="page-title-box mb-0 py-2">
                            <h4 class="mb-0 text-success">O'zbek</h4>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="card border border-success">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body overflow-hidden">
                                                <p class="text-truncate font-size-14 mb-2">Ta'tilda</p>
                                                <h4 class="mb-0">Malaka oshirish (2020-2022 yil)</h4>
                                            </div>
                                            <div class="text-primary">
                                                <img style="height: 24px" src="file:///D:/Azizjon/web%20uquv/ohtm_upvka/dist/assets/images/flags/uz.png" >
                                            </div>
                                        </div>
                                        <p class="m-0 pt-2">3 ta guruh, 100 ta tinglovchi.</p>
                                    </div>

                                    <div class="card-body border-top py-3">
                                        <div class="text-truncate">
                                            <span><b>Kurs rahbari:</b></span>
                                            <span class="text-muted ml-2">Testov T.T</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card border border-success">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body overflow-hidden">
                                                <p class="text-truncate font-size-14 mb-2">Ta'tilda</p>
                                                <h4 class="mb-0">Malaka oshirish (2021-2023 yil)</h4>
                                            </div>
                                            <div class="text-primary">
                                                <img style="height: 24px" src="file:///D:/Azizjon/web%20uquv/ohtm_upvka/dist/assets/images/flags/uz.png" >
                                            </div>
                                        </div>
                                        <p class="m-0 pt-2">3 ta guruh, 100 ta tinglovchi.</p>
                                    </div>

                                    <div class="card-body border-top py-3">
                                        <div class="text-truncate">
                                            <span><b>Kurs rahbari:</b></span>
                                            <span class="text-muted ml-2">Testov T.T</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div> <!-- container-fluid -->
    </div>

@endsection

@section('script')

    <!-- JAVASCRIPT -->

    <!-- Required datatable js -->
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('assets/libs/jszip/jszip.min.js')}}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>

    <script src="{{ asset('assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{ asset('assets/libs/datatables.net-select/js/dataTables.select.min.js')}}"></script>

    <!-- Responsive examples -->
    <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

    <!-- Datatable init js -->
    <script src="{{ asset('assets/js/pages/datatables.init.js')}}"></script>


    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

    <!-- Sweet alert init js-->
    <script src="{{ asset('assets/js/pages/sweet-alerts.init.js')}}"></script>

    <script src="{{ asset('assets/libs/select2/js/select2.min.js')}}"></script>
    <script src="{{ asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{ asset('assets/libs/dropzone/min/dropzone.min.js')}}"></script>
    <script>
        @if(session('success'))
        Swal.fire({
            position: "center",
            icon: "success",
            title: "{{ session()->get('success') }}",
            showConfirmButton: false,
            timer: 1500
        });
        @endif
        @if(session('error'))

        Swal.fire({
            position: "center",
            icon: "error",
            title: "Xatolik!",
            text: "{{ session()->get('error') }}",
            showConfirmButton: false,
            timer: 1500
        });
        @endif

        @foreach($errors->all() as $error)
        Swal.fire({
            icon: "error",
            title: "Xatolik!",
            text: "{{$error}}",
            // footer: '<a href="#">Why do I have this issue?</a>'
        });
        @endforeach
    </script>
@endsection

