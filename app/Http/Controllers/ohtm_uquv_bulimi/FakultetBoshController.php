<?php

namespace App\Http\Controllers\ohtm_uquv_bulimi;

use App\Http\Controllers\Controller;
use App\Models\Uqituvchi;
use Illuminate\Http\Request;
use App\Models\Fakultet_kafedra;

class FakultetBoshController extends Controller
{
    public function index()
    {
       // dd(auth()->user());
        $fakultetlar = Fakultet_kafedra::with('fak_kaf_turi', 'parent', 'ohtm')
            ->where('ohtm_id', auth()->user()->ohtm_id)
            ->where('fak_kaf_turi_id','3')
            ->get();
            // dd($fakultetlar);
        $kafedralar =Fakultet_kafedra::with('fak_kaf_turi', 'parent', 'ohtm', 'fanlar', 'uqituvchilar','tinglovchi')
        ->where('ohtm_id', auth()->user()->ohtm_id)
        ->where('fak_kaf_turi_id','4')
        ->get();

//        dd($uqituvchilar);


          //dd($kafedralar);
        return (view('ohtm_uquv_bulimi.fakultet_uquv_bulim', compact('fakultetlar','kafedralar')));
    }
}
