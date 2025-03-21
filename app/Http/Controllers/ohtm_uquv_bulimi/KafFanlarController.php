<?php

namespace App\Http\Controllers\ohtm_uquv_bulimi;

use App\Http\Controllers\Controller;
use App\Models\Fanlar;
use Illuminate\Http\Request;

class KafFanlarController extends Controller
{
    public function index($kafedra_id){

        $fanlar=Fanlar::where('fanlars.fakultet_kafedra_id', $kafedra_id)
            ->leftJoin('fakultet_kafedras','fanlars.fakultet_kafedra_id','=','fakultet_kafedras.id')
            ->where('fanlars.ohtm_id', auth()->user()->ohtm_id)
            ->select('fanlars.id',
                'fanlars.nomi as fan_nomi',
                'fanlars.qs_nomi',
                'fanlars.kod',
                'fanlars.faol',
                'fakultet_kafedras.nomi as kaf_nomi'
            )
            ->get();
        return view('ohtm_uquv_bulimi.kaf_fanlar', compact('fanlar'));
    }
}
