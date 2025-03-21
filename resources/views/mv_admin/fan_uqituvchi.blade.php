@extends('layouts.mv_admin')

@section('title', "Fan_Uqituvchi")

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

@endsection

@section('body-content')
    {{--    @dd($fak_kaf_turis)--}}
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Fan o'qituvchi jadvali</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">E-talim</a></li>
                        <li class="breadcrumb-item active">Fan o'qituvchi</li>
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
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                data-target=".bs-example-modal-xl">Qo'shish++
                        </button>

                        <div class="modal fade bs-example-modal-xl" data-backdrop="static" tabindex="-1" role="dialog"
                             aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title mt-0" id="myExtraLargeModalLabel1">Fan o'qituvchi yangi
                                            qator qo'shish</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{ route('mv_admin.fan_uqituvchi.store') }}"
                                              enctype="multipart/form-data">
{{--                                            {{ route('mv_admin.fan_uqituvchi.create') }}--}}
                                            @csrf
                                            @method('post')
                                            <div class="container-fluid">
                                                <div class="row">

                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">O'qituvchi FIO</label>
                                                            <select name="fio" class="form-control" required>
                                                                <option>Tanlash...</option>
                                                                @foreach($uqituvchis as $uqt)
                                                                    <option
                                                                        value="{{$uqt['id']}}">{{$uqt['fio']}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">Fan nomi</label>
                                                            <select name="qs_nomi" class="form-control" required>
                                                                <option>Tanlash...</option>
                                                                @foreach($fans as $fa)
                                                                    <option
                                                                        value="{{$fa['id']}}">{{$fa['fan_nomi']}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">O'quv yili</label>
                                                            <select name="semestr" class="form-control" required>
                                                                <option>Tanlash...</option>
                                                                @foreach($uquv_yili_ohtms as $uyo)
                                                                    <option
                                                                        value="{{$uyo['id']}}">{{$uyo['semestr']}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">Dars soati</label>
                                                            <input type="text" name="soat" class="form-control"
                                                                   placeholder="Dars Soati" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">Maruza</label>
                                                            <input type="text" name="maruza" class="form-control"
                                                                   placeholder="Maruza" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">Amaliy</label>
                                                            <input type="text" name="amaliy" class="form-control"
                                                                   placeholder="Amaliy" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">KOEF</label>
                                                            <input type="text" name="koef" class="form-control"
                                                                   placeholder="koef" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-1">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">Oraliq</label>
                                                            <input type="checkbox" name="oraliq" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-1">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">Yakuniy</label>
                                                            <input type="checkbox" name="yakuniy" class="form-control">

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
                                                    <button type="submit" class="btn btn-primary">Yuborish</button>
                                                    <button type="button" data-dismiss="modal"
                                                            class="btn btn-secondary">Yopish
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table id="datatable-buttons1" class="table table-striped table-bordered dt-responsive nowrap"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>O'qituvchi FIO</th>
                            <th>Fan nomi</th>
                            <th>O'quv yili</th>
                            <th>Soat</th>
                            <th>Maruza</th>
                            <th>Amaliy</th>
                            <th>Oraliq</th>
                            <th>Yakuniy</th>
                            <th>KOEF</th>
                            <th>Faol</th>
                            <th>Amallar</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($fanuq as $f)
                            <tr>
                                <td>{{$f->uqituvchi_fio}}</td>
                                <td>{{$f->qs_nomi}}</td>
                                <td>{{$f->nomi}}</td>
                                <td>{{$f->soat}}</td>
                                <td>{{$f->maruza}}</td>
                                <td>{{$f->amaliy}}</td>
                                <td>{{$f->oraliq}}</td>
                                <td>{{$f->yakuniy}}</td>
                                <td>{{$f->koef}}</td>
                                <td>@if($f->faol)
                                        faol
                                    @else
                                        Faol emas
                                    @endif</td>
                                <td>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-6">
                                                <button type="button" class="btn btn-primary waves-effect waves-light"
                                                        data-toggle="modal"
                                                        data-target=".bs-example-modal-xl{{$f->id}}">
                                                    <i class="ri-edit-2-line"
                                                       style="height: 24px; width: 24px; color: #3e8f3e; align-content: center"></i>
                                                </button>
                                            </div>
                                            <div class="col-6">
{{--                                                <form action="{{ route('mv_admin.fan_uqituvchi.destroy', $f->id) }}" method="POST">--}}
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="ri-delete-bin-line "
                                                           style="height: 24px; width: 24px; color: #ff0000; align-content: center"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        {{--                            <div class="modal fade bs-example-modal-xl{{$tind->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel{{$tind->id}}" aria-hidden="true">--}}
                        {{--                                <div class="modal-dialog modal-xl modal-dialog-centered">--}}
                        {{--                                    <div class="modal-content">--}}
                        {{--                                        <div class="modal-header">--}}
                        {{--                                            <h5 class="modal-title mt-0" id="myExtraLargeModalLabel{{$tind->id}}">Tinglovchi diplomini tahrirlash</h5>--}}
                        {{--                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                        {{--                                                <span aria-hidden="true">&times;</span>--}}
                        {{--                                            </button>--}}
                        {{--                                        </div>--}}
                        {{--                                        <div class="modal-body">--}}
                        {{--                                            <form name="edit-blog-post-form" id="edit-blog-post-form1" method="post" action="{{ route('mv_admin.tinglovchi_diplom.edit',$tind->id) }}" enctype="multipart/form-data">--}}
                        {{--                                                @csrf--}}
                        {{--                                                @method('put')--}}
                        {{--                                                <div class="container-fluid">--}}
                        {{--                                                    <div class="row">--}}
                        {{--                                                        <div class="col-6">--}}
                        {{--                                                            <div class="form-group">--}}
                        {{--                                                                <label for="validationCustom01">Klassifikatsiya</label>--}}
                        {{--                                                                <input type="text" value="{{$tind->klassifikatsiya}}" name="klassifikatsiya" class="form-control"  required>--}}
                        {{--                                                            </div>--}}
                        {{--                                                        </div>--}}
                        {{--                                                        <div class="col-6">--}}
                        {{--                                                            <div class="form-group">--}}
                        {{--                                                                <label for="validationCustom01">Seriya</label>--}}
                        {{--                                                                <input type="text" value="{{$tind->seriya}}" name="seriya" class="form-control" required>--}}
                        {{--                                                            </div>--}}
                        {{--                                                        </div>--}}
                        {{--                                                        <div class="col-6">--}}
                        {{--                                                            <div class="form-group">--}}
                        {{--                                                                <label for="validationCustom01">Bitiruv ishi</label>--}}
                        {{--                                                                <input type="text" value="{{$tind->bitiruv_ishi}}" name="bitiruv_ishi" class="form-control" required>--}}
                        {{--                                                            </div>--}}
                        {{--                                                        </div>--}}
                        {{--                                                        <div class="col-6">--}}
                        {{--                                                            <div class="form-group">--}}
                        {{--                                                                <label for="validationCustom01">O'qish vaqti</label>--}}
                        {{--                                                                <input type="text" value="{{$tind->uqish_vaqti}}" name="uqish_vaqti" class="form-control"  required>--}}
                        {{--                                                            </div>--}}
                        {{--                                                        </div>--}}
                        {{--                                                        <div class="col-6">--}}
                        {{--                                                            <div class="form-group">--}}
                        {{--                                                                <label for="validationCustom01">Baholar</label>--}}
                        {{--                                                                <input type="text" value="{{$tind->baholar}}" name="baholar" class="form-control"   required>--}}
                        {{--                                                            </div>--}}
                        {{--                                                        </div>--}}
                        {{--                                                        <div class="col-6">--}}
                        {{--                                                            <div class="form-group">--}}
                        {{--                                                                <label for="validationCustom01">Batafsil</label>--}}
                        {{--                                                                <input type="text" value="{{$tind->haqida}}" name="haqida" class="form-control"  required>--}}
                        {{--                                                            </div>--}}
                        {{--                                                        </div>--}}
                        {{--                                                    </div>--}}
                        {{--                                                    <div class="row">--}}
                        {{--                                                        <button type="submit" class="btn btn-primary">Jo'natish</button>--}}
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

                                                {!! $fanuq->links() !!}
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

