@extends('layouts.uqituvchi')

@section('title', "OHTM UQITUVCHI")

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
        .dropdown:hover .dropdown-menu {
            display: block;
            margin-top: 0; /* Bootstrap animatsiyasini oldini oladi */
        }
    </style>

@endsection

@section('content')


    {{-- @dd($users) --}}
    <div class="row">
        <div class="row col-12 ml-1">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center">Hujjatlar</h2>

                        <div class="card-title float-right">
                            {{--                        modal !!! create  !!!!name bilan id lar bir xil bolmasligi kerak --}}

                            <div class="modal fade bs-example-modal-xl" data-backdrop="static" tabindex="-1" role="dialog"
                                aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title mt-0" id="myExtraLargeModalLabel1">Yangi
                                                qatorini qo'shish</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        {{-- @foreach ($hujjatlars as $user) --}}


                                        <div class="modal-body">
                                            <form name="add-blog-post-form" id="add-blog-post-form" method="post"
                                                action="{{ route('uqituvchi.uqituvchi_hujjat.create') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('post')
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="validationCustom01">Hujjat nomi</label>
                                                                <input type="text" name="hujjat_nomi"
                                                                    class="form-control" placeholder="Hujjat nomi" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Hujjat turi</label>
                                                                <select name="hujjat_turi" class="form-control" required>
                                                                    <option>Tanlash...</option>
                                                                    @foreach ($hujjat_tur as $tur)
                                                                        <option value="{{ $tur->id }}">
                                                                            {{ $tur->name }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <input type="hidden" name="jurnal_id" value="{{$jurnal_id}}">

                                                        <div class="col-6">
                                                            <div>
                                                                <label for="validationCustom01">File path</label>
                                                                <input type="file" name="file" class="form-control"
                                                                    placeholder="file tanlash" required>
                                                            </div>
                                                        </div>
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
                                    <th>Hujjat nomi</th>
                                    <th>Hujjat turi</th>
                                    <th>Jurnal nomi</th>
                                    <th>Yuklangan fayl</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($hujjatlars as $user)
                                    <tr>
                                        {{-- <td><img src="{{ asset('storage/'.$user->rasm) }}" alt="Rasm" width="50"
                                             height="50"></td> --}}
                                        <td>{{ $user->nomi }}</td>
                                        <td>{{ $user->hujjat_turi_nomi }}</td>
                                        <td>{{ $user->jurnal_nomi }}</td>
                                        <td>
                                            <a class="btn btn-success" data-toggle="tooltip" title="Faylni yuklab olish" href="/storage/{{$user->file_path}}">{{$user->file_name}}</a>
                                        </td>
                                        <td>
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <button type="button"
                                                            class="btn btn-primary waves-effect waves-light"
                                                            data-toggle="modal"
                                                            data-target=".bs-example-modal-xl{{ $user->id }}">
                                                            <i class="ri-edit-2-line"
                                                                style="height: 24px; width: 24px; color: #3e8f3e; align-content: center"></i>
                                                        </button>
                                                    </div>
                                                    <div class="col-6">
                                                        <form action="{{ route('uqituvchi.uqituvchi_hujjat.delete', $user->id) }}"
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

                                    <div class="modal fade bs-example-modal-xl{{ $user->id }}" data-backdrop="static"
                                        tabindex="-1" role="dialog"
                                        aria-labelledby="myExtraLargeModalLabel{{ $user->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-xl modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mt-0"
                                                        id="myExtraLargeModalLabel{{ $user->id }}">O'qituvchi qatorini
                                                        tahrirlash</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form name="add-blog-post-form" id="add-blog-post-form"
                                                        method="post"
                                                        action="{{ route('uqituvchi.uqituvchi_hujjat.edit', $user->id) }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('put')
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="validationCustom01">Hujjat nomi</label>
                                                                        <input type="text" name="hujjat_nomi"
                                                                            class="form-control" placeholder="Hujjat nomi"
                                                                            value="{{ $user->nomi }}" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Hujjat turi</label>
                                                                        <select name="hujjat_turi" class="form-control" required>
                                                                            <option>Tanlash...</option>
                                                                            @foreach ($hujjat_tur as $tur)
                                                                                <option
                                                                                    value="{{$tur->id}}" {{$user->hujjat_turi_id == $tur->id ? 'selected':''}}> {{ $tur->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Jurnal nomi</label>
                                                                        <select name="jurnal_nomi" class="form-control"
                                                                            required>
                                                                            <option>Tanlash...</option>
                                                                            @foreach ($jurnal_nomi as $jurnal)
                                                                                <option
                                                                                    @if ($jurnal->nomi == $user->jurnal_nomi) selected @endif
                                                                                    value="{{ $jurnal->id }}">
                                                                                    {{ $jurnal->nomi }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-6">
                                                                    <div>
                                                                        <label for="validationCustom01">Mavjud
                                                                            file:</label><br>
                                                                        @if ($user->file_name!=null)
                                                                        <a class="btn btn-success" href="/storage/{{$user->file_path}}">{{$user->file_name}}</a>
                                                                        @else
                                                                            <p>File yuklanmagan</p>
                                                                        @endif
                                                                        <br>

                                                                        <label for="rasm">Fayl yuklash:</label>
                                                                        <input type="file" name="file">
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

                                {{-- {!! $users->links() !!} --}}
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

    <script src="{{URL('https:/cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js')}}"></script>
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
