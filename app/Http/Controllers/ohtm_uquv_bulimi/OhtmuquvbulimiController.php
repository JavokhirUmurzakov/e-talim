<?php

namespace App\Http\Controllers\ohtm_uquv_bulimi;

use App\Http\Controllers\Controller;
use App\Models\Ohtm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OhtmuquvbulimiController extends Controller
{
    public function index(){

        $ohtm = Ohtm::where('id', auth()->user()->ohtm_id)->first();
        Session::put('ohtm', $ohtm);
        return view('ohtm_uquv_bulimi.home');
    }
}
