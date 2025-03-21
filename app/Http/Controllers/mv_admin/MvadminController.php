<?php

namespace App\Http\Controllers\mv_admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MvadminController extends Controller
{
    public function index(){
        $r = "salom dunyo";

        return view('mv_admin.home', compact('r'));
    }

}
