@extends('layouts.uqituvchi')

@section('title', 'OHTM_Uquv_bulimi - Fanlar')

@section('link')

    <link href="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}"
          rel="stylesheet"
          type="text/css"/>

    <!-- DataTables -->
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>

    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
          rel="stylesheet"
          type="text/css"/>


    <link href="{{ asset('assets/libs/select2/css/select2.min.css" rel="stylesheet') }}" type="text/css"/>
    <link href="{{ asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css"/>


    <!-- DataTables -->

    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>

    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"/>

@endsection

@section('content')
    {{--    @dd($ohtms) --}}


    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0"> Joriy Baholar jadvali</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">E-talim</a></li>
                        <li class="breadcrumb-item active">Fanlar</li>
                        <li class="breadcrumb-item active">Jurnal</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- Example split danger button -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-success font-size-16 ">Joriy baholar jurnali</button>
                        <button type="button" class="btn btn-outline-success dropdown-toggle dropdown-toggle-split font-size-14" data-toggle="dropdown" aria-haspopup="true" data-toggle="tooltip" title="Ko'rish uchun bosing" aria-expanded="false">
                            &#9662; <!-- Unicode pastga qaragan uchburchak -->
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item font-size-14 text-primary" data-toggle="tooltip" title="Jurnalga o'tish uchun bosing" href="{{route('uqituvchi.baho_oraliq.index' ,$jurnal->id)}}">Oraliqni baholash</a>
                            <a class="dropdown-item font-size-14 text-primary" data-toggle="tooltip" title="Jurnalga o'tish uchun bosing" href="{{route('uqituvchi.baho_mustaqil.index',$jurnal->id)}}">Mustaqil topshiriqni baholash</a>
                            <a class="dropdown-item font-size-14 text-primary" data-toggle="tooltip" title="Jurnalga o'tish uchun bosing" href="{{route('uqituvchi.qayta_topshirish.index',$jurnal->id)}}">Qayta topshirishni baholash</a>
                            <a class="dropdown-item font-size-14 text-primary" data-toggle="tooltip" title="Jurnalga o'tish uchun bosing" href="{{route('uqituvchi.baho_yakuniy.index',$jurnal->id)}}">Yakuniyni baholash</a>
                        </div>
                    </div>


                    <div class="card-title float-right">
                        {{--                        modal !!! create  !!!!name bilan id lar bir xil bolmasligi kerak --}}
                        {{-- <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                data-target=".bs-example-modal-xl">Qo'shish++
                        </button> --}}

                        <div class="modal fade bs-example-modal-xl" data-backdrop="static" tabindex="-1" role="dialog"
                             aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title mt-0" id="myExtraLargeModalLabel1">Fanlar yangi qator
                                            qo'shish</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form name="add-blog-post-form" id="add-blog-post-form" method="post"
                                              action="{{ route('uqituvchi.dars_kun.joriy.create') }}"
                                              enctype="multipart/form-data">
                                            @method('post')
                                            @csrf
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-9">
                                                        <div class="form-group">
                                                            <label for="mavzu_id">Mavzuni tanlang</label>
                                                            <select class="form-control" name="mavzu_id" id="mavzu_id">
                                                                @foreach ($mavzus as $mavzu )
                                                                    <option
                                                                        value="{{$mavzu->id}}">{{$mavzu->nomi . "|" . $mavzu->soat}}</option>
                                                                @endforeach
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="sana">Sana</label>
                                                            <h4 class="form-control">{{date("d-m-y")}}</h4>
                                                            <input type="hidden" name="sana" class="form-control"
                                                                   value="{{date("d-m-y")}}">
                                                            <input type="hidden" name="jurnal_id" class="form-control"
                                                                   value="{{$jurnal->id}}">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <button type="submit" class="btn btn-primary">Jo'natish</button>
                                                    <button type="button" data-dismissg="modal"
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

                    <div class="row w-100">
                        <div style="width: 30%; margin-left: 35%; margin-right: 35%;">

                        </div>
                    </div>

                    <table id="testTable" class="table table-striped text-center mt-2 font-size-16" >
                        <thead class="text-white" style="background: #252b3b">
                        <tr >
                            <th>T/r</th>
                            <th>FIO</th>
                            @foreach ($dars_kuns as $dars )
                                <th>{{$dars->sana}}@if ((date("y-m-d") === date('y-m-d', strtotime($dars->sana))))
                                        <button type="button" class="btn btn-primary waves-effect waves-light"
                                                data-toggle="modal"
                                                data-target=".bs-example-modal-xl{{$dars->id}}"><i
                                                class="ri-edit-line"></i></button>
                                    @endif
                                </th>
                                <div class="modal fade bs-example-modal-xl{{$dars->id}}" data-backdrop="static"
                                     tabindex="-1" role="dialog"
                                     aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title mt-0" id="myExtraLargeModalLabel1">Fanlar yangi
                                                    qator
                                                    qo'shish</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form name="add-blog-post-form" id="add-blog-post-form" method="post"
                                                      action="{{ route('uqituvchi.dars_kun.joriy.create') }}"
                                                      enctype="multipart/form-data">
                                                    @method('post')
                                                    @csrf
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-9">
                                                                <div class="form-group">
                                                                    <label for="mavzu_id">Mavzuni tanlang</label>
                                                                    <select class="form-control" name="mavzu_id"
                                                                            id="mavzu">
                                                                        @foreach ($mavzus as $mavzu )
                                                                            <option
                                                                                value="{{$mavzu->id}}">{{$mavzu->nomi . "|" . $mavzu->soat}}</option>
                                                                        @endforeach
                                                                    </select>

                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-group">
                                                                    <label for="sana">Sana</label>
                                                                    <h4 class="form-control">{{date("d-m-y")}}</h4>
                                                                    <input type="hidden" name="sana"
                                                                           class="form-control"
                                                                           value="{{date("d-m-y")}}">
                                                                    <input type="hidden" name="jurnal_id"
                                                                           class="form-control"
                                                                           value="{{$jurnal->id}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <button type="submit" class="btn btn-primary">Jo'natish
                                                            </button>
                                                            <button type="button" data-dismissg="modal"
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
                        </tr>
                        </thead>

                        <tbody>
                        <?php $i = 0; ?>
                        @foreach($tinglovchis as $ting)
                            <tr style="border: none;">
                                <td>{{$ting->id}}</td>
                                <td>{{$ting->fio}}</td>
                                @foreach($dars_kuns as $d)
                                    <td align="center">
                                        @if((date("y-m-d") === date('y-m-d', strtotime($d->sana))))
                                            @if($d->get_baho_only !=null)
                                                    <?php $bor = false; ?>
                                                @foreach($d->get_baho_only as $item)
                                                        <?php

                                                        if ($item->tinglovchi_id == $ting->id) {
                                                            $bor = true;
                                                            $kursant_id = $ting->id;
                                                            $baho_id = $item->baho_id;
                                                            $bor_id = $item->id;
                                                            $dars_kun_id = $d->id;

                                                        }
                                                        ?>
                                                    {{--                                                    bor--}}

                                                @endforeach
                                                @if($bor)
                                                    <button type="button"
                                                            class="btn btn-primary waves-effect waves-light"
                                                            data-toggle="modal"
                                                            data-target=".bs-example-modal-xl-edit{{$bor_id}}">{{$baho_array[$baho_id]['nomi']}}</button>

                                                    <div class="modal fade bs-example-modal-xl-edit{{$bor_id}}"
                                                         data-backdrop="static"
                                                         tabindex="-1" role="dialog"
                                                         aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-md modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form name="add-blog-post-form"
                                                                          id="add-blog-post-form" method="post"
                                                                          action="{{ route('uqituvchi.baho.joriy.edit', $bor_id) }}"
                                                                          enctype="multipart/form-data">
                                                                        @method('put')
                                                                        @csrf
                                                                        <div class="container-fluid">
                                                                            <div class="row">
                                                                                <div class="col-6">
                                                                                    <label>Kursant</label>
                                                                                    <h6>{{$ting->fio}}</h6>
                                                                                </div>
                                                                                <input type="hidden"
                                                                                       name="tinglovchi_id"
                                                                                       value="{{$kursant_id}}">
                                                                                <input type="hidden" name="dars_kun_id"
                                                                                       value="{{$dars_kun_id}}">

                                                                                <div class="col-6">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="baho_id">baho</label>
                                                                                        <select class="form-control"
                                                                                                name="baho_id"
                                                                                                id="baho">
                                                                                            @foreach ($bahos as $baho )
                                                                                                <option
                                                                                                    @if($baho->id == $baho_id) selected
                                                                                                    @endif value="{{$baho->id}}">{{$baho->nomi }}</option>
                                                                                            @endforeach
                                                                                        </select>

                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <div class="row">
                                                                                <button type="submit"
                                                                                        class="btn btn-primary">
                                                                                    Jo'natish
                                                                                </button>
                                                                                <button type="button"
                                                                                        data-dismissg="modal"
                                                                                        class="btn btn-secondary">Yopish
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                @else
                                                    <button type="button"
                                                            class="btn btn-warning waves-effect waves-light"
                                                            data-toggle="modal"
                                                            data-target=".bs-example-modal-xl-create{{$d->id}}-user{{$ting->id}}"></button>

                                                    <div
                                                        class="modal fade bs-example-modal-xl-create{{$d->id}}-user{{$ting->id}}"
                                                        data-backdrop="static"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-md modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form name="add-blog-post-form"
                                                                          id="add-blog-post-form" method="post"
                                                                          action="{{ route('uqituvchi.baho.joriy.create') }}"
                                                                          enctype="multipart/form-data">
                                                                        @method('post')
                                                                        @csrf
                                                                        <div class="container-fluid">
                                                                            <div class="row">
                                                                                <div class="col-6">
                                                                                    <label>Kursant</label>
                                                                                    <h6>{{$ting->fio}}</h6>
                                                                                </div>
                                                                                <input type="hidden"
                                                                                       name="tinglovchi_id"
                                                                                       value="{{$ting->id}}">
                                                                                <input type="hidden" name="dars_kun_id"
                                                                                       value="{{$d->id}}">
                                                                                <div class="col-6">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="baho_id">baho</label>
                                                                                        <select class="form-control"
                                                                                                name="baho_id"
                                                                                                id="mavzu">
                                                                                            @foreach ($bahos as $baho )
                                                                                                <option
                                                                                                    value="{{$baho->id}}">{{$baho->nomi }}</option>
                                                                                            @endforeach
                                                                                        </select>

                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <div class="row">
                                                                                <button type="submit"
                                                                                        class="btn btn-primary">
                                                                                    Jo'natish
                                                                                </button>
                                                                                <button type="button"
                                                                                        data-dismissg="modal"
                                                                                        class="btn btn-secondary">Yopish
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                @endif
                                            @else
                                                <button type="button" class="btn btn-warning waves-effect waves-light"
                                                        data-toggle="modal"
                                                        data-target=".bs-example-modal-xl-create{{$d->id}}-user{{$ting->id}}"></button>

                                                <div
                                                    class="modal fade bs-example-modal-xl-create{{$d->id}}-user{{$ting->id}}"
                                                    data-backdrop="static"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-md modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form name="add-blog-post-form" id="add-blog-post-form"
                                                                      method="post"
                                                                      action="{{ route('uqituvchi.baho.joriy.create') }}"
                                                                      enctype="multipart/form-data">
                                                                    @method('post')
                                                                    @csrf
                                                                    <div class="container-fluid">
                                                                        <div class="row">
                                                                            <div class="col-6">
                                                                                <label>Kursant</label>
                                                                                <h6>{{$ting->fio}}</h6>
                                                                            </div>
                                                                            <input type="hidden" name="tinglovchi_id"
                                                                                   value="{{$ting->id}}">
                                                                            <input type="hidden" name="dars_kun_id"
                                                                                   value="{{$d->id}}">
                                                                            <div class="col-6">
                                                                                <div class="form-group">
                                                                                    <label for="baho_id">baho</label>
                                                                                    <select class="form-control"
                                                                                            name="baho_id"
                                                                                            id="mavzu">
                                                                                        @foreach ($bahos as $baho )
                                                                                            <option
                                                                                                value="{{$baho->id}}">{{$baho->nomi }}</option>
                                                                                        @endforeach
                                                                                    </select>

                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="row">
                                                                            <button type="submit"
                                                                                    class="btn btn-primary">Jo'natish
                                                                            </button>
                                                                            <button type="button" data-dismissg="modal"
                                                                                    class="btn btn-secondary">Yopish
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @else
                                            @if($d->get_baho_only !=null)

                                                    <?php $bor = false ?>
                                                @foreach($d->get_baho_only as $item)
                                                        <?php
                                                        if ($item->tinglovchi_id == $ting->id) {
                                                            $bor = true;
                                                            $kursant_id = $ting->id;
                                                            $baho_id = $item->baho_id;
                                                            $bor_id = $item->id;
                                                        }
                                                        ?>
                                                @endforeach

                                                @if($bor)
                                                    <h5>{{$baho_array[$baho_id]['nomi']}}</h5>
                                                @endif
                                            @endif
                                        @endif

                                    </td>
                                    {{--                                    bor--}}
                                @endforeach

                            </tr>
                            {{--                            bor--}}
                        @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div> <!-- end col -->
    </div>




    {{--    </div>--}}
    {{--    </div>--}}
    {{--    </div> <!-- end col -->--}}
    {{--    </div>--}}

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
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip(); // Tooltipni faollashtirish
        });
    </script>

@endsection
