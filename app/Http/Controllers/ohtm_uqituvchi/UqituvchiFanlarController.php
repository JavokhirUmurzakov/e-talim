<?php

namespace App\Http\Controllers\ohtm_uqituvchi;

use App\Http\Controllers\Controller;
use App\Models\Fanlar;
use App\Models\Uqituvchi;
use Illuminate\Http\Request;

class UqituvchiFanlarController extends Controller
{
    public function index()
    {
//            $fanlars = Fanlar::with('jurnals')->get();



        $fanlar=Fanlar::leftJoin('jurnals', 'jurnals.fanlar_id', '=' , 'fanlars.id')
            ->leftJoin('fan_uqituvchis', 'jurnals.id', '=', 'fan_uqituvchis.jurnal_id')
            ->where('fanlars.ohtm_id', auth()->user()->ohtm_id)
            ->where('fan_uqituvchis.uqituvchi_id', auth()->user()->uqituvchi->id)
            ->where('fanlars.fakultet_kafedra_id', auth()->user()->uqituvchi->fakultet_kafedra_id)
            ->select(
                'fanlars.id',
                'fanlars.nomi',
                'fanlars.qs_nomi',
            )->distinct()
            ->get();

        return view('ohtm_uqituvchi.fanlar',compact('fanlar'));
    }

    public function jurnal($jurnal_id)
    {
        $fanlar=Fanlar::leftJoin('jurnals' , 'fanlars.id' , '=', 'jurnals.fanlar_id')
            ->leftJoin('uquv_yili_ohtms' , 'jurnals.uquv_yili_ohtm_id' , '=' , 'uquv_yili_ohtms.id')
            ->leftJoin('guruhs' , 'jurnals.guruh_id' , '=' , 'guruhs.id')
            ->leftJoin('fan_uqituvchis' , 'jurnals.id' , '=' , 'fan_uqituvchis.jurnal_id')
            ->leftJoin('uqituvchis' , 'fan_uqituvchis.uqituvchi_id' , '=' , 'uqituvchis.id')
            ->leftJoin('harbiy_unvons' , 'uqituvchis.harbiy_unvon_id' , '=' , 'harbiy_unvons.id')
            ->select(
                'jurnals.id as jurnal_id',
                'fanlars.nomi',
                'fanlars.qs_nomi',
                'jurnals.oraliq as jurnal_oraliq',
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
            ->where('jurnals.fanlar_id' , $jurnal_id)
            ->where('fan_uqituvchis.uqituvchi_id', auth()->user()->uqituvchi->id)
//            ->where('fanlars.fakultet_kafedra_id' ,auth()->user()->fanlar->fakultet_kafedra_id)
            ->distinct()
            ->get();
        return view('ohtm_uqituvchi.fan_jurnal', compact('fanlar'));

    }
}
