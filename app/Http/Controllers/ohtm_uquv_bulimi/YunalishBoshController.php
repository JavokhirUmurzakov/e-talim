<?php

namespace App\Http\Controllers\ohtm_uquv_bulimi;

use App\Http\Controllers\Controller;
use App\Models\Yunalishlar;
use Illuminate\Http\Request;

class YunalishBoshController extends Controller
{
    public function index()
    {

        $yunalishlar=Yunalishlar::where('ohtm_id', auth()->user()->ohtm_id)->get();

        return view('ohtm_uquv_bulimi.yunalish_uquv_bulimi', compact('yunalishlar'));
    }
}
