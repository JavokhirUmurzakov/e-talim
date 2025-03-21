@extends('layouts.mv_upvka')
@section('title', 'Yo\'nalishlar')

@section('css')

@endsection

@section('content')
    <div class="main-content cyan-200 " style="color: cyan-200;">

        <div class="page-content ">
            <div class="container-fluid ">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Yo'nalishlar</a></li>
                                    <li class="breadcrumb-item active">Yo'nalish haqida</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
            </div>

            <div class="container shadow card bg-light ">
                <div class="col-12">
                    <div class="container  mx-0 ">
                        <div class="row mx-3 bg-light  ">
                            <div class="container-fluid bg-light ">
                                <div class="d-flex align-items-center flex-column mb-4 bg-light">
                                    <div class="logo1 me-3 mt-3 avatar-lg"><img
                                            src="{{ asset('/storage/' . $yunalishlar->logo) }}" alt=""></div>
                                    <div class="mt-2">
                                        <span
                                            class="d-block font-size-20 font-weight-bolder">{{ $yunalishlar->nomi }}</span>
                                        <span class="d-block font-size-18 " style="text-align: center;">Maxsus nomi:
                                            {{ $yunalishlar->qs_nomi }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h5 class=" cyan-300 ml-5 mt-5 " style="color: gray;"></h5>
                        <div class="row d-flex justify-content-center shadow mx-5 pt-3 "
                            style=" background-color: #CFE2F9;">
                            @foreach ($yunalishlar->guruhlar as $guruh)
                                <div class="card me-2 col-lg-2 mx-2 bg-soft-info profile-card" style="flex: 1;"
                                    onclick="location.href='royxat.html';">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">{{$guruh->nomi}}</h5>
                                        <p class="card-text text-center">{{$guruh->kurs_id}}</p>
                                    </div>
                                </div>
                            @endforeach
                            {{-- <div class="card me-2 col-lg-2 mx-2 bg-soft-info profile-card" style="flex: 1;" onclick="location.href='royxat.html';">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">2-kurs</h5>
                                        <p class="card-text text-center">201-guruh</p>
                                </div>
                            </div>
                            <div class="card me-2 col-lg-2 mx-2 bg-soft-info profile-card" style="flex: 1;" onclick="location.href='royxat.html';">
                                <div class="card-body">
                                    <h5 class="card-title text-center">3-kurs</h5>
                                    <p class="card-text text-center">301-guruh</p>
                                </div>
                            </div>
                            <div class="card  col-lg-2 mx-2 bg-soft-info profile-card" style="flex: 1;" onclick="location.href='royxat.html';">
                                <div class="card-body">
                                    <h5 class="card-title text-center">4-kurs</h5>
                                    <p class="card-text text-center">401-guruh</p>
                                </div>
                            </div> --}}
                        </div>

                        <h5 class=" cyan-300 ml-5 mt-5 " style="color: gray;">Xorijiy</h5>
                        <div class="row d-flex justify-content-center shadow mx-5 pt-3" style=" background-color: #CFE2F9;">
                            <div class="card me-2 col-lg-2 mx-2 bg-soft-success profile-card" style="flex: 1;"
                                onclick="location.href='royxat.html';">
                                <div class="card-body">
                                    <h5 class="card-title text-center">1-kurs</h5>
                                    <p class="card-text text-center">101-guruh</p>
                                </div>
                            </div>
                            <div class="card me-2 col-lg-2 mx-2 bg-soft-success profile-card" style="flex: 1;"
                                onclick="location.href='royxat.html';">
                                <div class="card-body">
                                    <h5 class="card-title text-center">2-kurs</h5>
                                    <p class="card-text text-center">201-guruh</p>
                                </div>
                            </div>
                            <div class="card me-2 col-lg-2 mx-2 bg-soft-success profile-card" style="flex: 1;"
                                onclick="location.href='royxat.html';">
                                <div class="card-body">
                                    <h5 class="card-title text-center">3-kurs</h5>
                                    <p class="card-text text-center">301-guruh</p>
                                </div>
                            </div>
                            <div class="card  col-lg-2 mx-2 bg-soft-success profile-card" style="flex: 1;"
                                onclick="location.href='royxat.html';">
                                <div class="card-body">
                                    <h5 class="card-title text-center">4-kurs</h5>
                                    <p class="card-text text-center">401-guruh</p>
                                </div>
                            </div>
                        </div>

                        <h5 class=" cyan-300 ml-5 mt-5 " style="color: gray;">Magistratura</h5>
                        <div class="row d-flex justify-content-center shadow mx-5 pt-3" style=" background-color: #CFE2F9;">
                            <div class="card me-2 col-lg-4 mx-3 bg-body mr-1 profile-card" style="flex: 1;"
                                onclick="location.href='royxat.html';">
                                <div class="card-body">
                                    <h5 class="card-title text-center">1-kurs</h5>
                                    <p class="card-text text-center">101-guruh</p>
                                </div>
                            </div>
                            <div class="card me-2 col-lg-4 mx-3 bg-body ml-1 profile-card" style="flex: 1;"
                                onclick="location.href='royxat.html';">
                                <div class="card-body">
                                    <h5 class="card-title text-center">2-kurs</h5>
                                    <p class="card-text text-center">201-guruh</p>
                                </div>
                            </div>
                        </div>

                        <h5 class=" cyan-300 ml-5 mt-5 " style="color: gray;">Malaka oshirish</h5>
                        <div class="row d-flex justify-content-center shadow mx-5 pt-3 mb-2"
                            style=" background-color: #CFE2F9;">
                            <div class="card me-2 col-lg-2 mx-2 profile-card" style="flex: 1; background-color:#aab2f3;"
                                onclick="location.href='royxat.html';">
                                <div class="card-body">
                                    <h5 class="card-title text-center ">1-kurs</h5>
                                    <p class="card-text text-center">101-guruh</p>
                                </div>
                            </div>
                            <div class="card me-2 col-lg-2 mx-2 profile-card" style="flex: 1; background-color:#aab2f3;"
                                onclick="location.href='royxat.html';">
                                <div class="card-body">
                                    <h5 class="card-title text-center">2-kurs</h5>
                                    <p class="card-text text-center">201-guruh</p>
                                </div>
                            </div>
                            <div class="card me-2 col-lg-2 mx-2 profile-card" style="flex: 1; background-color:#aab2f3;"
                                onclick="location.href='royxat.html';">
                                <div class="card-body">
                                    <h5 class="card-title text-center">3-kurs</h5>
                                    <p class="card-text text-center">301-guruh</p>
                                </div>
                            </div>
                            <div class="card  col-lg-2 mx-2 profile-card" style="flex: 1; background-color:#aab2f3;"
                                onclick="location.href='royxat.html';">
                                <div class="card-body">
                                    <h5 class="card-title text-center">4-kurs</h5>
                                    <p class="card-text text-center">401-guruh</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
