<?php

namespace App\Http\Controllers\ohtm_boshliq;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OhtmboshliqController extends Controller
{
    public function index(){
        return view('mv_admin.home');
    }
}
