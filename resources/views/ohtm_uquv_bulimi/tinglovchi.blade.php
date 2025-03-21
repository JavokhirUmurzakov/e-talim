@extends('layouts.ohtm_uquv_bulimi')

@section('title', "OHTM UQUV BO'LIMI")

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
        <div class="row col-12 ml-1">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center">Tinglovchilar ro'yxati</h2>

                        <div class="card-title float-right">
                            {{--                        modal !!! create  !!!!name bilan id lar bir xil bolmasligi kerak--}}
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                    data-target=".bs-example-modal-xl">Qo'shish++
                            </button>

                            <div class="modal fade bs-example-modal-xl" data-backdrop="static" tabindex="-1"
                                 role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title mt-0" id="myExtraLargeModalLabel1">Yangi tinglovchi qatorini qo'shish</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form name="add-blog-post-form" id="add-blog-post-form" method="post"
                                                  action="{{route('uquvbulumi.tinglovchi.store')}}"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                @method('post')
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="validationCustom01">Foydalanuvchi nomi (FIO)</label>
                                                                <input type="text" name="nomi" class="form-control" placeholder="User nomi" required>

                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="validationCustom01">Foydalanuvchi login</label>
                                                                <input type="text" name="login" class="form-control" placeholder="Login" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="validationCustom01">Parol</label>
                                                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Til</label>
                                                                <select name="til_id" class="form-control" required>
                                                                    <option>Tanlash...</option>
                                                                    @foreach($tils as $til)
                                                                        <option
                                                                            value="{{$til['id']}}">{{$til['nomi']}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>


                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="validationCustom01">Lavozim</label>
                                                                <input type="text" name="lavozim" class="form-control" placeholder="Lavozim" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div>
                                                                <label for="validationCustom01">Rasm</label>
                                                                <input type="file" name="rasm" class="form-control" placeholder="rasm" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Harbiy unvoni</label>
                                                                <select name="harbiy_unvon_id" class="form-control" required>
                                                                    <option>Tanlash...</option>
                                                                    @foreach($harbiy_unvons as $harbiy_unvon)
                                                                        <option
                                                                            value="{{$harbiy_unvon['id']}}">{{$harbiy_unvon['nomi']}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Fakultet & Kafedra (Mutaxasisligi)</label>
                                                                <select name="fakultet_kafedra_id" class="form-control" required>
                                                                    <option>Tanlash...</option>
                                                                    @foreach($fakultet_kafedras as $fakultet_kafedra)
                                                                        <option
                                                                            value="{{$fakultet_kafedra['id']}}">{{$fakultet_kafedra['qs_nomi']}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Guruh</label>
                                                                <select name="guruh_id" class="form-control" required>
                                                                    <option>Tanlash...</option>
                                                                    @foreach($guruhs as $guruh)
                                                                        <option
                                                                            value="{{$guruh['id']}}">{{$guruh['nomi']}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Tinglovchi (kursant) holati</label>
                                                                <select name="tinglovchi_holat_id" class="form-control" required>
                                                                    <option>Tanlash...</option>
                                                                    @foreach($tinglovchi_holat_id as $tinglovchi_holatid)
                                                                        <option
                                                                            value="{{$tinglovchi_holatid['id']}}">{{$tinglovchi_holatid['nomi']}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="validationCustom01">Haqida</label>
                                                                <textarea  name="haqida" class="form-control" rows="2" placeholder="Haqida batafsil yozing" ></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-3 mt-3">
                                                            <div class="form-group ">
                                                                <label for="faol">Faollik</label>
                                                                <input type="checkbox" name="faol" checked>
                                                            </div>
                                                        </div>



                                                    </div>
                                                    <div class="row">
                                                        <button type="submit" class="btn btn-primary">Jo'natish</button>
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
                            {{--                        modal--}}
                        </div>

                        <table id="datatable-buttons1"
                               class="table table-striped table-bordered dt-responsive text-center nowrap"
                               style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Rasm</th>
                                <th>Harbiy unvoni</th>
                                <th>FIO</th>
                                <th>Login</th>
                                <th>Faollik</th>
                                <th>Til</th>
                                <th>Ohtm</th>
                                <th>Lavozim</th>
                                <th>Fakultet & Kafedra</th>
                                <th>Guruh</th>
                                <th>Tinglovchi (kursant) holati</th>
                                <th>Haqida</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $user)
                                <tr>
                                    <td><img src="{{ asset('storage/'.$user->rasm) }}" alt="Rasm" width="50"
                                             height="50"></td>
                                    <td>{{$user->harbiy_unvon_nomi}}</td>
                                    <td>{{$user->fio}}</td>
                                    <td>{{$user->user_login}}</td>
                                    <td>@if($user->user_faol)
                                            faol
                                        @else
                                            Faol emas
                                        @endif</td>
                                    <td>{{$user->til_nomi}}</td>
                                    <td>{{$user->ohtm_qs_nomi}}</td>
                                    <td>{{$user->lavozim}}</td>
                                    <td>{{$user->fakultet_kafedra_qs_nomi}}</td>
                                    <td>{{$user->guruh_nomi}}</td>
                                    <td>{{$user->tinglovchi_holat_nomi}}</td>
                                    <td>{{$user->haqida}}</td>

                                    <td>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-6">
                                                    <button type="button"
                                                            class="btn btn-primary waves-effect waves-light"
                                                            data-toggle="modal"
                                                            data-target=".bs-example-modal-xl{{$user->id}}">
                                                        <i class="ri-edit-2-line"
                                                           style="height: 24px; width: 24px; color: #3e8f3e; align-content: center"></i>
                                                    </button>
                                                </div>
                                                <div class="col-6">
                                                    <form action="{{route('uquvbulumi.tinglovchi.delete', $user->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
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

                                <div class="modal fade bs-example-modal-xl{{$user->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel{{$user->id}}" aria-hidden="true">
                                    <div class="modal-dialog modal-xl modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title mt-0" id="myExtraLargeModalLabel{{$user->id}}">Tinglovchi qatorini tahrirlash</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form name="add-blog-post-form" id="add-blog-post-form" method="post"
                                                      action="{{route('uquvbulumi.tinglovchi.edit' ,$user->id)}}"
                                                      enctype="multipart/form-data">
                                                    @csrf
                                                    @method('put')
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="validationCustom01">Foydalanuvchi nomi (FIO)</label>
                                                                    <input type="text" name="nomi" class="form-control" placeholder="User nomi" value="{{$user->fio}}" required>

                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="validationCustom01">Foydalanuvchi login</label>
                                                                    <input type="text" name="login" class="form-control" placeholder="Login" value="{{$user->user_login}}" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="validationCustom01">Parol</label>
                                                                    <input type="password" name="password" class="form-control" placeholder="Password" >
                                                                </div>
                                                            </div>

                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">Til</label>
                                                                    <select name="til_id" class="form-control" required>
                                                                        <option>Tanlash...</option>
                                                                        @foreach($tils as $til)
                                                                            <option @if($til['nomi']==$user->til_nomi ) selected @endif value="{{$til['id']}}">{{$til['nomi']}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>


                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="validationCustom01">Lavozim</label>
                                                                    <input type="text" name="lavozim" class="form-control" placeholder="Lavozim" value="{{$user->lavozim}}" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                            <div class="col-6">
                                                                <div>
                                                                    <label for="validationCustom01">Mavjud rasm:</label><br>
                                                                    @if ($user->rasm)
                                                                        <img src="{{ asset('storage/'.$user->rasm) }}" width="100">
                                                                    @else
                                                                        <p>Rasm yuklanmagan</p>
                                                                    @endif
                                                                    <br>

                                                                    <label for="rasm">Yangi rasm yuklash:</label>
                                                                    <input type="file" name="rasm" >
                                                                </div>
                                                            </div>

                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">Harbiy unvoni</label>
                                                                    <select name="harbiy_unvon_id" class="form-control" required>
                                                                        <option>Tanlash...</option>
                                                                        @foreach($harbiy_unvons as $harbiy_unvon)
                                                                            <option @if($harbiy_unvon['nomi']==$user->harbiy_unvon_nomi) selected @endif value="{{$harbiy_unvon['id']}}">{{$harbiy_unvon['nomi']}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">Fakultet & Kafedra</label>
                                                                    <select name="fakultet_kafedra_id" class="form-control" required>
                                                                        <option>Tanlash...</option>
                                                                        @foreach($fakultet_kafedras as $fakultet_kafedra)
                                                                            <option @if($fakultet_kafedra['qs_nomi']==$user->fakultet_kafedra_qs_nomi) selected @endif value="{{$fakultet_kafedra['id']}}">{{$fakultet_kafedra['qs_nomi']}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">Guruh</label>
                                                                    <select name="guruh_id" class="form-control" required>
                                                                        <option>Tanlash...</option>
                                                                        @foreach($guruhs as $guruh)
                                                                            <option
                                                                               @if($guruh['nomi']==$user->guruh_nomi) selected @endif value="{{$guruh['id']}}">{{$guruh['nomi']}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">Tinglovchi holati</label>
                                                                    <select name="tinglovchi_holat_id" class="form-control" required>
                                                                        <option>Tanlash...</option>
                                                                        @foreach($tinglovchi_holat_id as $tinglovchi_holatid)
                                                                            <option
                                                                                @if($tinglovchi_holatid['nomi']==$user->tinglovchi_holat_nomi) selected @endif value="{{$tinglovchi_holatid['id']}}">{{$tinglovchi_holatid['nomi']}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="validationCustom01">Haqida</label>
                                                                    <textarea  name="haqida" id="haqida" class="form-control" rows="2"  >{{ old('haqida', $user->haqida ?? '') }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-3 mt-3">
                                                                <div class="form-group ">
                                                                    <label for="faol">Faollik</label>
                                                                    <input type="checkbox" name="faol" checked>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <button type="submit" class="btn btn-primary">Jo'natish</button>
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

                                {!! $users->links() !!}
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
