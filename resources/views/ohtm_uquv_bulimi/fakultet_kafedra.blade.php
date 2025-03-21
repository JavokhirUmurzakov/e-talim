@extends('layouts.ohtm_uquv_bulimi')

@section('title', "ADMIN")

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
                <h4 class="mb-0">Fakultet kafedra jadvali</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">E-talim</a></li>
                        <li class="breadcrumb-item active">Fakultet kafedra</li>
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
                                        <h5 class="modal-title mt-0" id="myExtraLargeModalLabel">Fakultet kafedraga yangi qator qo'shish</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{ route('uquvbulumi.fakultet_kafedra.index') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">Fakultet kafedra turi</label>
                                                            <select class="form-control" name="fak_kaf_turi_id" required>
                                                                <option>Tanlash...</option>
                                                                @foreach($fak_kaf_turi as $turi)
                                                                    <option value="{{$turi['id']}}">{{$turi['nomi']}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">Fakultet kafedra nomi</label>
                                                            <input type="text" name="nomi" class="form-control"  placeholder="Fakultet kafedra nomi" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">Fakultet kafedra qisqartma nomi</label>
                                                            <input type="text" name="qs_nomi" class="form-control"  placeholder="Fakultet kafedra qisqartma nomi" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">Fakultet kafedra raqami</label>
                                                            <input type="text" name="kod" class="form-control"  placeholder="Fakultet kafedra kodi" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">Boshqaruvchisi</label>
                                                            <select class="form-control" name="parent_id">
                                                                <option>Tanlash...</option>
                                                                @foreach($bshlar as $bsh)
                                                                    <option value="{{$bsh['id']}}">{{$bsh['qs_nomi']}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>Batafsil</label>
                                                            <textarea id="textarea" class="form-control" name="haqida" rows="3" placeholder="Batafsil ma'lumot..." required></textarea>
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

                    <table id="datatable-buttons1" class="table table-striped table-bordered dt-responsive nowrap text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>OHTM nomi</th>
                            <th>Fakultet kafedra turi</th>
                            <th>Fakultet kafedra nomi</th>
                            <th>Fakultet kafedra qisqartma nomi</th>
                            <th>Fakultet kafedra raqami</th>
                            <th>Boshqarmasi</th>
                            <th>Batafsil</th>
                            <th>Amallar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($fakkaf as $fkf)
                            <tr>
                                <td>{{$fkf->ohtm->nomi}}</td>
                                <td>{{$fkf->fak_kaf_turi->nomi}}</td>
                                <td>{{$fkf->nomi}}</td>
                                <td>{{$fkf->qs_nomi}}</td>
                                <td>{{$fkf->kod}}</td>
                                <td>
                                    @if($fkf->parent)
                                        {{$fkf->parent->nomi}}
                                    @else
                                        -
                                    @endif
                                    {{--                                    {{json_encode($fkf->parent,true)['nomi'] }}--}}
                                </td>
                                <td>{{$fkf->haqida}}</td>
                                <td>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-6">
                                                <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-xl{{$fkf->id}}">
                                                    <i class="ri-edit-2-line" style="height: 24px; width: 24px; color: #3e8f3e; align-content: center"></i>
                                                </button>
                                            </div>
                                            <div class="col-6">
                                                <form action="{{ route('uquvbulumi.fakultet_kafedra.delete') }}" method="POST">
                                                    @csrf
                                                    <input name="id" value="{{$fkf->id}}" class="d-none hidden">
                                                    <button type="submit"  class="btn btn-primary" data-toggle="tooltip" title="O'chirish">
                                                        <i class="ri-delete-bin-line " style="height: 24px; width: 24px; color: red; align-content: center"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <div class="modal fade bs-example-modal-xl{{$fkf->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel{{$fkf->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title mt-0" id="myExtraLargeModalLabel{{$fkf->id}}">Fakultet kafedrani tahrirlash</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form name="edit-blog-post-form{{$fkf->id}}" id="edit-blog-post-form{{$fkf->id}}" method="post" action="{{ route('uquvbulumi.fakultet_kafedra.edit',$fkf->id) }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="validationCustom01">Fakultet kafedra turi</label>
                                                                <select class="form-control" name="fak_kaf_turi_id" required>
                                                                    @foreach($fak_kaf_turi as $turi)
                                                                        @if($fkf->fak_kaf_turi_id == $turi['id'])
                                                                            <option value="{{$turi['id']}}" selected>{{$turi['nomi']}}</option>
                                                                        @else
                                                                            <option value="{{$turi['id']}}">{{$turi['nomi']}}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="validationCustom01">Fakultet kafedra nomi</label>
                                                                <input type="text" value="{{$fkf->nomi}}" name="nomi" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <label for="validationCustom01">Fakultet kafedra qisqartma nomi</label>
                                                                <input type="text" value="{{$fkf->qs_nomi}}" name="qs_nomi" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <label for="validationCustom01">Fakultet kafedra kodi</label>
                                                                <input type="text" value="{{$fkf->kod}}" name="kod" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="validationCustom01">Boshqaruvchisi</label>
                                                                <select class="form-control" name="parent_id">
                                                                    @foreach($bshlar as $bsh)
                                                                        @if($fkf->parent_id == $bsh['id'])
                                                                            <option value="{{$bsh['id']}}" selected>{{$bsh['qs_nomi']}}</option>
                                                                        @else
                                                                            <option value="{{$bsh['id']}}">{{$bsh['qs_nomi']}}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Batafsil</label>
                                                                <textarea id="textarea" class="form-control" name="haqida" rows="3" required>{{$fkf->haqida}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <button type="submit" class="btn btn-primary">Jo'natish</button>
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

                    {{--                            {!! $fakkaf->links() !!}--}}
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



        // document.addEventListener('DOMContentLoaded', function() {
        //     var slc =document.getElementById("slc");
        //     slc[0].selectedIndex = -1;
        // }, false);


        function myFunction() {

            var passedArray = <?php echo json_encode($fak_kaf_turi); ?>;
            {{--var data = {{json_encode($fak_kaf_turi)}};--}}
            console.log(passedArray);
            // console.log('sasasasa');
        }
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
