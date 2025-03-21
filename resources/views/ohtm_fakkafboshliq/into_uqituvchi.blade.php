@extends('layouts.uqituvchi')

@section('title', "OHTM UQITUVCHI")

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
    <style>

    </style>

@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Shaxsiy ma'lumotlar</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);"></a>O'qituvchi</li>
                        <li class="breadcrumb-item active">Shaxsiy ma'lumotlar</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    </div>
    <div class="d-flex flex-grow-2 bg-light shadow p-0 h-100 container-fluid" style="border-radius: 5px 5px 5px 5px;;">

        <div class="container mt-5">
            <div class="row justify-content-start">
                <!-- Shaxsiy Ma'lumotlar Divi -->
                <div class="col-md-8">
                    <div class="profile-card">
                        <h2 class="header bg-primary">Shaxsiy Ma'lumotlar</h2>
                        @foreach($uqituvchi as $uqit)
                        <img src="{{ asset('storage/'.$uqit->uqituvchi_rasm) }}" alt="Foydalanuvchi Rasm" class="profile-img ">

                        <div class="d-flex mx-3">

{{--                                @dd($uqit)--}}
                                <div class="justify-content-lg-start col-6 ml-3">
                                    <p class="text-left"><strong>FIO:</strong> {{$uqit->uqituvchi_fio}}</p>
                                    <p class="text-left"><strong>Harbiy unvoni:</strong> {{$uqit->harbiy_unvon_nomi}}</p>
                                    <p class="text-left"><strong>Tug'ilgan vaqti:</strong> {{$uqit->tugilgan_sana}}</p>
                                    <p class="text-left"><strong>Fuqaroligi:</strong> {{$uqit->fuqarolik}}</p>
                                    <p class="text-left"><strong>Pasport raqami:</strong> {{$uqit->pass_raqami}}</p>
                                    <p class="text-left"><strong>Ilmiy unvoni:</strong> {{$uqit->ilmiy_unvon_qs_nomi}}</p>

                                </div>
                                <div class="justify-content-end col-6 mr-3 ml-3">
                                    <p class="text-left"><strong>JSHSHIR raqami:</strong> {{$uqit->jshshir_kod}}</p>
                                    <p class="text-left"><strong>Yashash manzili:</strong> {{$uqit->uy_manzili}}</p>
                                    <p class="text-left"><strong>Jinsi:</strong>@if($uqit->jinsi) Erkak @endif Ayol</p>
                                    <p class="text-left"><strong>Ilmiy daraja:</strong> {{$uqit->ilmiy_daraja_qs_nomi}}</p>
                                    <p class="text-left"><strong>Haqida:</strong> {{$uqit->haqida}}</p>
                                </div>

                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Yutuqlar Divi -->
                <div class="col-md-4">
                    <div class="achievement-card">
                        <h2 class="header bg-primary">Mutaxasislik Fanlari</h2>
                        <ul>
                            @foreach($fanlar as $fan)
{{--                                @dd($fan)--}}
                            <li>{{$fan->fanlar_nomi}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h4 style="margin: 20px;">O'qituvchi yutuqlari</h4>
    <div class="row mt-1">
        <div class="col-xl-12">
            <div class="row">
                @foreach($yutuq as $gur)
                    <div class="col-3">
                        <div class="card card-hover">
                            <div class="card-header" style="background-color: #282c3c">
                                <p style="color: #00ff80">{{$gur->haqida}}</p>
                                <div style="display: flex;">
                                    <form action="{{ route('tinglovchi.yutuq.delete', $gur->id) }}"
                                          method="POST" style="display: flex; justify-content: space-between;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-success" style="margin-right:4px;">
                                            <i class="ri-delete-bin-line " data-toggle="tooltip" title="O'chirish"
                                               style="height: 24px; width: 24px;align-content:center;color: #0b0b0b;"></i>
                                        </button>
                                    </form>
                                    <a class="btn btn-outline-success" data-toggle="modal"
                                       style="padding-top:15px;margin-right: 3px;"
                                       data-target=".bbs-example-modal-xl{{$gur->id}}"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-outline-{{is_null($gur->fayl)?'warning' : 'success'}}"
                                       href="{{is_null($gur->fayl)? '#' : '/storage/' . $gur->fayl}}"
                                       download="{{is_null($gur->fayl)? '#' : '/storage/' . $gur->fayl}}"
                                       style="padding-top:15px;"><i class="fas fa-cloud-download-alt"></i></a>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <i class="fas fc-agenda-view-alt"></i>
                                <embed src="{{ '/storage/' . $gur->fayl}}" style="object-fit: contain;" width="320" height="280"/>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade bbs-example-modal-xl{{$gur->id}}" data-backdrop="static" tabindex="-1"
                         role="dialog"
                         aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered" style="width: 800px;height: 600px;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title mt-0" id="myExtraLargeModalLabel1">{{$gur->haqida}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" style="padding: 20px;">
                                    <embed src="{{ '/storage/' . $gur->fayl}}"
                                           style="object-fit: contain;width: 755px;height: 580px;" toolbar="0"/>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
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

