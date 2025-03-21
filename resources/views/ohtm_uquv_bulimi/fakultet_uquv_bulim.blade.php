@extends('layouts.ohtm_uquv_bulimi')

@section('title', 'OHTM UQITUVCHI')

@section('link')

    <link href="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}"
          rel="stylesheet"
          type="text/css"/>
    <!-- DataTables -->
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>

    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
          rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('assets/libs/select2/css/select2.min.css" rel="stylesheet') }}" type="text/css"/>
    <link href="{{ asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- DataTables -->
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>

    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"/>
    {{-- <style>
        .vertical-line {
            border-left: 2px solid black;
            /* Chiziq qalinligi va rangi */
            height: 100vh;
            /* To‘liq ekranni egallaydi */
            position: absolute;
            left: 50%;
            top: 0;
            transform: translateX(-50%);
        }
    </style> --}}
    <style>
        .card {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .card-header {
            border-top-left-radius: 1px;
            border-top-right-radius: 1px;
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
    <div class="row ">
        <div class="col-12 ">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Fakultet</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Kafedra Boshlig'i</a></li>
                        <li class="breadcrumb-item active">Fanlar</li>
                    </ol>
                </div>

            </div>
        </div>

    </div>
    <div class="row">

        <div class="col-12">

            <!-- end page title -->

            <div class="row">
                @foreach ($fakultetlar as $fakultet)
                    <div class="col-4" style="width: 18rem; cursor: pointer; transition: 0.3s;"
                         onmouseover="this.style.backgroundColor='#f8f9fa'; this.style.transform='scale(1.05)';"
                         onmouseout="this.style.backgroundColor='109, 168, 231'; this.style.transform='scale(1)';"
                         onclick="window.location.href='{{route('uquvbulumi.kafedra_bosh.index',$fakultet->id)}}'">
                        <div class="card">
                            <div class="card-header" style="background-color:  #252b3b">
                                <span> Fakultet nomi    </span>
                                <i class="mdi mdi-ballot"></i>
                            </div>
                            <div class="card-body text-center">
                                <h4>{{ $fakultet->nomi }}</h3>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row mt-5">
                <div class="col-12 ">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Kafedralar</h4>

                    </div>
                </div>
            </div>

            <div class="row">

                @foreach ($kafedralar as $kafedra)
                    <div class="col-4" style="width: 18rem; cursor: pointer; transition: 0.3s;"
                         onmouseover="this.style.backgroundColor='#f8f9fa'; this.style.transform='scale(1.05)';"
                         onmouseout="this.style.backgroundColor='transparent'; this.style.transform='scale(1)';"
                         onclick="window.location.href='{{route('uquvbulumi.uquv_kafbosh.index', $kafedra->id) }}'">
                        <div class="card">
                            <div class="card-header" style="background-color: #252b3b">
                                <span> Kafedralar nomi</span>
                                <i class="mdi mdi-ballot"></i>
                            </div>
                            <div class="card-body text-center">
                                <h4>{{ $kafedra->nomi }}</h3>
                                    <div class="row col-12 mt-lg-4">
                                        <div class="col-lg-4"><strong>Fanlari soni: {{count($kafedra->fanlar)}}</strong></div>
                                        <div class="col-lg-4"><strong>O'qituvchilari soni: {{count($kafedra->uqituvchilar)}}</strong></div>
                                        <div class="col-lg-4"><strong>Kursantlari soni: {{count($kafedra->tinglovchi)}}</strong></div>
                                    </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

    </div>

@endsection

@section('script')

    <!-- JAVASCRIPT -->

    <!-- Required datatable js -->
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

    <script src="{{ asset('assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

    <!-- Datatable init js -->
    <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>


    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- Sweet alert init js-->
    <script src="{{ asset('assets/js/pages/sweet-alerts.init.js') }}"></script>

    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/libs/dropzone/min/dropzone.min.js') }}"></script>
    <script>
        @if (session('success'))
        Swal.fire({
            position: "center",
            icon: "success",
            title: "{{ session()->get('success') }}",
            showConfirmButton: false,
            timer: 1500
        });
        @endif
        @if (session('error'))

        Swal.fire({
            position: "center",
            icon: "error",
            title: "Xatolik!",
            text: "{{ session()->get('error') }}",
            showConfirmButton: false,
            timer: 1500
        });
        @endif

        @foreach ($errors->all() as $error)
        Swal.fire({
            icon: "error",
            title: "Xatolik!",
            text: "{{ $error }}",
            // footer: '<a href="#">Why do I have this issue?</a>'
        });
        @endforeach
    </script>
@endsection
