@extends('layouts.app')
@section('title' , 'E-HARBIY TALIM')

@section('body-content')
    <div>
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-lg-4">
                    <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
                        <div class="w-100">
                            <div class="row justify-content-center">
                                <div class="col-lg-9">
                                    <div>
                                        <div class="text-center">
                                            <div>
                                                <a href="index.html" class="logo"><img src="{{asset('assets/images/logo.png')}}" style="margin-bottom: 20px" height="150" alt="logo"></a>

                                                <h2>E-HARBIY TA'LIM</h2>
                                            </div>
                                        </div>
{{--                                        @dd(Illuminate\Support\Facades\Hash::make("123"))--}}
                                        <div class="p-2 mt-5">
                                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                                @csrf
                                                @method('post')
                                                <div class="form-group auth-form-group-custom mb-4">
                                                    <i class="ri-user-2-line auti-custom-input-icon"></i>
                                                    <label for="username">Login</label>
                                                    <input id="login" type="text" class="form-control @error('login') is-invalid @enderror"  name="login" value="{{ old('login') }}" required autocomplete="login" autofocus>
                                                    @error('login')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group auth-form-group-custom mb-4">
                                                    <i class="ri-lock-2-line auti-custom-input-icon"></i>
                                                    <label for="userpassword">Parol</label>
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>



                                                <div class="mt-4 text-center">
                                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Kirish</button>
                                                </div>

                                            </form>
                                        </div>

                                        <div class="mt-5 text-center">
                                            <p>AKT va AHI</p>
                                            <p>  2025  </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="authentication-bg">
                        <div class="bg-overlay"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
