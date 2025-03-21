<?php

namespace App\Http\Controllers\ohtm_tinglovchi;

use App\Http\Controllers\Controller;
use App\Models\Dars_turi;
use App\Models\Jurnal;
use App\Models\Mavzu;
use Illuminate\Http\Request;

class MavzuController extends Controller
{
    public function index($jurnal_id)
    {
        $fanuq = Mavzu::leftJoin('jurnals', 'mavzus.jurnal_id', '=', 'jurnals.id')
            ->leftJoin('fanlars', 'jurnals.fanlar_id', '=', 'fanlars.id')
            ->leftJoin('guruhs', 'guruhs.id', '=', 'jurnals.guruh_id')
            ->leftjoin('dars_turis','mavzus.dars_turis_id', '=', 'dars_turis.id')
            ->leftJoin('uquv_yili_ohtms','jurnals.uquv_yili_ohtm_id','uquv_yili_ohtms.id')
            ->where('fanlars.ohtm_id', auth()->user()->ohtm_id)
            ->select('mavzus.id',
                'mavzus.nomi',
                'mavzus.soat',
                'mavzus.jurnal_id',
                'dars_turis.nomi as dars_turi_nomi',
                'fanlars.nomi as fan_nomi',
                'guruhs.nomi as guruh_nomi',
                'guruhs.id as guruh_id',
                'uquv_yili_ohtms.nomi  as semestr',
                'dars_turis.nomi as dars_turi_nomi'
            )
            ->where('jurnals.id', $jurnal_id)
            ->paginate(10);

//        dd($fanting);
        return view('ohtm_tinglovchi.mavzu', compact('fanuq'));
    }
}
