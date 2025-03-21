@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                </div>

                <div class="account-dropdown__item">

{{--                    <a href="{{ route('logout') }}">--}}
{{--                        <svg xmlns="" width="24" height="24" viewBox="0 0 24 24" fill="none"--}}
{{--                             stroke="currentColor" stroke-width="2" stroke-linecap="round"--}}
{{--                             stroke-linejoin="round" class="feather feather-log-out">--}}
{{--                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>--}}
{{--                            <polyline points="16 17 21 12 16 7"></polyline>--}}
{{--                            <line x1="21" y1="12" x2="9" y2="12"></line>--}}
{{--                        </svg>--}}
{{--                        <span>Chiqish</span>--}}
{{--                    </a>--}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
