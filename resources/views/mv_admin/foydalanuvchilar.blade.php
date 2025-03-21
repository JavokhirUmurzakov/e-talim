@extends('layouts.mv_admin')

@section('title', "MV_ADMIN - Fanlar")

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

@section('body-content')
{{--    @dd($ohtms)--}}
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Foydalanuvchilar jadvali</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">E-talim</a></li>
                        <li class="breadcrumb-item active">Foydalanuvchilar</li>
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
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-xl">Qo'shish++</button>

                        <div class="modal fade bs-example-modal-xl" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title mt-0" id="myExtraLargeModalLabel1">Yangi Foydalanuvchi qo'shish</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{ route('mv_admin.foydalanuvchi.create') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-5">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">F.I.O</label>
                                                            <input type="text" name="nomi" class="form-control" placeholder="F.I.O" required>

                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Ohtm</label>
                                                            <select name="ohtm_id" class="form-control" required>
                                                                @foreach($ohtm as $o)
                                                                        <option value="{{$o['id']}}">{{$o['qs_nomi']}}</option>
                                                                @endforeach
                                                            </select>

                                                        </div>
                                                    </div>

                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label class="control-label">Til</label>
                                                            <select name="til_id" class="form-control" required>
                                                                @foreach($til as $t)
                                                                    <option value="{{$t['id']}}">{{$t['qs_nomi']}}</option>
                                                                @endforeach
                                                            </select>

                                                        </div>
                                                    </div>

                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="validationCustom01" class="w-100 text-center">Faol</label>
                                                            <input type="checkbox" name="faol" class="form-control">
                                                        </div>
                                                    </div>



                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">Login</label>
                                                            <input type="text" name="login" class="form-control"  placeholder="Login" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">Parol</label>
                                                            <input type="password" name="re_parol" class="form-control"  placeholder="Parol" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">Parolni qaytaring</label>
                                                            <input type="password" name="parol" class="form-control"  placeholder="Parol qaytaring" required>
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
                    </div>

                    <table id="datatable-buttons1" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>F.I.O</th>
                            <th>Login</th>
                            <th>Holati</th>
                            <th>Til</th>
                            <th>Ohtm</th>
                            <th>Amallar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($foydalanuvchilar as $fdchi)
                            <tr>
                                <td>{{$fdchi->nomi}}</td>
                                <td>{{$fdchi->login}}</td>
                                <td>{{$fdchi->faol==true?"Faol":"Faol emas"}}</td>
                                <td>{{$fdchi->til}}</td>
                                <td>{{$fdchi->ohtm}}</td>
                                <td>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-4">
                                                <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-xl{{$fdchi->id}}">
                                                    <i class="ri-key-2-line" style="height: 24px; width: 24px; color: white; align-content: center"></i>
                                                </button>
                                            </div>
                                            <div class="col-4">
                                                <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-xl{{$fdchi->id}}">
                                                    <i class="ri-edit-2-line" style="height: 24px; width: 24px; color: white; align-content: center"></i>
                                                </button>
                                            </div>
                                            <div class="col-4">

                                                <form action="{{ route('mv_admin.foydalanuvchi.delete', $fdchi->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"  class="btn btn-primary">
                                                        <i class="ri-delete-bin-line " style="height: 24px; width: 24px; color: #ff0000; align-content: center"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>

{{--                            <div class="modal fade bs-example-modal-xl{{$fdchi->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel{{$fdchi->id}}" aria-hidden="true">--}}
{{--                                <div class="modal-dialog modal-xl modal-dialog-centered">--}}
{{--                                    <div class="modal-content">--}}
{{--                                        <div class="modal-header">--}}
{{--                                            <h5 class="modal-title mt-0" id="myExtraLargeModalLabel{{$fdchi->id}}">Fanni tahrirlash</h5>--}}
{{--                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                                <span aria-hidden="true">&times;</span>--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-body">--}}
{{--                                            <form name="edit-blog-post-form" id="edit-blog-post-form1" method="post" action="{{ route('mv_admin.foydalanuvchi.edit',$fdchi->id) }}" enctype="multipart/form-data">--}}
{{--                                                @csrf--}}
{{--                                                @method('put')--}}
{{--                                                <div class="container-fluid">--}}
{{--                                                    <div class="row">--}}
{{--                                                        <div class="col-9">--}}
{{--                                                            <div class="form-group">--}}
{{--                                                                <label for="validationCustom01">Fan nomi</label>--}}
{{--                                                                <input type="text" name="nomi" value="{{$fdchi->nomi}}" class="form-control" required>--}}

{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-3">--}}
{{--                                                            <div class="form-group">--}}
{{--                                                                <label for="validationCustom01">Fan qisqartma nomi</label>--}}
{{--                                                                <input type="text" name="qs_nomi" class="form-control" value="{{$fn->qs_nomi}}" required>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-7">--}}
{{--                                                            <div class="form-group">--}}
{{--                                                                <label class="control-label">Fan - Ohtm fakulteti</label>--}}
{{--                                                                <select name="fakultet_kafedra_id" class="form-control" required>--}}
{{--                                                                    @foreach($fak_kaf as $f)--}}
{{--                                                                        <option value="{{$f['id']}}" {{$fn['fakultet_kafedra_id'] == $f['id'] ? 'selected': ''}}>{{$f['ohtm_fak']}}</option>--}}
{{--                                                                    @endforeach--}}
{{--                                                                </select>--}}

{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-3">--}}
{{--                                                            <div class="form-group">--}}
{{--                                                                <label for="validationCustom01">Fan kodi</label>--}}
{{--                                                                <input type="text" name="kod" class="form-control" value="{{$fn->kod}}" required>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}

{{--                                                        <div class="col-2">--}}
{{--                                                            <div class="form-group">--}}
{{--                                                                <label for="validationCustom01" class="w-100 text-center">Faol</label>--}}
{{--                                                                <input type="checkbox" name="faol" class="form-control" {{$fn['faol'] == true ? 'checked': ''}}>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row">--}}
{{--                                                        <button type="submit" class="btn btn-primary">Jo'natish</button>--}}
{{--                                                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Yopish</button>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                        @endforeach
                        </tbody>
                    </table>

                    <div class="row w-100">
                        <div style="width: 30%; margin-left: 35%; margin-right: 35%;">
                            {!! $foydalanuvchilar->links() !!}
                        </div>
                    </div>

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
