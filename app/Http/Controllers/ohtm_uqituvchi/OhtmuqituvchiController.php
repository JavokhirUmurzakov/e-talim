<?php

namespace App\Http\Controllers\ohtm_uqituvchi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OhtmuqituvchiController extends Controller
{
    public function index(){
        return view('mv_admin.home');
    }
}
