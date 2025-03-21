<?php

namespace App\Http\Controllers\ohtm_fakkafboshliq;

use App\Http\Controllers\Controller;
use App\Models\Fanlar;
use App\Models\Jurnal;

class IntoFanlarController extends Controller
{
    public function index($fan_id)
    {
        $fanlar=Fanlar::where('fanlars.id', $fan_id)
            ->leftJoin('jurnals' , 'fanlars.id' , '=', 'jurnals.fanlar_id')
            ->leftJoin('uquv_yili_ohtms' , 'jurnals.uquv_yili_ohtm_id' , '=' , 'uquv_yili_ohtms.id')
            ->leftJoin('guruhs' , 'jurnals.guruh_id' , '=' , 'guruhs.id')
            ->leftJoin('fan_uqituvchis' , 'jurnals.id' , '=' , 'fan_uqituvchis.jurnal_id')
            ->leftJoin('uqituvchis' , 'fan_uqituvchis.uqituvchi_id' , '=' , 'uqituvchis.id')
            ->leftJoin('harbiy_unvons' , 'uqituvchis.harbiy_unvon_id' , '=' , 'harbiy_unvons.id')
            ->select(
                'fanlars.id',
                'fanlars.nomi',
                'fanlars.qs_nomi',
                'jurnals.oraliq as jurnal_oraliq',
                'jurnals.id as jurnal_id',
                'jurnals.yakuniy as jurnal_yakuniy',
                'jurnals.maruza as jurnal_maruza',
                'jurnals.amaliy as jurnal_amaliy',
                'uquv_yili_ohtms.nomi as uquv_yili_nomi',
                'guruhs.nomi as guruh_nomi',
                'uqituvchis.fio as uqituvchi_fio',
                'harbiy_unvons.nomi as harbiy_unvon_nomi'

            )
            ->where('fanlars.ohtm_id', auth()->user()->ohtm_id)
            ->where('fanlars.fakultet_kafedra_id' ,auth()->user()->uqituvchi->fakultet_kafedra_id)
            ->where('uqituvchis.id', auth()->user()->uqituvchi->id)
            ->where('jurnals.fanlar_id' , $fan_id)
            ->distinct()
//            ->where('fanlars.fakultet_kafedra_id' ,auth()->user()->fanlar->fakultet_kafedra_id)
            ->get();
//        $jurnal=Jurnal::where('fanlar_id',$fan_id)->get();
//        dd($fanlar);
//        dd(auth()->user());
        return view('ohtm_fakkafboshliq.into_fanlar',compact('fanlar'));
    }
}
