@extends('layouts.uqituvchi')

@section('title', "OHTM O'qituvchi")

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
                <h4 class="mb-0">Kunlik nazorat sahifasi</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Uqituvchi</a></li>
                        <li class="breadcrumb-item active">Kunlik nazorat sahifasi</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- end page title -->
    <div class="row mt-1">
        <div class="col-xl-12">
            <div class="row">
                @foreach($kunlik_nazorat as $gur)
                    <div class="col-3">
                        <div class="card card-hover">
                            <div class="card-body text-center">
                                <i class="fas fc-agenda-view-alt"></i>
                                <embed src="{{ '/storage/' . $gur->fayl}}" style="object-fit: contain;" width="200" height="250"/>
                            </div>
                            <div class="card-header" style="display:block;justify-content:space-between;background-color: #282c3c;border-radius: 0;">
                                <div class="col-12">
                                    <p style="color: #e8dbdb;"> <span class="badge badge-soft-success font-size-15 mb-1">kafedra: </span>{{$gur->kafedra}}</p>
                                    <p style="color: #e8dbdb;"> <span class="badge badge-soft-success font-size-15 mb-1">xona: </span> {{$gur->xona}}-xona</p>
                                </div>
                                    <div style="display:flex;justify-content:center;background-color: #282c3c;border-radius: 0;">
                                        <button class="btn btn-outline-success" data-toggle="modal"
                                                style="padding-top:15px;margin-right:8px;"
                                                data-target=".bbs-example-modal-xl{{$gur->id}}">
                                            <input type="hidden" id="post_id" value="{{$gur->id}}">
                                            <i class="fas fa-eye" style="height: 24px; width: 30px;"></i></button>

                                        <form action="{{ route('uqituvchi.kunlik_nazorat.edit', $gur->id) }}"
                                              method="POST">
                                            @csrf
                                            @method('put')

                                            @if($gur->korildi)
                                                <a class="btn btn-outline-success float-right" data-toggle="modal"
                                                   style="padding-top:15px;margin-right:8px;">
                                                    <img src="{{asset('assets/images/doublecheck.png')}}"
                                                         style="height: 24px; width: 30px;"/></a>
                                            @else
                                                <a class="btn btn-outline-success float-right" data-toggle="modal"
                                                   style="padding-top:15px;margin-right:8px;">
                                                    <img src="{{asset('assets/images/check.png')}}"
                                                         style="height: 24px; width: 30px;"/></a>
                                            @endif
                                        </form>
                                        <a class="btn btn-outline-{{is_null($gur->fayl)?'warning' : 'success'}}"
                                           href="{{is_null($gur->fayl)? '#' : '/storage/' . $gur->fayl}}"
                                           download="{{is_null($gur->fayl)? '#' : '/storage/' . $gur->fayl}}"
                                           style="padding-top:15px;margin-right:8px;"><i class="fas fa-cloud-download-alt" style="height: 24px; width: 30px;"></i></a>
                                    </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal fade bbs-example-modal-xl{{$gur->id}}" data-backdrop="static" tabindex="-1"
                         role="dialog"
                         aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered" style="width: 800px;height: 600px;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    @if($gur->korildi)
                                        <button class="close" data-dismiss="modal" aria-label="Close">
                                            x
                                        </button>
                                    @else
                                    <form action="{{ route('uqituvchi.kunlik_nazorat.edit', $gur->id) }}"
                                          method="POST">
                                        @csrf
                                        @method('put')
                                        <button class="close" aria-label="Close">
                                            x
                                        </button>
                                    </form>
                                    @endif
                                </div>
                                <div class="modal-body" style="padding: 20px;">
                                    <embed src="{{ '/storage/' . $gur->fayl}}"
                                           style="object-fit: contain;width: 755px;height: 580px;" toolbar="0"/>
                                </div>
                                <div style="margin-left: 30px;">
                                    <p style="color: #0b0b0b;"> <span class="badge badge-soft-pink font-size-15 mb-1">tavsif:</span> {{$gur->haqida}}</p>
                                    <p style="color: #0b0b0b;"> <span class="badge badge-soft-pink font-size-15 mb-1">kafedra: </span>{{$gur->kafedra}}</p>
                                    <p style="color: #0b0b0b;"> <span class="badge badge-soft-pink font-size-15 mb-1">xona: </span> {{$gur->xona}}-xona</p>
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
    <script>
        $(document).ready(function () {
            $('#updatePost').on('click', function () {
                let id = $('#post_id').val();

                $.ajax({
                    url: "/uquvbulumi/kunlik_nazorat/" + id,
                    type: "PUT",
                    data: {
                        _token: "{{ csrf_token() }}",
                    },
                    success: function (response) {
                        alert(response.message);
                    },
                    error: function (xhr) {
                        alert("Xatolik yuz berdi!");
                    }
                });
            });
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



