<?php

namespace App\Http\Controllers\ohtm_uquv_bulimi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fakultet_kafedra;
class KafedraBoshController extends Controller
{
    public function index($kafedra_id)
    {
        $fakkafedra= Fakultet_kafedra::with('fak_kaf_turi', 'parent', 'ohtm', 'fanlar', 'uqituvchilar','tinglovchi')
        ->where('ohtm_id', auth()->user()->ohtm_id)
        ->where('fak_kaf_turi_id','4')
        ->where('parent_id',$kafedra_id )
        ->get();

        return view('ohtm_uquv_bulimi.kaf_uquv_bulimi', compact('fakkafedra'));
    }
}
