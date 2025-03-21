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
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

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
                <h4 class="mb-0">Bosh sahifa</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">O'qituvchi</a></li>
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
                     onclick="window.location.href='{{route('uqituvchi.uqituvchi_guruh.index')}}'">
                    <div class="card">
                        <div class="card-header" style="background-color: #282c3c">
                            <span> Guruhlar</span>
                            <i class="mdi mdi-account-group"></i>
                        </div>
                        <div class="card-body text-center">
                            <h3>{{ $guruh_soni}}</h3>
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
                            <h3>{{ $fanlar_soni }}</h3>
                            <p class="text-muted">O'qituvchi fanlar soni</p>
                        </div>

                    </div>
                </div>


                <div class="col-4" style="width: 18rem; cursor: pointer; transition: 0.3s;"
                     onmouseover="this.style.backgroundColor='#f8f9fa'; this.style.transform='scale(1.05)';"
                     onmouseout="this.style.backgroundColor='transparent'; this.style.transform='scale(1)';"
                     onclick="window.location.href='#'" id="bir">
                    <div class="card">
                        <div class="card-header " style="background-color: #282c3c">
                            <span>Yillik reja bo'yicha</span>
                            <i class="mdi mdi-chart-areaspline "></i>
                        </div>
                        <div class="card-body d-flex justify-content-center align-items-center">
                            @foreach($yillik_reja as $reja)
                                <div class="text-center mx-4">
                                    <h3>{{$reja->soni}}</h3>
                                    <p class="text-muted">{{$reja->nashr_nomi}}</p>
                                </div>

                            @endforeach

                        </div>
                    </div>
                </div>

                <!-- Ilmiy salohiyat -->
                <div class="col-4" style="width: 18rem; cursor: pointer; transition: 0.3s;"
                     onmouseover="this.style.backgroundColor='#f8f9fa'; this.style.transform='scale(1.05)';"
                     onmouseout="this.style.backgroundColor='transparent'; this.style.transform='scale(1)';"
                     onclick="window.location.href='{{ route('uqituvchi.nashr.index') }}'">
                    <div class="card">
                        <div class="card-header " style="background-color: #282c3c">
                            <span>Erishgan ilmiy yutuqlari</span>
                            <i class=" ri-trophy-line"></i>
                        </div>

                        <div class="card-body d-flex justify-content-center align-items-center">
                            @foreach($nashr as $nash)
                                <div class="text-center mx-4">
                                    <h3>{{$nash->total}}</h3>
                                    <p class="text-muted">{{$nash->nashr_nomi}}</p>
                                </div>

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card col-lg-12">
                <div class="card-body">
                    <h4 class="card-title mb-4 font-size-22">Kafedra O'qituvchilari</h4>
                    <div class="table-responsive ">
                        <table class="table table-centered datatable dt-responsive nowrap" data-page-length="5"
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
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header " style="background-color: #282c3c">
                            <span>O'qituvchi erishgan yutuqlar</span>
                            <i class="mdi mdi-chart-areaspline "></i>
                        </div>
                        <div id="nashrChart" class="apex-charts"></div>
                    </div>
                </div>
                <div class="col-lg-6" id="ikki">
                    <div class="card">
                        <div class="card-header" style="background-color: #282c3c">
                            <span>Yillik reja bajarilganligi</span>
                            <i class="mdi mdi-chart-areaspline "></i>
                        </div>
                        <div class="card-body d-flex justify-content-center align-items-center row">
                            <div class="text-center">
                                <div id="charts-container" class="row d-flex justify-content-center align-items-center" style="display: flex; gap: 20px;"></div>
                            </div>
                        </div>
                        <div class="card-body border-top py-3 mt-n3">
                            <div class="text-truncate">
                                {{-- <li>{{$yillik_reja->uquv_yili}}</li> --}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <script>
        document.getElementById("bir").addEventListener("click", function () {
            document.getElementById("ikki").scrollIntoView({ behavior: "smooth" });
        });
    </script>
    <!-- JAVASCRIPT -->
    <script>
        // Laravel'dan kelgan ma'lumotlar
        const labels = @json($nashr->pluck('nashr_nomi'));
        const data = @json($nashr->pluck('total'));

        // Konsol orqali tekshirish
        console.log("Labels:", labels);
        console.log("Data:", data);

        var options = {
            chart: {
                type: 'bar',
                height: 350
            },
            series: [{
                name: 'Nashrlar soni',
                data: data
            }],
            xaxis: {
                categories: labels
            },
            colors: [
                '#33FF57',
                '#3357FF',
                '#C70039',
                '#68d3e8',
                '#008B8B',
                '#6A0DAD'
            ],
            plotOptions: {
                bar: {
                    distributed: true,
                    borderRadius: 2,
                    horizontal: false,
                    columnWidth: '45%'


                }
            },
            dataLabels: {
                enabled: true,
            },
            legend: {
                show: false
            }
        };

        var chart = new ApexCharts(document.querySelector("#nashrChart"), options);
        chart.render();
    </script>

    <script>
        // Laraveldan kelgan ma'lumotlarni JavaScriptga o'tkazamiz
        var totalTasks = {!! json_encode($totalTasks) !!};
        var completedTasks = {!! json_encode($completedTasks) !!};
        var nashrNames = {!! json_encode($nashrNames) !!}; // Nashr nomlari
        var container = document.getElementById("charts-container");
        totalTasks.forEach((totalTasks, index) => {
            var completed = completedTasks[index] || 0; // Agar qiymat bo'lmasa, 0 qo'yamiz
            var progress = parseInt((completed / totalTasks) * 100); // Foizni hisoblaymiz

            // Har bir chart uchun div yaratamiz
            var chartDiv = document.createElement("div");
            chartDiv.id = `chart-${index}`;
            chartDiv.style.width = "200px";

            container.appendChild(chartDiv); // Divni konteynerga qo‘shamiz

            var options = {
                chart: {
                    height: 250,
                    type: "radialBar",
                },
                series: [progress], // Hisoblangan foiz
                colors: ["#20E647"], // Yashil rang
                plotOptions: {
                    radialBar: {
                        hollow: {
                            margin: 0,
                            size: "60%",
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

                labels: [nashrNames[index]] // Ish nomi yoziladi
            };

            var chart = new ApexCharts(document.querySelector(`#chart-${index}`), options);
            chart.render();
        });
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
    <script
        src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

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


