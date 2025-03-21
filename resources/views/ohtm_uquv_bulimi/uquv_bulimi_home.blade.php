@extends('layouts.ohtm_uquv_bulimi')

@section('title', "ohtm_uquv_bulimi")

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
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <style>
        .card {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .card-header {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            color: #fff;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
        }

        .card-body {
            padding: 30px;
        }

        .icon-container {
            font-size: 3rem;
            margin-bottom: 15px;
        }

        .card h3 {
            font-size: 2.5rem;
        }

        .card-header i {
            font-size: 1.8rem;
        }

        .card-hover:hover {
            transform: scale(0.94);
            transition: all 0.3s ease-in-out;
            background-color: #dfdfde;
            color: white;
        }
    </style>

@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Bosh sahifa</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">O'quv bo'limi</a></li>
                        <li class="breadcrumb-item active">Bosh sahifa</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-4">

                    <a href="{{ route('uquvbulumi.fakultet_bosh.index') }}" class="text-decoration-none">
                        <div class="card card-hover">
                            <div class="card-header" style="background-color: #282c3c">
                                <span>Fakutet va Kafedralar</span>

                                <i class="mdi mdi-ballot"></i>
                            </div>
                            <div class="card-body text-center">
                                <h3>{{ $fak_kaf_soni}}</h3>
                                <p class="text-muted">Jami kafedralar soni</p>
                            </div>



                        </div>
                    </a>
                </div>
                <!-- Fanlar -->
                <div class="col-4">

                    <a href="{{ route('uquvbulumi.fakultet_bosh.index') }}" class="text-decoration-none">

                        <div class="card card-hover">
                            <div class="card-header " style="background-color: #282c3c">
                                <span>Fanlar</span>
                                <i class="ri-book-open-fill"></i>
                            </div>
                            <div class="card-body text-center">
                                <h3>{{ $fan }}</h3>
                                <p class="text-muted">OHTMdagi fanlar soni</p>
                            </div>



                        </div>
                    </a>
                </div>

                <div class="col-4">

                    <a href="{{ route('uquvbulumi.yunalish_bosh.index') }}" class="text-decoration-none">

                        <div class="card card-hover">
                            <div class="card-header" style="background-color: #282c3c">
                                <span> Yo'nalishlar</span>
                                <i class="mdi mdi-account-switch"></i>
                            </div>
                            <div class="card-body text-center">
                                <h3>{{ $yunalish}}</h3>
                                <p class="text-muted">Jami yo'nalishlar soni</p>
                            </div>



                        </div>
                    </a>
                </div>
                <div class="col-4">

                    <a href="{{ route('uquvbulumi.fakultet_bosh.index') }}" class="text-decoration-none">

                        <div class="card card-hover">
                            <div class="card-header" style="background-color: #282c3c">
                                <span>  O'qituvchilar</span>
                                <i class="mdi mdi-account-tie"></i>
                            </div>
                            <div class="card-body text-center">
                                <h3>{{ $uqituvchi_u}}</h3>
                                <p class="text-muted">Jami o'qituvchilar soni</p>
                            </div>



                        </div>
                    </a>
                </div>
                <div class="col-4">

                    <a href="{{ route('uquvbulumi.fakultet_bosh.index') }}" class="text-decoration-none">

                        <div class="card card-hover">
                            <div class="card-header" style="background-color: #282c3c">
                                <span>  Kursantlar</span>
                                <i class="mdi mdi-account-details"></i>
                            </div>
                            <div class="card-body text-center">
                                <h3>{{ $tinglovchi}}</h3>
                                <p class="text-muted">Jami kursantalar soni</p>
                            </div>


                        </div>
                    </a>
                </div>
                <div class="col-4">

                    <a href="{{ route('uquvbulumi.fakultet_bosh.index') }}" class="text-decoration-none">

                        <div class="card card-hover">
                            <div class="card-header" style="background-color: #282c3c">
                                <span>Guruhlar</span>
                                <i class="mdi mdi-account-group"></i>
                            </div>
                            <div class="card-body text-center">
                                <h3>{{ $guruh}}</h3>
                                <p class="text-muted">Jami guruhlar soni</p>
                            </div>



                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card col-lg-12">
                <div class="card-body">

                    <h4 class="card-title mb-4 font-size-22 text-center">Kafedra boshliqlari</h4>
                    <div class="table-responsive ">
                        <table class="table table-centered datatable dt-responsive nowrap text-center" data-page-length="5"

                               style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="text-light" style="background-color: #282c3c">
                            <tr>
                                <th style="width: 20px;">
                                    T/r
                                </th>
                                <th><strong>FIO</strong></th>
                                <th><strong>Harbiy unvoni</strong></th>
                                <th><strong>Tug'ilgan yili</strong></th>
                                <th><strong>Ilmiy unvon</strong></th>
                                <th><strong>Mutaxassisligi</strong></th>
                                <th><strong>Kafedralar</strong></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($uqituvchi as $uqit)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><strong>{{$uqit->fio}}</strong></td>
                                    <td>{{$uqit->harbiy_unvon_nomi}}</td>
                                    <td>{{$uqit->tugilgan_sana}}</td>
                                    <td>{{$uqit->ilmiy_unvon_nomi}}</td>
                                    <td>{{$uqit->mutaxassisligi}}</td>
                                    <td>{{$uqit->fak_kaf_nomi}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header" style="background-color: #282c3c">
                            <span>O'qituvchilarni ilmiy salohiyati</span>
                            <i class="mdi mdi-chart-areaspline "></i>
                        </div>
                        <div class="card-body d-flex justify-content-center align-items-center row">
                            <div class="text-center">
                                <div id="chart" class="row d-flex justify-content-center align-items-center"
                                     style="display: flex; gap: 20px;"></div>
                            </div>
                        </div>

                        <div class="card-body border-top py-3 mt-n3">
                            <div class="text-truncate">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <!-- JAVASCRIPT -->
    <script>
        var umumiy={{$umumiy}};
        var options = {
            chart: {
                height: 280,
                type: "radialBar",
            },

            series: [umumiy],
            colors: ["#20E647"],
            plotOptions: {
                radialBar: {
                    hollow: {
                        margin: 0,
                        size: "70%",
                        background: "#293450"
                    },
                    track: {
                        dropShadow: {
                            enabled: true,
                            top: 2,
                            left: 0,
                            blur: 4,
                            opacity: 0.15
                        }
                    },
                    dataLabels: {
                        name: {
                            offsetY: -10,
                            color: "#fff",
                            fontSize: "13px"
                        },
                        value: {
                            color: "#fff",
                            fontSize: "30px",
                            show: true,
                            formatter: function(val) { return val + "%"; }
                        }
                    }
                }
            },
            fill: {
                type: "gradient",
                gradient: {
                    shade: "dark",
                    type: "vertical",
                    gradientToColors: ["#87D4F9"],
                    stops: [0, 100]
                }
            },
            stroke: {
                lineCap: "round"
            },
            labels: ["O'qituvchilar ilmiy salohiyati"]

        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);

        chart.render();
    </script>



    <script src="{{asset('assets/js/pages/apexcharts.init.js')}}"></script>
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
