<?php

namespace App\Http\Controllers\ohtm_tinglovchi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OhtmTinglovchiController extends Controller
{
    public function index(){
        return view('mv_admin.home');
    }
}
