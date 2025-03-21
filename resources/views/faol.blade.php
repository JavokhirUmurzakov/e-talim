@extends('layouts.app')
@section('body-content')

    <div class="container">
        <div class="container align-items-center mt-5">
            <h1>Siz Faol emassiz</h1>
        </div>
        <form action="{{route('logout')}}" method="POST" style="font-size: 95px">
            @csrf
            @method('post')
            <button class="dropdown-item text-danger" type="submit"><i class="ri-shut-down-line align-middle mr-1 text-danger"></i><span>Chiqish</span></button>
        </form>
    </div>
@endsection
