<?php

namespace App\Http\Controllers\ohtm_tinglovchi;

use App\Http\Controllers\Controller;
use App\Models\Fanlar;

class OraliqTinglovchiController extends Controller
{
    public function index(){
        $oraliqlar=Fanlar::leftJoin('jurnals','fanlars.id','=','jurnals.fanlar_id')
            ->leftJoin('dars_kuns','jurnals.id','=','dars_kuns.jurnal_id')
            ->leftJoin('mavzus','dars_kuns.mavzu_id','=','mavzus.id')
            ->where(['jurnals.guruh_id'=>auth()->user()->tinglovchi->guruh_id,'jurnals.oraliq'=>true,
                'dars_kuns.ohtm_id'=>auth()->user()->ohtm_id])
            ->select(
                'fanlars.nomi as nomi',
                'dars_kuns.sana as oraliq_sana',
                'mavzus.nomi as mavzu',
            )->get();
//dd($oraliq);

        return view('ohtm_tinglovchi.tinglovchi_oraliq',compact('oraliqlar'));
    }
}
