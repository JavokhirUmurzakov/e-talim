@extends('layouts.ohtm_uquv_bulimi')

@section('title', "ohtm_uquv_bulimi")

@section('link')

    <link href="{{asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />


    <link href="{{asset('assets/libs/select2/css/select2.min.css" rel="stylesheet')}}" type="text/css" />
    <link href="{{asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />


    <!-- DataTables -->

    <link href="{{asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />


@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">O'quv yili OHTM jadvali</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">E-talim</a></li>
                        <li class="breadcrumb-item active">O'quv yili OHTM</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="card-title float-right">
                        {{--                        modal !!! create  !!!!name bilan id lar bir xil bolmasligi kerak--}}
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-xl">Qo'shish++</button>

                        <div class="modal fade bs-example-modal-xl" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title mt-0" id="myExtraLargeModalLabel">O'quv yili OHTMga yangi qator qo'shish</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{ route('uquvbulumi.uquv_yili_ohtm.create') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label class="control-label">O'quv yili nomi</label>
                                                            <input type="text" name="nomi" class="form-control"  placeholder="O'quv yili OHTM" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">O'quv yili boshlanish vaqti</label>
                                                            <input type="date" name="boshlanishi" class="form-control"  placeholder="O'quv yili boshlanish vaqti" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">O'quv yili tugash vaqti</label>
                                                            <input type="date" name="tugashi" class="form-control"  placeholder="O'quv yili tugash vaqti" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-1">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">Faol</label>
                                                            <input type="checkbox" name="faol" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <button type="submit" class="btn btn-primary">Jo'natish</button>
                                                    <button type="button" data-dismiss="modal" class="btn btn-secondary">Yopish</button>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--                        modal--}}
                    </div>
                    <table id="datatable-buttons1" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>O'quv yili nomi</th>
                            <th>O'quv yili boshlanishi</th>
                            <th>O'quv yili tugashi</th>
                            <th>Faolligi</th>
                            <th>Amallar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($uquvy as $uqv)
                            <tr>
                                <td>{{$uqv->uyo_nomi}}</td>
                                <td>{{$uqv->boshlanishi}}</td>
                                <td>{{$uqv->tugashi}}</td>
                                <td>{{$uqv->faol==true?"Faol":"Faol emas"}}</td>
                                <td>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-6">
                                                <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-xl{{$uqv->uquv_yili_id}}">
                                                    <i class="ri-edit-2-line" style="height: 24px; width: 24px; color: #3e8f3e; align-content: center"></i>
                                                </button>
                                            </div>
                                            <div class="col-6">
                                                <form action="{{ route('uquvbulumi.uquv_yili_ohtm.delete') }}" method="POST">
                                                    @csrf
                                                    <input name="id" value="{{$uqv->uquv_yili_id}}" class="d-none hidden">
                                                    <button type="submit"  class="btn btn-primary">
                                                        <i class="ri-delete-bin-line " style="height: 24px; width: 24px; color: red; align-content: center"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <div class="modal fade bs-example-modal-xl{{$uqv->uquv_yili_id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel{{$uqv->uquv_yili_id}}" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title mt-0" id="myExtraLargeModalLabel{{$uqv->uquv_yili_id}}">O'quv yili OHTMni tahrirlash</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form name="edit-blog-post-form" id="edit-blog-post-form" method="post" action="{{ route('uquvbulumi.uquv_yili_ohtm.edit',$uqv->uquv_yili_id) }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label class="control-label">O'quv yili nomi</label>
                                                                <input type="text" name="nomi" class="form-control"  placeholder="O'quv yili OHTM" value="{{$uqv->uyo_nomi}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="validationCustom01">O'quv yili boshlanish vaqti</label>
                                                                <input type="date" name="boshlanishi" class="form-control"  placeholder="O'quv yili boshlanish vaqti" value="{{$uqv->boshlanishi}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="validationCustom01">O'quv yili tugash vaqti</label>
                                                                <input type="date" name="tugashi" class="form-control"  placeholder="O'quv yili tugash vaqti" value="{{$uqv->tugashi}}" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-1">
                                                            <div class="form-group">
                                                                <label for="validationCustom01">Faol</label> <br>
                                                                <input type="checkbox" name="faol" class="form-control"
                                                                       value="1"
                                                                    {{ old('faol', isset($uqv) ? $uqv->faol : 0) ? 'checked' : '' }}>
                                                            </div>
                                                        </div>
{{--                                                        <div class="col-1">--}}
{{--                                                            <div class="form-group">--}}
{{--                                                                <label for="validationCustom01">Faol</label>--}}
{{--                                                                <input type="checkbox" name="faol" class="form-control" value="{{$uqv->faol}}">--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
                                                    </div>
                                                    <div class="row">
                                                        <button type="submit" class="btn btn-primary">Jo'natish</button>
                                                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Yopish</button>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                        </tbody>
                    </table>
{{--                    <div class="row w-100">--}}
{{--                        <div style="width: 30%; margin-left: 35%; margin-right: 35%;">--}}

{{--                            {!! $uquvy->links() !!}--}}
{{--                        </div>--}}
{{--                    </div>--}}

                </div>
            </div>
        </div> <!-- end col -->
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
            text:  "{{ session()->get('error') }}",
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
