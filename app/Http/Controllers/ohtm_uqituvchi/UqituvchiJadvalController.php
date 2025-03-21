<?php

namespace App\Http\Controllers\ohtm_uqituvchi;

use App\Http\Controllers\Controller;
use App\Models\Jadval_exel;
use Illuminate\Http\Request;

class UqituvchiJadvalController extends Controller
{
    public function index(){

        $jadval = Jadval_exel::where('ohtm_id', auth()->user()->ohtm_id)
            ->select('id', 'nomi', 'file', 'sana')
            ->get();


        return view("ohtm_uqituvchi.uqituvchi_jadval_exel",compact('jadval'));
    }
}
