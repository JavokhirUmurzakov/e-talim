
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

    </style>

@endsection

@section('content')

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Fanlar</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Kafedra Boshlig'i</a></li>
                            <li class="breadcrumb-item active">Fanlar</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            @foreach($fanlar as $fan)
            <div class="col-md-4 ">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
{{--                            @dd($fan->id)--}}
                            <h4 class="fas fa-book text-primary"><strong><a href="{{route('uqituvchi.into_fanlar.index' , ['fan_id' => $fan->id])}}" data-toggle="tooltip" title="Jurnallarni ko'rish"> {{$fan->nomi}}</a></strong></h4>
                            <h6 class="d-block text-muted">Qisqa nomi: {{$fan->qs_nomi}}</h6>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div><!-- container-fluid -->

        <!-- start page title -->
{{--        <div class="row">--}}
{{--            <div class="col-12">--}}
{{--                <div class="page-title-box d-flex align-items-center justify-content-between">--}}
{{--                    <h4 class="mb-0">Jurnal</h4>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="row">--}}
{{--            @foreach($fanlar as $fan)--}}
{{--            <div class="col-md-4">--}}
{{--                <div class="card shadow-lg">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="d-flex justify-content-between align-items-center">--}}
{{--                            <h4 class="fas fa-book text-primary"><strong> {{$fan->qs_nomi}}</strong></h4>--}}
{{--                            <h5 class="d-block text-muted">{{$fan->uquv_yili_nomi}}</h5>--}}
{{--                        </div>--}}
{{--                        <label>Guruh nomi: {{$fan->guruh_nomi}}</label>--}}
{{--                        <div class="row">--}}
{{--                            <p class="col-6">{{$fan->harbiy_unvon_nomi}} <strong>{{$fan->uqituvchi_fio}}</strong></p>--}}
{{--                            <div class="mt-2 col-6">--}}
{{--                                <div class="float-right m-2">Yakuniy--}}
{{--                                    @if($fan->jurnal_yakuniy)--}}
{{--                                        <i class="fas fa-check text-success"></i> --}}{{-- Yashil check belgi --}}
{{--                                    @else--}}
{{--                                        <i class="fas fa-times text-danger"></i> --}}{{-- Qizil x belgi --}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                                <div class="float-right m-2">--}}
{{--                                    Oraliq--}}
{{--                                    @if($fan->jurnal_oraliq)--}}
{{--                                        <i class="fas fa-check text-success"></i> --}}{{-- Yashil check belgi --}}
{{--                                    @else--}}
{{--                                        <i class="fas fa-times text-danger"></i> --}}{{-- Qizil x belgi --}}
{{--                                    @endif--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <p class="mb-1">Maruza darslari: <strong>{{$fan->jurnal_maruza}} soat</strong></p>--}}
{{--                        <div class="progress mb-3">--}}
{{--                            <div class="progress-bar bg-primary" role="progressbar" style="width: 60%;"--}}
{{--                                 aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <p class="mb-1">Amaliy darslari: <strong>{{$fan->jurnal_amaliy}} soat</strong></p>--}}
{{--                        <div class="progress">--}}
{{--                            <div class="progress-bar bg-success" role="progressbar" style="width: 40%;"--}}
{{--                                 aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">40%--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <hr class="my-4">--}}

{{--                        <div class="row text-center">--}}
{{--                            <div class="col-6" >--}}
{{--                                <a href="" class="mb-2 font-size-16 font-weight-semibold" data-toggle="tooltip" title="Jurnalga o'tish">Jurnal</a>--}}
{{--                            </div>--}}
{{--                            <div class="col-6">--}}
{{--                                <a href="" class="mb-2 font-size-16 font-weight-semibold" data-toggle="tooltip" title="Mavzularga o'tish">Mavzular</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}


    </section>

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
