@extends('layouts.tinglovchi')

@section('title', 'OHTM_tinglovchi baho')

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
    <link
@endsection
@section('content')
    {{--    @dd($ohtms) --}}
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0"> Yakuniy Baholar jadvali</h4>

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
                            <a class="dropdown-item font-size-14 text-primary" data-toggle="tooltip" title="Jurnalga o'tish uchun bosing" href="{{route('tinglovchi.baho_oraliq.oraliq' ,$jurnal->id)}}">Oraliq baholar</a>
                            <a class="dropdown-item font-size-14 text-primary" data-toggle="tooltip" title="Jurnalga o'tish uchun bosing" href="{{route('tinglovchi.baho_joriy.index' ,$jurnal->id)}}">Joriy baholar</a>
                                                        <a class="dropdown-item font-size-14 text-primary" data-toggle="tooltip" title="Jurnalga o'tish uchun bosing" href="{{route('tinglovchi.baho_mustaqil.index',$jurnal->id)}}">Mustaqil topshiriq baholar</a>
                                                        <a class="dropdown-item font-size-14 text-primary" data-toggle="tooltip" title="Jurnalga o'tish uchun bosing" href="{{route('tinglovchi.qayta_topshirish.index',$jurnal->id)}}">Qayta topshirish baholar</a>
                            <a class="dropdown-item font-size-14 text-primary" data-toggle="tooltip" title="Jurnalga o'tish uchun bosing" href="{{route('tinglovchi.baho_yakuniy.yakuniy',$jurnal->id)}}">Yakuniy baholar</a>
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
                                                            data-target=".bs-example-modal-xl-edit{{$bor_id}}">{{$baho_array[$baho_id]['nomi']}}
                                                    </button>

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
                                                            </div>
                                                        </div>

                                                    </div>
                                                @else

                                                @endif
                                            @else

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
        });
        @endforeach
    </script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip(); // Tooltipni faollashtirish
        });
    </script>
@endsection
