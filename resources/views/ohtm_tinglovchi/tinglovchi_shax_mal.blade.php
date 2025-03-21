@extends('layouts.tinglovchi')

@section('title', "Shaxsiy ma'lumotlar")

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
                <h4 class="mb-0">Shaxsiy ma'lumotlar jadvali</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">E-talim</a></li>
                        <li class="breadcrumb-item active">Shaxsiy ma'lumotlar</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    {{--    {{ route('uqituvchi.uqituvchi_shax_mal.edit',$fn->id) }}--}}
    <div class="row">
        <form name="edit-blog-post-form" id="edit-blog-post-form1" method="post"
              action="{{route('tinglovchi.tinglovchi_shax_mal.create')}}"
              enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="container-fluid">
                <div class="row">

                    <input type="hidden" name="id" value="{{$shaxs_mal->id}}">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="validationCustom01">Fuqarolik</label>
                            <input type="text" name="fuqarolik" class="form-control"
                                   placeholder="Fuqaroligi"
                                   value="{{$shaxs_mal->fuqarolik}}" required>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="validationCustom01">Passport raqami</label>
                            <input type="text" name="pass_raqami"
                                   class="form-control"
                                   placeholder="Passport raqami"
                                   value="{{$shaxs_mal->pass_raqami}}" required>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="validationCustom01">Jshshir kod</label>
                            <input type="text" name="jshshir_kod"
                                   class="form-control"
                                   placeholder="Jshshir kod"
                                   value="{{$shaxs_mal->jshshir_kod}}" required>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="validationCustom01">Tug'ilgan sana</label>
                            <input type="text" name="tugilgan_sana"
                                   class="form-control"
                                   placeholder="Tug'ilgan sana kun.oy.yil 17.02.2002"
                                   value="{{$shaxs_mal->tugilgan_sana}}" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="validationCustom01">Uy manzili</label>
                            <input type="text" name="uy_manzili"
                                   class="form-control"
                                   placeholder="Uy manzili"
                                   value="{{$shaxs_mal->uy_manzili}}" required>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="validationCustom01">Haqida</label>
                            <input type="text" name="haqida" class="form-control"
                                   placeholder="Haqida" value="{{$shaxs_mal->haqida}}"
                                   required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="validationCustom01">Jinsi</label><br>

                            <input type="radio" name="jinsi" id="erkak" @if($shaxs_mal->jinsi) checked @endif value="1" Erkak>
                            <label for="erkak">Erkak</label><br>

                            <input type="radio" id="ayol" name="jinsi" @if(!$shaxs_mal->jinsi) checked @endif value="0" Ayol >
                            <label for="ayol">Ayol</label><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-primary">Yangilash</button>
                </div>
            </div>
        </form>
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
    <script
        src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

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
