@extends('layouts.mv_upvka')
@section('title', 'Yo\'nalishlar')

@section('css')

@endsection

@section('content')
    <div class="main-content cyan-200 " style="color: cyan-200;">

        <div class="page-content ">
            <div class="container-fluid profile-page">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12 align-content-center">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Yo'nalishlar</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">AKT va AHI</a></li>
                                    <li class="breadcrumb-item active">Yo'nalishlar</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
            </div>
            <h5 class=" cyan-300 ml-4 mt-5 " style="color: gray;">Yo'nalishlar</h5>
            <div class=" profile-page mt-3 shadow mx-4 ">
                <div class="row mx-3 bg-light ">
                    @foreach($yunalishlar as $yunalish)
                        <div class="col-xl-4 col-lg-5 col-md-4 mt-2">
                            <div class="card profile-header bg-soft-info ">
                                <div class="body">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-12 mt-2">
                                            <div class="profile-image float-md-right "> <img
                                                    src="{{asset($yunalish->logo)}}" alt=""> </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-12 mt-1 ">
                                            <h4 class="m-t-0 m-b-0 font-size-20 mt-4"><a href="{{route('mv_upvka.yunalish.show', $yunalish->id)}}">{{$yunalish->nomi}}</a></h4></br>
                                            <h5 class="font-family-secondary">Maxsus nomi: {{$yunalish->qs_nomi}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>





            <!-- container-fluid -->
        </div>
    </div>
@endsection

