<?php

namespace App\Http\Controllers\ohtm_uqituvchi;

use App\Http\Controllers\Controller;
use App\Models\Tinglovchi;
use Illuminate\Http\Request;

class TinglovchiGuruhController extends Controller
{
    public function index( $guruh_id)
    {
        $tinglovchi = Tinglovchi::where('tinglovchis.guruh_id', $guruh_id)
            ->leftJoin('tinglovchi_shax_mals','tinglovchi_shax_mals.tinglovchi_id','=','tinglovchis.id')
            ->leftJoin('harbiy_unvons','tinglovchis.harbiy_unvon_id','=','harbiy_unvons.id')
            ->leftJoin('fakultet_kafedras','tinglovchis.fakultet_kafedra_id','=','fakultet_kafedras.id')
            ->where('tinglovchis.ohtm_id', auth()->user()->ohtm_id)
            ->select('tinglovchis.id as tinglovchi_id',
                'tinglovchis.fio',
                'tinglovchis.rasm',
                'harbiy_unvons.nomi as unvon_nomi',
                'tinglovchi_shax_mals.tugilgan_sana',
                'fakultet_kafedras.nomi as kaf_nomi'
            )
            ->get();
//        dd($tinglovchi);
        return view('ohtm_uqituvchi.guruh_tinglovchi', compact('tinglovchi'));

    }
}
