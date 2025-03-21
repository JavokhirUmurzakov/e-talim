
@extends('layouts.ohtm_uquv_bulimi')

@section('title', "Ohtm_uquv_bulimi")

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
                <h4 class="mb-0">Qayta topshirish</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">O'quv bo'limi</a></li>
                        <li class="breadcrumb-item active">Qayta topshirish</li>
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
                                        <h5 class="modal-title mt-0" id="myExtraLargeModalLabel1"> Qayta topshirishga yangi
                                            qator qo'shish</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <form name="add-blog-post-form" id="add-blog-post-form" method="post"
                                              action="{{ route('uquvbulumi.qayta_topshirish.create') }}"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('post')
                                            <div class="container-fluid">
                                                <div class="row">

                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">To'ldirilgan sanasi</label>
                                                            <input type="date" name="sana" class="form-control"
                                                                   placeholder="To'ldirilgan Sana" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">Reyting varaqa raqami</label>
                                                            <input type="number" name="nomer" class="form-control"
                                                                   placeholder="Qaytnoma raqami" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">Nazorat oluvchi</label>
                                                            <input type="text" name="nazorat_oluvchi" class="form-control" data-toggle="tooltip" title="Yozishda harbiy unvon qisqartmasi va bir kishidan ortiq bo'lsa ' , ' belgisi bilan ajratib yozing namuna bo'lishi mumkin k-n Haydaraliyev D.D."
                                                                   placeholder="Nazorat oluvchi" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">Kafedra boshlig'i harbiy unvoni</label>
                                                            <select name="kafedra_boshliq_unvon_id" class="form-control" required>
                                                                <option>Tanlash...</option>
                                                                @foreach($harbiy_unvon as $unvon)
                                                                    <option
                                                                        value="{{$unvon->id}}">{{$unvon->nomi}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">Kafedra boshlig'i</label>
                                                            <select name="kaf_bosh_id" class="form-control" required>
                                                                <option>Tanlash...</option>
                                                                @foreach($uqituvchi as $uquv)
                                                                    <option
                                                                        value="{{$uquv->id}}">{{$uquv->fio}}</option>
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

                    <table id="datatable-buttons1" class="table table-striped table-bordered dt-responsive nowrap text-center"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Fan nomi</th>
                            <th>Sana</th>
                            <th>Qaydnoma raqami</th>
                            <th>Joriy nazorat oluvchi</th>
                            <th>Oraliq nazorat oluvchi</th>
                            <th>Yakuniy nazorat oluvchi</th>
                            <th>Uquv bo'lim boshlig'i</th>
                            <th>Xulosa</th>
                            <th>Faol</th>
                            <th>Amallar</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($videmost as $f)
                            <tr>
                                {{--                                @dd($f)--}}
                                <td>{{$f->fan_nomi}} ( {{$f->guruh_nomi}} , {{$f->uqy_nomi}} ) </td>
                                <td>{{$f->sana}}</td>
                                <td>{{$f->nomer}}</td>
                                <td>{{$joriy_uqituvchi->unvon_qs_nomi. '  ' .$joriy_uqituvchi->joriy_fio}}</td>
                                <td>{{$oraliq_uqituvchi->unvon_qs_nomi. '  ' .$oraliq_uqituvchi->oraliq_fio}}</td>
                                <td>{{$f->yakuniy_oluvchi}}</td>
                                <td>{{$f->harbiy_unvon_nomi.' '.$f->uquv_bulim_boshliq}} </td>
                                <td>{{$f->xulosa}}</td>
                                <td>@if($f->faol) Faol @endif Faol emas</td>
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
                                                <form action="{{ route('uquvbulumi.videmost_baho.index', $f->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('get')
                                                    <button type="submit" class="btn btn-primary mr-1"  data-toggle="tooltip" title="Ko'rish uchun bosing">
                                                        <i class="ri-eye-fill "
                                                           style="height: 24px; width: 24px; color: #ff0000; align-content: center"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            {{--                            --}}{{--                            @dd(request()->all());--}}
                            <div class="modal fade bs-example-modal-xl{{$f->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel{{$f->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title mt-0" id="myExtraLargeModalLabel{{$f->id}}">Videmostni tahrirlash</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form name="edit-blog-post-form" id="edit-blog-post-form1" method="post" action="{{ route('uquvbulumi.videmost.edit', $f->id) }}" enctype="multipart/form-data">

                                                @csrf
                                                @method('PUT')
                                                <div class="container-fluid">
                                                    <div class="row">

                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="validationCustom01">Fan nomi</label>
                                                                <select name="jurnal_id" class="form-control" required>
                                                                    @foreach($fannomi as $fa)
                                                                        <option value="{{ $fa->id }}"
                                                                            {{ old('jurnal_id', $f->jurnal_id ?? '') == $fa->id ? 'selected' : '' }}>
                                                                            {{ $fa->fan_nomi . " | " . $fa->guruh_nomi . " | " . $fa->semestr }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="validationCustom01">Yakuniy sanasi</label>
                                                                <input type="date" name="sana" class="form-control"
                                                                       value="{{ old('sana', $f->sana ?? '') }}" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="validationCustom01">Reyting nazorat qaytnoma raqami</label>
                                                                <input type="number" name="nomer" class="form-control" value="{{$f->nomer}}"
                                                                       placeholder="Qaytnoma raqami" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="validationCustom01">Joriy nazorat oluvchi</label>
                                                                <select name="joriy_uqituvchi" class="form-control" required>
                                                                    @foreach($nazoratchi as $nazorat)
                                                                        <option @if($nazorat['fio']==$joriy_uqituvchi->joriy_fio) selected @endif value="{{$nazorat['id']}}">{{$nazorat->fio}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="validationCustom01">Oraliq nazorat oluvchi</label>
                                                                <select name="oraliq_uqituvchi" class="form-control" required>
                                                                    @foreach($nazoratchi as $nazorat)
                                                                        <option @if($nazorat['fio']== $oraliq_uqituvchi->oraliq_fio) selected @endif value="{{$nazorat['id']}}">{{$nazorat->fio}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="validationCustom01">Yakuniy nazorat oluvchi</label>
                                                                <input type="text" name="yakuniy_oluvchi" class="form-control" data-toggle="tooltip" title="Yozishda harbiy unvon qisqartmasi va bir kishidan ortiq bo'lsa ' , ' belgisi bilan ajratib yozing namuna bo'lishi mumkin k-n Haydaraliyev D.D."
                                                                       placeholder="Yakuniy nazorat oluvchi" value="{{$f->yakuniy_oluvchi}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="validationCustom01">O'quv bo'limi boshlig'i harbiy unvoni</label>
                                                                <select name="uquv_bulim_boshliq_unvon_id" class="form-control" required>
                                                                    @foreach($harbiy_unvon as $unvon)
                                                                        <option @if($unvon['nomi']==$f->harbiy_unvon_nomi) selected @endif value="{{$unvon->id}}">{{$unvon->nomi}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="validationCustom01">O'quv bo'limi boshlig'i</label>
                                                                <input type="text" name="uquv_bulim_boshliq" class="form-control" data-toggle="tooltip" title="Ism qisqartmasi va familiya yozing quyidagi namuna D.Haydaraliyev "
                                                                       placeholder="O'quv bo'limi boshlig'i" value="{{$f->uquv_bulim_boshliq}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="validationCustom01">Xulosa</label>
                                                                <textarea  name="xulosa" class="form-control" rows="2" placeholder="Yakuniy nazorat xulosasini shu yerga yozing" required>{{ old('xulosa', $f->xulosa ?? '') }}</textarea>
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

                            {{--                            {!! $fanuq->links() !!}--}}
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

