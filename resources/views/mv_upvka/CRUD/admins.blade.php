@extends('layouts.mv_upvka')

@section('title', "OHTM ADMINLAR")

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
{{--        @dd($users)--}}
    <div class="main-content cyan-200 " style="color: cyan-200;">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Admin jadvali</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">E-talim</a></li>
                                    <li class="breadcrumb-item active">Adminlar</li>
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
                                                    <h5 class="modal-title mt-0" id="myExtraLargeModalLabel1">Admin yangi qator qo'shish</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{route('mv_upvka.ohtmadmin.store')}}" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('post')
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="validationCustom01">User nomi</label>
                                                                        <input type="text" name="nomi" class="form-control"  placeholder="User nomi" required>

                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="validationCustom01">User login</label>
                                                                        <input type="text" name="login" class="form-control"  placeholder="Login" required>
                                                                    </div>
                                                                </div>

                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Til</label>
                                                                        <select name="til_id" class="form-control" required>
                                                                            <option>Tanlash...</option>
                                                                            @foreach($tils as $til)
                                                                                <option value="{{$til['id']}}">{{$til['nomi']}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Ohtm</label>
                                                                        <select name="ohtm_id" class="form-control" required>
                                                                            <option>Tanlash...</option>
                                                                            @foreach($ohtms as $ohtm)
                                                                                <option value="{{$ohtm['id']}}">{{$ohtm['qs_nomi']}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="validationCustom01">parol</label>
                                                                        <input type="password" name="password" class="form-control"  placeholder="parol" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label>Faollik</label>
                                                                        <input type="checkbox" name="faol">
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
                                        <th>Nomi</th>
                                        <th>Login</th>
                                        <th>faollik</th>
                                        <th>Til</th>
                                        <th>Ohtm</th>
                                        <th>Edit</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->nomi}}</td>
                                            <td>{{$user->login}}</td>
                                            <td>@if($user->faol) faol @else Faol emas @endif</td>
                                            <td>{{$user->user_til}}</td>
                                            <td>{{$user->user_ohtm}}</td>

                                               <td>
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-xl{{$user->id}}">
                                                                <i class="ri-edit-2-line" style="height: 24px; width: 24px; color: #3e8f3e; align-content: center"></i>
                                                            </button>
                                                        </div>
                                                        <div class="col-6">
                                                            <form action="{{route('mv_upvka.ohtmadmin.delete', $user->id)}}" method="POST">
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

                                        <div class="modal fade bs-example-modal-xl{{$user->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel{{$user->id}}" aria-hidden="true">
                                            <div class="modal-dialog modal-xl modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title mt-0" id="myExtraLargeModalLabel{{$user->id}}">OHTMni tahrirlash</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form name="edit-blog-post-form" id="edit-blog-post-form1" method="post" action="{{route('mv_upvka.ohtmadmin.edit', $user->id)}}" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('put')
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label for="validationCustom01">User nomi</label>
                                                                            <input type="text" name="nomi" class="form-control"  value="{{$user->nomi}}" placeholder="User nomi" required>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label for="validationCustom01">User login</label>
                                                                            <input type="text" name="login" value="{{$user->login}}" class="form-control"  placeholder="Login" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label">Til</label>
                                                                            <select name="til_id" class="form-control" required>
                                                                                <option>Tanlash...</option>
                                                                                @foreach($tils as $til)
                                                                                    <option @if($til['nomi']==$user->user_til ) selected @endif value="{{$til['id']}}">{{$til['nomi']}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label">Ohtm</label>
                                                                            <select name="ohtm_id" class="form-control" required>
                                                                                <option>Tanlash...</option>
                                                                                @foreach($ohtms as $ohtm)
                                                                                    <option @if($ohtm['qs_nomi']==$user->user_ohtm ) selected @endif value="{{$ohtm['id']}}">{{$ohtm['qs_nomi']}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label for="validationCustom01">parol</label>
                                                                            <input type="password" name="password" class="form-control"  placeholder="parol" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label>Faollik</label>
                                                                            <input type="checkbox" name="faol" @if($user->faol == 1) checked @endif>
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

                                    @endforeach
                                    </tbody>
                                </table>
                                {{--                    <div class="row w-100">--}}
                                {{--                        <div style="width: 30%; margin-left: 35%; margin-right: 35%;">--}}

                                {{--                            {!! $ohtms->links() !!}--}}
                                {{--                        </div>--}}
                                {{--                    </div>--}}

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <!-- JAVASCRIPT -->
z
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
