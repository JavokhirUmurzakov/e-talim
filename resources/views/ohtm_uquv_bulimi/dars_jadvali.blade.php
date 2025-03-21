@extends('layouts.ohtm_uquv_bulimi')

@section('title', "ADMIN")
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

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Dars jadvali</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">E-talim</a></li>
                        <li class="breadcrumb-item active">Dars jadvali</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            {{--                        modal !!! create  !!!!name bilan id lar bir xil bolmasligi kerak--}}
            <button type="button" class="btn btn-primary waves-effect waves-light float-right"
                    data-toggle="modal" data-target=".bs-example-modal-xl">Qo'shish++
            </button>

            <div class="modal fade bs-example-modal-xl" data-backdrop="static" tabindex="-1"
                 role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="myExtraLargeModalLabel1">Yangi qator qo'shish</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Form for adding data -->
                            <form method="post" action="{{ route('uquvbulumi.dars_jadvali.create') }}">
                                @csrf
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="sana">Sana</label>
                                                <input type="date" name="sana" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="fan">Fan</label>
                                                <select name="fan" class="form-control" required>
                                                    <option>Tanlash...</option>
                                                    @foreach($fanlar as $fan)
                                                        <option value="{{$fan['id']}}">{{$fan['qs_nomi']}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="guruh_id">Guruh</label>
                                                <select name="guruh_id" class="form-control" required>
                                                    <option>Tanlash...</option>
                                                    @foreach($darsjad as $darsj)
                                                        <option
                                                            value="{{$darsj['id']}}">{{$darsj['nomi']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="dars_vaqti_id">Dars vaqti</label>
                                                <select name="dars_vaqti_id" class="form-control" required>
                                                    <option>Tanlash...</option>
                                                    @foreach($dars_vaqtis as $d)
                                                        <option value="{{ $d->id }}">{{ $d->vaqti }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="fan_uqituvchi_id">Fan o'qituvchisi</label>
                                                <select name="fan_uqituvchi_id" class="form-control" required>
                                                    <option>Tanlash...</option>
                                                    @foreach($darsjad as $f)
                                                        <option value="{{ $f->id }}">{{ $f->fan_uqituvchi_fio }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="xona_id">Xona</label>
                                                <select name="xona_id" class="form-control" required>
                                                    <option>Tanlash...</option>
                                                    @foreach($darsjad as $x)
                                                        <option value="{{ $x->id }}">{{ $f->xona_nomi }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="uquv_yili_ohtm_id">O'quv yili OHTM</label>
                                                <select name="uquv_yili_ohtm_id" class="form-control" required>
                                                    <option>Tanlash...</option>
                                                    @foreach($darsjad as $x)
                                                        <option value="{{ $x->id }}">{{ $f->xona_nomi }}</option>
                                                    @endforeach
                                                    <!-- O'quv yili OHTM-ni dinamik qo'shishingiz mumkin -->
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <button type="submit" class="btn btn-primary">Jo'natish</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Yopish</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{--                        modal--}}


            <table id="datatable-buttons1"
                   class="table table-striped table-bordered dt-responsive nowrap"
                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr>
                    <th>Sana</th>
                    <th>Fan</th>
                    <th>Mavzu</th>
                    <th>Guruh</th>
                    <th>Dars vaqti</th>
                    <th>Fan o'qtuvchi</th>
                    <th>Xona</th>
                    <th>O'quv yili OHTM</th>
                    <th>Amallar</th>
                </tr>
                </thead>
                <tbody>

                @foreach($darsjad as $darj)
                    <tr>
                        <td>{{ $darj->sana }}</td>
                        <td>{{$darj->fan_nomi}}</td>
                        <td>{{ $darj->mavzu }}</td>
                        <td>{{ $darj->guruh->nomi }}</td>
                        <td>{{ $darj->dars_vaqti }}</td>
                        <td>{{ $darj->fan_uqituvchi_fio }}</td>
                        <td>{{ $darj->xona_nomi }}</td>
                        <td>{{ $darj->uquv_yili_ohtm_nomi }}</td>
                        <td>
                            <!-- Edit and Delete buttons -->
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target=".bs-example-modal-xl{{ $darj->id }}">
                                            <i class="ri-edit-2-line"></i>
                                        </button>
                                    </div>
                                    <div class="col-6">
{{--                                        <form action="{{ route('uquvbulumi.dars_jadvali.delete', $darj->id) }}" method="POST">--}}
{{--                                            @csrf--}}
{{--                                            @method('DELETE')--}}
{{--                                            <button type="submit" class="btn btn-danger">--}}
{{--                                                <i class="ri-delete-bin-line"></i>--}}
{{--                                            </button>--}}
{{--                                        </form>--}}
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!-- Edit Modal -->
                    <div class="modal fade bs-example-modal-xl{{ $darj->id }}" data-backdrop="static" tabindex="-1"
                         role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title mt-0">Dars jadvalini tahrirlash</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
{{--                                    <form method="POST" action="{{ route('uquvbulumi.dars_jadvali.edit', $darj->id) }}">--}}
{{--                                        @csrf--}}
{{--                                        @method('PUT')--}}
{{--                                        <div class="container-fluid">--}}
{{--                                            <div class="row">--}}
{{--                                                <!-- Modal content similar to add form, but prefilled with current values -->--}}
{{--                                                <div class="col-6">--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <label for="sana">Sana</label>--}}
{{--                                                        <input type="date" name="sana" class="form-control" value="{{ $darj->sana }}" required>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-6">--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <label for="fan">Fan</label>--}}
{{--                                                        <select name="fan" class="form-control" required>--}}
{{--                                                            @foreach($fanlar as $fan)--}}
{{--                                                                <option value="{{ $fan->id }}" {{ $fan->id == $darj->fan_id ? 'selected' : '' }}>{{ $fan->qs_nomi }}</option>--}}
{{--                                                            @endforeach--}}
{{--                                                        </select>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <!-- Other fields (guruh_id, dars_vaqti_id, etc.) go here -->--}}
{{--                                            </div>--}}
{{--                                            <div class="row">--}}
{{--                                                <button type="submit" class="btn btn-primary">Yangilash</button>--}}
{{--                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Yopish</button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </tbody>
            </table>
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


        // document.addEventListener('DOMContentLoaded', function() {
        //     var slc =document.getElementById("slc");
        //     slc[0].selectedIndex = -1;
        // }, false);


        {{--function myFunction() {--}}

        {{--    var passedArray = <?php echo json_encode($fak_kaf_turi); ?>;--}}
        {{--    --}}{{--var data = {{json_encode($fak_kaf_turi)}};--}}
        {{--    console.log(passedArray);--}}
        {{--    // console.log('sasasasa');--}}
        {{--}--}}
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
