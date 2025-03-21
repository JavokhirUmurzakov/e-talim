@extends('layouts.uqituvchi')

@section('title', "OHTM UQITUVCHI")

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
    </style>

@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Kafedra Boshlig'i</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Kafedra Boshlig'i</a></li>
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
                <!-- Guruhlar soni -->
                <div class="col-4" style="width: 18rem; cursor: pointer; transition: 0.3s;"
                     onmouseover="this.style.backgroundColor='#f8f9fa'; this.style.transform='scale(1.05)';"
                     onmouseout="this.style.backgroundColor='transparent'; this.style.transform='scale(1)';"
                     onclick="window.location.href='{{ route('uqituvchi.guruh.index') }}'">
                    <div class="card">
                        <div class="card-header" style="background-color: #282c3c">
                            <span> Guruhlar</span>
                            <i class="mdi mdi-account-group"></i>
                        </div>
                        <div class="card-body text-center">
                            <h3>{{$guruh_soni}}</h3>
                            <p class="text-muted">Jami guruhlar soni</p>
                        </div>
                    </div>
                </div>

                {{-- Uqituvchilar--}}
                <div class="col-4" style="width: 18rem; cursor: pointer; transition: 0.3s;"
                     onmouseover="this.style.backgroundColor='#f8f9fa'; this.style.transform='scale(1.05)';"
                     onmouseout="this.style.backgroundColor='transparent'; this.style.transform='scale(1)';"
                     onclick="window.location.href='{{ route('uqituvchi.uqituvchilar.index') }}'">
                    <div class="card">
                        <div class="card-header" style="background-color: #282c3c">
                            <span> O`qituvchilar</span>
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="card-body text-center">
                            <h3>{{$uqituvchilar_soni}}</h3>
                            <p class="text-muted">Jami guruhlar soni</p>
                        </div>
                    </div>
                </div>
                <!-- Fanlar -->
                <div class="col-4" style="width: 18rem; cursor: pointer; transition: 0.3s;"
                     onmouseover="this.style.backgroundColor='#f8f9fa'; this.style.transform='scale(1.05)';"
                     onmouseout="this.style.backgroundColor='transparent'; this.style.transform='scale(1)';"
                     onclick="window.location.href='{{ route('uqituvchi.fanlar_uqituvchi.index') }}'">
                    <div class="card">
                        <div class="card-header " style="background-color: #282c3c">
                            <span>Fanlar</span>
                            <i class="ri-book-open-fill"></i>
                        </div>
                        <div class="card-body text-center">
                            <h3>{{$fanlar_soni}}</h3>
                            <p class="text-muted">Yangi qo'shilgan guruhlar</p>
                        </div>
                    </div>
                </div>

                <!-- Yuklama -->

                <div class="col-4" style="width: 18rem; cursor: pointer; transition: 0.3s;"
                     onmouseover="this.style.backgroundColor='#f8f9fa'; this.style.transform='scale(1.05)';"
                     onmouseout="this.style.backgroundColor='transparent'; this.style.transform='scale(1)';"
                     onclick="window.location.href='#'">
                    <div class="card">
                        <div class="card-header " style="background-color: #282c3c">
                            <span>Yuklama</span>
                            <i class="ri-stack-fill"></i>
                        </div>
                        <div class="card-body text-center">
                            <h3>5</h3>
                            <p class="text-muted">Yangi qo'shilgan guruhlar</p>
                        </div>
                    </div>
                </div>

                <!-- Ilmiy salohiyat -->
                <div class="col-4" style="width: 18rem; cursor: pointer; transition: 0.3s;"
                     onmouseover="this.style.backgroundColor='#f8f9fa'; this.style.transform='scale(1.05)';"
                     onmouseout="this.style.backgroundColor='transparent'; this.style.transform='scale(1)';"
                     onclick="window.location.href='#'">
                    <div class="card">
                        <div class="card-header " style="background-color: #282c3c">
                            <span>Ilmiy salohiyat</span>
                            <i class="mdi mdi-chart-areaspline"></i>
                        </div>
                        <div class="card-body text-center">
                            <h3>{{$kaf_ilmiy_sal}}%</h3>
                            <p class="text-muted">Kafedra o`qituvchilar ilmiy salohiyati</p>
                        </div>
                    </div>
                </div>

                <!-- Card 5: Fanlar -->
                <div class="col-4" style="width: 18rem; cursor: pointer; transition: 0.3s;"
                     onmouseover="this.style.backgroundColor='#f8f9fa'; this.style.transform='scale(1.05)';"
                     onmouseout="this.style.backgroundColor='transparent'; this.style.transform='scale(1)';"
                     onclick="window.location.href='{{ route('uqituvchi.reja.index') }}'">
                    <div class="card">
                        <div class="card-header " style="background-color: #282c3c">
                            <span>Yillik reja</span>
                            <i class="mdi mdi-chart-areaspline"></i>
                        </div>
                        <div class="card-body text-center">
                            <h3>5</h3>
                            <p class="text-muted">Yangi qo'shilgan guruhlar</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">


                <h4 class="card-title mb-4 font-size-22 text-center ">O`qituvchilar haqida malumot</h4>

                <div class="table-responsive">
                    <table class="table table-centered datatable dt-responsive nowrap" data-page-length="5"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead class="text-light" style="background-color: #282c3c">
                        <tr>
                            <th style="width: 30px;">
                                T/r
                            </th>
                            <th><strong>FIO</strong></th>
                            <th><strong>Harbiy unvoni</strong></th>
                            <th><strong>Tug'ilgan yili</strong></th>
                            <th><strong>Ilmiy unvon</strong></th>
                            <th><strong>Mutaxassisligi</strong></th>
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
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header " style="background-color: #282c3c">
                    <span>Ilmiy salohiyat </span>
                    <i class="mdi mdi-chart-areaspline"></i>
                </div>
                <div class="card-body d-flex justify-content-center align-items-center row">
                    <div class="text-center m-n3">
                        <div id="chart" class="row d-flex justify-content-center align-items-center"
                             style="display: flex; gap: 20px;"></div>
                    </div>
                </div>

                <div class="card-body border-top py-3 mt-n3">
                    <div class="text-truncate">
                        {{--                            <li>{{$reja->uquv_yili}}</li>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

    {{--    Chart diogramma--}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var options = {
                series: [{{ $kaf_ilmiy_sal }}], // Laraveldan kelgan ma'lumot
                chart: {
                    height: 350,
                    type: "radialBar"
                },
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
                                show: true
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
                        stops: [0, 50]
                    }
                },
                stroke: {
                    lineCap: "round"
                },
                labels: ["Kafedraning ilmiy salohiyati"]
            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        });
    </script>
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
    <script src="{{ asset('assets/js/pages/dashboard.init.js')}}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.init.js')}}"></script>

    <!-- Datatable init js -->
    <script src="{{ asset('assets/js/pages/datatables.init.js')}}"></script>

    <!-- apexschart -->
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>


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
