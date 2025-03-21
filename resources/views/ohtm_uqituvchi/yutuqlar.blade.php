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
                <h4 class="mb-0">Yutuqlar sahifasi</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Uqituvchi</a></li>
                        <li class="breadcrumb-item active">Yutuqlar sahifasi</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row mt-1">
        <div class="col-xl-12">
            <div class="card-title float-right">
                {{--                        modal !!! create  !!!!name bilan id lar bir xil bolmasligi kerak --}}
                <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                        data-target=".bs-example-modal-xl">Yutuq qo'shish
                </button>

                <div class="modal fade bs-example-modal-xl" data-backdrop="static" tabindex="-1" role="dialog"
                     aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0" id="myExtraLargeModalLabel1">Yangi
                                    yutuq qo'shish</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form name="add-blog-post-form" id="add-blog-post-form" method="post"
                                      action="{{ route('uqituvchi.uqituvchi_yutuq.create') }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="validationCustom01">Yutuq faylini yuklang</label>
                                                    <input type="file" name="file"
                                                           class="form-control" placeholder="yutuq fayli" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="control-label">yutuq turi</label>
                                                    <select name="yutuq_turi" class="form-control" required>
                                                        <option>Tanlash...</option>
                                                        @foreach ($yutuq_turis as $tur)
                                                            <option value="{{ $tur->id }}">
                                                                {{ $tur->nomi }} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="control-label">Yutuq haqida</label>
                                                    <input type="text" name="haqida" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="control-label">OHTM uquv yili</label>
                                                    <select name="ohtm_uquv_yili" class="form-control" required>
                                                        <option>Tanlash...</option>
                                                        @foreach ($uquv_yili_ohtm as $uyo)
                                                            <option value="{{ $uyo->id }}">
                                                                {{ $uyo->nomi }} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <br>
                                        <div class="row">
                                            <button type="submit" class="btn btn-primary" style="margin-right:10px;">
                                                Jo'natish
                                            </button>
                                            <button type="button" data-dismiss="modal"
                                                    class="btn btn-secondary">Yopish
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            {{-- @endforeach --}}
                        </div>
                    </div>
                </div>
                {{--                        modal --}}
            </div>
        </div>
    </div>



    <div class="row mt-1">
        <div class="col-xl-12">
            <div class="row">
                @foreach($yutuq as $gur)
                    <div class="col-3">
                        <div class="card card-hover">
                            <div class="card-header" style="background-color: #282c3c">
                                <p>{{$gur->haqida}}</p>
                                <form action="{{ route('tinglovchi.yutuq.delete', $gur->id) }}"
                                      method="POST" style="display: flex; justify-content: space-between;">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-success" style="margin-right:4px;">
                                        <i class="ri-delete-bin-line " data-toggle="tooltip" title="O'chirish"
                                           style="height: 24px; width: 24px;align-content:center;color: #0b0b0b;"></i>
                                    </button>
                                    <a class="btn btn-outline-success" data-toggle="modal"
                                       style="padding-top:15px;margin-right: 3px;"
                                       data-target=".bbs-example-modal-xl{{$gur->id}}"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-outline-{{is_null($gur->fayl)?'warning' : 'success'}}"
                                       href="{{is_null($gur->fayl)? '#' : '/storage/' . $gur->fayl}}"
                                       download="{{is_null($gur->fayl)? '#' : '/storage/' . $gur->fayl}}"
                                       style="padding-top:15px;"><i class="fas fa-cloud-download-alt"></i></a>
                                </form>
                            </div>
                            <div class="card-body text-center">
                                <i class="fas fc-agenda-view-alt"></i>
                                <embed src="{{ '/storage/' . $gur->fayl}}" style="object-fit: contain;" width="320" height="280"/>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade bbs-example-modal-xl{{$gur->id}}" data-backdrop="static" tabindex="-1"
                         role="dialog"
                         aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered" style="width: 800px;height: 600px;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title mt-0" id="myExtraLargeModalLabel1">{{$gur->haqida}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" style="padding: 20px;">
                                    <embed src="{{ '/storage/' . $gur->fayl}}"
                                           style="object-fit: contain;width: 755px;height: 580px;" toolbar="0"/>
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
        $(document).ready(function () {
            $("#myBtn").click(function () {
                $("#myModal").modal();
            });
        });
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



