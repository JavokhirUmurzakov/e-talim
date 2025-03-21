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
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <style>
        .card {
            width: 210mm; /* A4 o‘lchami */
            min-height: 297mm; /* A4 balandligi */
            padding: 30px;
            margin: 10px auto;
            overflow: hidden;
            position: relative;
            page-break-after: always; /* Har bir card yangi sahifada boshlanadi */
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); /* Shadow qo‘shildi */
            border-radius: 10px; /* Yumshoq burchaklar */
        }

        .card-body {
            padding: 30px;
        }

        /* Jadval styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
            font-size: 16px;
        }

        th {
            background-color: #ECEBEB;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #F8F8F8;
        }




    </style>

@endsection

@section('content')
    {{--    @dd($videmost)--}}
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Videmost baho</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">O'qituvchi</a></li>
                        <li class="breadcrumb-item active">Videmost baho</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
{{--    {{ route('uqituvchi.download.pdf') }}--}}
    <div class="m-3 float-left">
        <a href=""
           class="btn btn-primary waves-effect waves-light text-center float-right">Yuklab olish</a>
        <button id="downloadPdf" class="btn btn-primary">PDF Yuklab olish</button>
    </div>

    <div class="row">
        <div class="col-11">

            <div  class="card position-relative pdf-sheet">


                {{--                    @dd($videmost)--}}
                <div class="card-body">
                    <h5 class="text-center">O'ZBEKISTON RESPUBLIKASI MUDOFAA VAZIRLIGI {{ strtoupper($videmost->ohtm_nomi) }}</h5>
                    <h5 class="text-center">2607 -sonli</h5>
                    <h5 class="text-center">REYTING NAZORAT (O'ZLASHTIRISH) <br> QAYDNOMASI</h5><br>
                    <h5 class="text-center">{{$videmost->uquv_yili_nomi}} -o'quv yili {{$videmost->kurs_nomi}}  {{$videmost->guruh_nomi}} - guruh</h5><br>
                    <h5 class="ml-4">Fan nomi: <span style="text-decoration: underline;" class="font-weight-normal  font-italic font-size-16">{{ $videmost->fan_nomi }}</span></h5>

                    <p class="ml-4 font-size-15">Joriy nazorat oluvchi: <strong>{{$joriy_uqituvchi->unvon_qs_nomi.' '.$joriy_uqituvchi->joriy_fio}}</strong></p>
                    <p class="ml-4 font-size-15">Oraliq nazorat oluvchi: <strong>{{$oraliq_uqituvchi->unvon_qs_nomi.' '.$oraliq_uqituvchi->oraliq_fio}}</strong></p>
                    <p class="ml-4 font-size-15">Yakuniy nazorat oluvchi: <strong>{{$videmost->yakuniy_oluvchi}}</strong></p>
                    <p class="ml-4 font-size-15">Yakuniy nazorat o'tkazilgan sana: <strong>{{$videmost->sana}}</strong></p>

                    <table class="table  " style="font-family: 'Times New Roman'">
                        <thead class="text-center font-size-14">
                        <tr>
                            <th class="align-middle border-dark" rowspan="2" style="width: 20px;">T/r</th>
                            <th class="align-middle border-dark" rowspan="2">harbiy <br> unvoni</th>
                            <th class="align-middle border-dark" rowspan="2">familiyasi, ismi, sharifi</th>
                            <th class="align-middle border-dark pt-0 pb-0" colspan="3">Nazorat turi bo'yicha <br> qo'yilgan ballar</th>
                            <th class="align-middle border-dark" rowspan="2">Umumiy <br> ball</th>
                            <th class="align-middle border-dark" rowspan="2">Baho</th>
                        </tr>
                        <tr>
                            <th class="align-middle border-dark">Joriy <br> nazorat</th>
                            <th class="align-middle border-dark">Oraliq <br> nazorat</th>
                            <th class="align-middle border-dark">Yakuniy <br> nazorat</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        </tbody>
                    </table>

                    <p class="text-center font-size-15 mb-0" style="line-height: 1;">
                        O'quv bo'lim boshlig'i :
                        <span class="border-bottom border-dark d-inline-block">
                            <span>{{$videmost->harbiy_unvon_nomi}}</span>
                            <span style="margin-left: 150px">{{$videmost->uquv_bulim_boshliq}}</span>
                            </span>
                    </p>
                    <p class="text-center mt-0 pt-0 mb-0 ml-5 font-size-10" style="line-height: 1;">(harbiy unvoni, imzosi, familiyasi)</p>

                    <div class="page-break"></div>



                </div> {{-- card-body yopiladi --}}
            </div> {{-- card yopiladi --}}
            <div  class="card pdf-sheet">
                <div class="card-body">
                    <p class="ml-5 font-size-15">Jami: <strong>{{$videmost->jami_tinglovchi}}</strong></p>
                    <p class="ml-5 font-size-15">A'lo: <strong>{{$videmost->alo}}</strong></p>
                    <p class="ml-5 font-size-15">Yaxshi: <strong>{{$videmost->yaxshi}}</strong></p>
                    <p class="ml-5 font-size-15">Qoniqarli: <strong>{{$videmost->qoniqarli}}</strong></p>
                    <p class="ml-5 font-size-15">Qoniqarsiz: <strong>{{$videmost->qoniqarsiz}}</strong></p>
                    <p class="ml-5 font-size-15">Baholanmaganlar: <strong>{{$videmost->baholanmagan}}</strong></p>
                    <h5 class="ml-5 font-size-15" style="text-align: justify;">Yakuniy nazorat bo'yicha chiqarilgan xulosalarning qisqacha mazmuni:
                        <span class="font-weight-normal d-block mt-1" style="text-decoration: underline; line-height: 1.5; text-align: justify;">{{$videmost->xulosa}}</span></h5>
                    <p class="font-size-15 ml-5 mt-3 mb-0" style="display: flex; line-height: 1.5;">
                        <span style="flex: 1; border-bottom: 1px solid black;"></span>
                    </p>
                    <p class=" mt-1 pt-0 mb-0 ml-5 font-size-10" style="line-height: 1;">(nazorat olgan shaxsning imzosi)
                        <span class="float-right">(kafedra boshlig'ining imzosi)</span></p>
                </div>
            </div>

        </div> {{-- col-11 yopiladi --}}
    </div> {{-- row yopiladi --}}

@endsection


@section('script')

    <!-- JAVASCRIPT -->

    <script src="{{asset('assets/js/pages/apexcharts.init.js')}}"></script>
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


    <script src="{{ URL('https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js')}}"></script>
    <script src="{{ URL('https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js')}}"></script>


{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>--}}
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

    <script>
        document.getElementById("downloadPdf").addEventListener("click", function () {
            const { jsPDF } = window.jspdf;
            let doc = new jsPDF("p", "mm", "a4");

            let elements = document.querySelectorAll(".pdf-sheet"); // Barcha sheetlarni olish
            let yOffset = 10; // Har bir sahifa boshi uchun bo'sh joy

            let addPage = false; // Birinchi sahifadan keyin yangi sahifa ochish uchun

            elements.forEach((element, index) => {
                html2canvas(element, { scale: 2 }).then((canvas) => {
                    let imgData = canvas.toDataURL("image/png");
                    let imgWidth = 210; // A4 eni (mm)
                    let imgHeight = (canvas.height * imgWidth) / canvas.width; // Proporsiyani saqlash

                    if (addPage) {
                        doc.addPage(); // Yangi sahifa qo'shish
                    }
                    doc.addImage(imgData, "PNG", 0, yOffset, imgWidth, imgHeight);
                    addPage = true; // Keyingi loopda yangi sahifa qo‘shish

                    if (index === elements.length - 1) {
                        doc.save("sheets.pdf"); // Oxirgi sahifadan keyin yuklash
                    }
                });
            });
        });
    </script>


@endsection


