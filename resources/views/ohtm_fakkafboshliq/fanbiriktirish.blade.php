@extends('layouts.uqituvchi')

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


    <link href="{{asset('assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/libs/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet"/>

    <!-- DataTables -->

    <link href="{{asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css')}}" rel="stylesheet"
          type="text/css"/>

    <link href="{{asset('assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css"/>

@endsection

@section('content')
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
                                        <form name="add-blog-post-form" id="add-blog-post-form" method="post"
                                              action="{{ route('uqituvchi.fan_uqituvchi.create') }}"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('post')
                                            <div class="container-fluid">
                                                <div class="row">

                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">O'qituvchi FIO</label>
                                                            <select name="uqituvchi_id" class="form-control" required>
                                                                <option>Tanlash...</option>
                                                                @foreach($uqituvchis as $uqt)
                                                                    <option
                                                                        value="{{$uqt->id}}">{{$uqt->fio}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">Fan nomi</label>
                                                            <select name="jurnal_id" class="form-control" required>
                                                                <option>Tanlash...</option>
                                                                @foreach($fannomi as $fa)
                                                                    <option
                                                                        value="{{$fa->id}}">{{$fa->fan_nomi . " | " . $fa->guruh_nomi. ' | '. $fa->semestr}}</option>

                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">Mashg'ulot turi</label>
                                                            <select name="dars_turi_id" class="form-control"
                                                                    required>
                                                                <option>Tanlash...</option>
                                                                @foreach($dars_turi as $uyo)
                                                                    <option
                                                                        value="{{$uyo->id}}">{{$uyo->nomi}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">Ajratilgan soati</label>
                                                            <input type="text" name="soat" class="form-control"
                                                                   placeholder="Dars Soati" required>
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

                    <table id="datatable-buttons1" class="table table-striped text-center table-bordered dt-responsive nowrap"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>T/r</th>
                            <th>O'qituvchi FIO</th>
                            <th>Fan nomi</th>
                            <th>Dars turi</th>
                            <th>Soat</th>
                            <th>Amallar</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?$tr = 0?>
                        @foreach($fanuq as $f)
                            <tr>
                                <td>{{++$tr}}.</td>
                                <td>{{$f->uqituvchi_fio}}</td>
                                <td>{{$f-> fan_nomi}} | ({{$f-> guruh_nomi}}, {{$f-> semestr}})</td>
                                <td>{{$f->dars_turi_nomi}}</td>
                                <td>{{$f->soat}}</td>

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
                                                <form action="{{ route('uqituvchi.fan_uqituvchi.delete', $f->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('delete')
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
                            {{--                            @dd(request()->all());--}}
                            <div class="modal fade bs-example-modal-xl{{$f->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel{{$f->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title mt-0" id="myExtraLargeModalLabel{{$f->id}}">Fan o'qituvchini tahrirlash</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form name="edit-blog-post-form" id="edit-blog-post-form1" method="post" action="{{ route('uqituvchi.fan_uqituvchi.edit',$f->id) }}" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="container-fluid">
                                                    <div class="row">

                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="validationCustom01">O'qituvchi FIO</label>
                                                                <select name="uqituvchi_id" class="form-control"
                                                                        required>
                                                                    <option>Tanlash...</option>
                                                                    @foreach($uqituvchis as $uqt)
                                                                        <option
                                                                            value="{{$uqt->id}}"{{$f->uqituvchi_id == $uqt->id ? 'selected': ''}}>{{$uqt->fio}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="validationCustom01">Fan nomi</label>
                                                                <select name="jurnal_id" class="form-control" required>
                                                                    <option>Tanlash...</option>
                                                                    @foreach($fannomi as $fa)
                                                                        <option
                                                                            value="{{$fa->id}}" {{$f->jurnal_id==$fa->id ? 'selected': ''}}>{{$fa->fan_nomi  . " | " . $fa->guruh_nomi. ' | '. $fa->semestr}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="validationCustom01">Dars turi</label>
                                                                <select name="dars_turi_id" class="form-control"
                                                                        required>
                                                                    <option>Tanlash...</option>
                                                                    @foreach($dars_turi as $uyo)
                                                                        <option
                                                                            value="{{$uyo->id}}" {{$uyo->dars_turi_id==$uyo->id ? 'selected': ''}}>{{$uyo->nomi}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
{{--                                                        <div class="col-6">--}}
{{--                                                            <div class="form-group">--}}
{{--                                                                <label for="validationCustom01">Dars soati</label>--}}
{{--                                                                <input type="text" name="soat" class="form-control"--}}
{{--                                                                       placeholder="Dars Soati" value="{{$f->soat}}" required>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
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
    <script src="{{asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>

    <script src="{{asset('assets/js/pages/form-advanced.init.js')}}"></script>

    <script src="{{asset('assets/js/app.js')}}"></script>
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


