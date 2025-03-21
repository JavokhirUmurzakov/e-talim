@extends('layouts.uqituvchi')

@section('title', "Kafedra boshlig`i")

@section('link')

    <link href="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- DataTables -->
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/select2/css/select2.min.css" rel="stylesheet') }}" type="text/css" />
    <link href="{{ asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- DataTables -->
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />

    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <style>

    </style>

@endsection

@section('content')


    {{-- @dd($rejas) --}}
    <div class="row">
        <div class="row col-12 ml-1">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center">Yillik Reja</h2>

                        <div class="card-title float-right">
                            {{--                        modal !!! create  !!!!name bilan id lar bir xil bolmasligi kerak --}}
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                data-target=".bs-example-modal-xl">Qo'shish++
                            </button>

                            <div class="modal fade bs-example-modal-xl" data-backdrop="static" tabindex="-1" role="dialog"
                                aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title mt-0" id="myExtraLargeModalLabel1">Yillik rejani qo`shish</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        {{-- @foreach ($hujjatlars as $reja) --}}


                                        <div class="modal-body">
                                            <form name="add-blog-post-form" id="add-blog-post-form" method="post"
                                                action="{{ route('uqituvchi.reja.create') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('post')
                                                <div class="container-fluid">
                                                    <div class="row">

                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label class="control-label">O`qituvchi</label>
                                                                <select name="uqituvchi_fio" class="form-control" required>
                                                                    <option>Tanlash...</option>
                                                                    @foreach ($uqituvchi as $uq)
                                                                        <option value="{{ $uq->id }}">
                                                                            {{ $uq->fio }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Nashr turi</label>
                                                                <select name="nashr_nomi" class="form-control" required>
                                                                    <option>Tanlash...</option>
                                                                    @foreach ($nashrlar as $nashr)
                                                                        <option value="{{ $nashr->id }}">
                                                                            {{ $nashr->nomi }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                          <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="validationCustom01">Soni</label>
                                                                <input type="text" name="soni"
                                                                    class="form-control" placeholder="" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label class="control-label">O`quv yili</label>
                                                                <select name="uquv_yili" class="form-control" required>
                                                                    <option>Tanlash...</option>
                                                                    @foreach ($yillar as $yil)
                                                                        <option value="{{ $yil->id }}">
                                                                            {{ $yil->nomi}} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="validationCustom01">Izoh</label>
                                                                <input type="text" name="haqida"
                                                                    class="form-control" placeholder="" required>
                                                            </div>
                                                        </div>

                                                        <input type="hidden" name="fak_kaf_id" value="{{$fak_kaf_id}}">

                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <button type="submit" class="btn btn-primary">Jo'natish</button>
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

                        <table id="datatable-buttons1"
                            class="table table-striped table-bordered dt-responsive text-center nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>O`qituvchi</th>
                                    <th>Nashr turi</th>
                                    <th>Soni</th>
                                    <th>O`quv yili</th>
                                    <th>Izoh</th>
                                    <th>Ammallar</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($yillik_reja as $reja)
                                    <tr>
                                        <td>{{ $reja->uqituvchi_fio }}</td>
                                        <td>{{ $reja->nashr_nomi }}</td>
                                        <td>{{ $reja->soni }}</td>
                                        <td>{{ $reja->uquv_yili }}</td>
                                        <td>{{ $reja->haqida }}</td>
                                        <td>
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <button type="button"
                                                            class="btn btn-primary waves-effect waves-light"
                                                            data-toggle="modal"
                                                            data-target=".bs-example-modal-xl{{ $reja->id }}">
                                                            <i class="ri-edit-2-line"
                                                                style="height: 24px; width: 24px; color: #3e8f3e; align-content: center"></i>
                                                        </button>
                                                    </div>
                                                    <div class="col-6">
                                                        <form action="{{ route('uqituvchi.reja.delete', $reja->id) }}"
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

                                    <div class="modal fade bs-example-modal-xl{{ $reja->id }}" data-backdrop="static"
                                        tabindex="-1" role="dialog"
                                        aria-labelledby="myExtraLargeModalLabel{{ $reja->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-xl modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mt-0"
                                                        id="myExtraLargeModalLabel{{ $reja->id }}">Reja qatorini
                                                        tahrirlash</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form name="add-blog-post-form" id="add-blog-post-form"
                                                        method="post"
                                                        action="{{ route('uqituvchi.reja.edit', $reja->id) }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('put')
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">O`qituvchi fio</label>
                                                                        <select name="uqituvchi_fio" class="form-control" required>
                                                                            <option>Tanlash...</option>
                                                                            @foreach ($uqituvchi as $fio)
                                                                                <option
                                                                                    value="{{$fio->id}}" {{$reja->uqituvchi_id == $fio->id ? 'selected':''}}> {{ $fio->fio }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Nashr turi</label>
                                                                        <select name="nashr_nomi" class="form-control" required>
                                                                            <option>Tanlash...</option>
                                                                            @foreach ($nashrlar as $nashr)
                                                                                <option
                                                                                    value="{{$nashr->id}}" {{$reja->nashr_tur_id == $nashr->id ? 'selected':''}}> {{ $nashr->nomi }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="validationCustom01">Son</label>
                                                                        <input type="number" name="soni" class="form-control"
                                                                               value="{{$reja->soni}}" required>
                                                                    </div>
                                                                </div>

                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">O`quv yili</label>
                                                                        <select name="uquv_yili" class="form-control" required>
                                                                            <option>Tanlash...</option>
                                                                            @foreach ($yillar as $yil)
                                                                                <option
                                                                                    value="{{$yil->id}}" {{$reja->uquv_yili_id == $yil->id ? 'selected':''}}> {{ $yil->nomi }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="validationCustom01">Izoh</label>
                                                                        <input type="text" name="haqida" class="form-control"
                                                                               value="{{$reja->haqida}}" required>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Jo'natish</button>
                                                                <button type="button" data-dismiss="modal"
                                                                    class="btn btn-secondary">Yopish
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                @endforeach
                            </tbody>

                        </table>
                        <div class="row w-100">
                            <div style="width: 30%; margin-left: 35%; margin-right: 35%;">

                                {{-- {!! $rejas->links() !!} --}}
                            </div>
                        </div>

                    </div>
                </div>

            </div> <!-- end col -->
        </div>
        <!-- end col -->
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
