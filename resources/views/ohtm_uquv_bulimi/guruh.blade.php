@extends('layouts.ohtm_uquv_bulimi')

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
                <h4 class="mb-0">Guruhlar</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">E-talim</a></li>
                        <li class="breadcrumb-item active">Guruh</li>
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
                                        <h5 class="modal-title mt-0" id="myExtraLargeModalLabel1">1111111111111111111111</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <form name="add-blog-post-form" id="add-blog-post-form" method="post"
                                              action="{{ route('uquvbulumi.guruh.create') }}"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('post')
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">Guruh nomi</label>
                                                            <input type="text" name="guruh_nomi" class="form-control"
                                                                   placeholder="Tuldiring" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">Boshliq FIO</label>
                                                            <input type="text" name="fio" class="form-control"
                                                                   placeholder="Tuldiring" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-1">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">Holat</label>
                                                            <input type="checkbox" name="holat" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">Tili</label>
                                                            <select name="til" class="form-control"
                                                                    required>
                                                                <option>Tanlash...</option>
                                                                @foreach($til as $uyo)
                                                                    <option
                                                                        value="{{$uyo->id}}">{{$uyo->nomi}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">Kurs</label>
                                                            <select name="kurs" class="form-control"
                                                                    required>
                                                                <option>Tanlash...</option>
                                                                @foreach($kurs as $uyo)
                                                                    <option
                                                                        value="{{$uyo->id}}">{{$uyo->nomi}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">Yunalish</label>
                                                            <select name="yunalish" class="form-control"
                                                                    required>
                                                                <option>Tanlash...</option>
                                                                @foreach($yunalish as $uyo)
                                                                    <option
                                                                        value="{{$uyo->id}}">{{$uyo->nomi}}</option>
                                                                @endforeach
                                                            </select>
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
                            <th>Guruh nomi</th>
                            <th>Boshliq FIO</th>
                            <th>Holat</th>
                            <th>Til</th>
                            <th>Kurs</th>
                            <th>Yunalish</th>
                            <th>Amallar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($guruh as $f)
                            <tr>
                                <td>{{$f->nomi}}</td>
                                <td>{{$f->boshliq_fio}}</td>
                                <td>@if($f->holat)
                                    mavjud
                                @else
                                    mavjud emas
                                @endif
                            </td>
                                <td>{{$f->til_nomi}}</td>
                                <td>{{$f->kurs_nomi}}</td>
                                <td>{{$f->yunalish_nomi}}</td>

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
                                                <form action="{{ route('uquvbulumi.guruh.delete', $f->id) }}"
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
                                            <h5 class="modal-title mt-0" id="myExtraLargeModalLabel{{$f->id}}">Guruhni tahrirlash</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form name="edit-blog-post-form" id="edit-blog-post-form1" method="post" action="{{ route('uquvbulumi.guruh.edit',$f->id) }}" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="container-fluid">
                                                    <div class="row">

                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="validationCustom01">Guruh nomi</label>
                                                                <input type="text" name="guruh_nomi" class="form-control"
                                                                       placeholder="Dars Soati" value="{{$f->nomi}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="validationCustom01">Boshliq FIO</label>
                                                                <input type="text" name="fio" class="form-control"
                                                                       placeholder="Dars Soati" value="{{$f->boshliq_fio}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="validationCustom01">Til</label>
                                                                <select name="til"
                                                                        class="form-control "
                                                                        required>
                                                                    @foreach($til as $g)
                                                                        <option value="{{$g->id}}" {{$g->id==$f->til_id ? 'selected': ''}}>{{$g->nomi}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="validationCustom01">Kurs</label>
                                                                <select name="kurs_nomi"
                                                                        class="form-control "
                                                                        required>
                                                                    @foreach($kurs as $k)
                                                                        <option
                                                                            value="{{$k->id}}" {{$k->id==$f->kurs_id ? 'selected': ''}}>{{$k->nomi}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="validationCustom01">Yunalish</label>
                                                                <select name="yunalish_nomi"
                                                                        class="form-control "
                                                                        required>
                                                                    @foreach($yunalish as $yun)
                                                                        <option
                                                                            value="{{$yun->id}}" {{$f->yunalish_id==$yun->id ? 'selected': ''}}>{{$yun->nomi}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>



                                                        <div class="col-1">
                                                            <div class="form-group">
                                                                <label for="validationCustom01">Holat</label>
                                                                <input type="checkbox" name="holat_nomi"
                                                                       class="form-control" {{$f->holat == true ? 'checked': ''}}>
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

                        @endforeach
                        </tbody>
                    </table>
                    <div class="row w-100">
                        <div style="width: 30%; margin-left: 35%; margin-right: 35%;">

                            {{-- {!! $fanuq->links() !!} --}}
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

