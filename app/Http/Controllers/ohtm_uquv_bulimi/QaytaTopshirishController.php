<?php

namespace App\Http\Controllers\ohtm_uquv_bulimi;

use App\Http\Controllers\Controller;
use App\Models\Harbiy_unvon;
use App\Models\Jurnal;
use App\Models\Uqituvchi;
use App\Models\Videmost;
use Illuminate\Http\Request;

class QaytaTopshirishController extends Controller
{
    public function index(){
        $videmost=Videmost::leftJoin('jurnals', 'videmosts.jurnal_id','=','jurnals.id')
            ->leftJoin('yakuniys','jurnals.id','=','yakuniys.jurnal_id')
            ->leftJoin('fanlars', 'jurnals.fanlar_id', '=','fanlars.id')
            ->leftJoin('guruhs', 'jurnals.guruh_id', '=','guruhs.id')
            ->leftJoin('uquv_yili_ohtms', 'jurnals.uquv_yili_ohtm_id', '=','uquv_yili_ohtms.id')
            ->leftJoin('fan_uqituvchis','jurnals.id','=','fan_uqituvchis.jurnal_id')
            ->leftJoin('harbiy_unvons','videmosts.uquv_bulim_boshliq_unvon_id','=','harbiy_unvons.id')
            ->where('uquv_yili_ohtms.ohtm_id', auth()->user()->ohtm_id)
//            ->where('fan_uqituvchis.uqituvchi_id', auth()->user()->uqituvchi->id)
            ->select('videmosts.id',
                'videmosts.sana',
                'videmosts.nomer',
                'videmosts.yakuniy_oluvchi',
                'videmosts.uquv_bulim_boshliq',
                'videmosts.xulosa',
                'videmosts.faol',
                'harbiy_unvons.nomi as harbiy_unvon_nomi',
                'jurnals.id as jurnal_id',
                'fanlars.nomi as fan_nomi',
                'uquv_yili_ohtms.nomi as uqy_nomi',
                'guruhs.nomi as guruh_nomi'
            )
            ->distinct()
            ->get();


        $joriy_uqituvchi=Videmost::leftJoin('uqituvchis','videmosts.joriy_uqituvchi_id','=','uqituvchis.id')
            ->leftJoin('harbiy_unvons','uqituvchis.harbiy_unvon_id','=','harbiy_unvons.id')
            ->where(['ohtm_id'=>auth()->user()->ohtm_id]) //'fakultet_kafedra_id'=>auth()->user()->uqituvchi->fakultet_kafedra_id
            ->select(
                'uqituvchis.fio as joriy_fio',
                'harbiy_unvons.qs_nomi as unvon_qs_nomi'
            )->get()->first();

        $oraliq_uqituvchi=Videmost::leftJoin('uqituvchis','videmosts.oraliq_uqituvchi_id','=','uqituvchis.id')
            ->leftJoin('harbiy_unvons','uqituvchis.harbiy_unvon_id','=','harbiy_unvons.id')
            ->where(['ohtm_id'=>auth()->user()->ohtm_id]) //'fakultet_kafedra_id'=>auth()->user()->uqituvchi->fakultet_kafedra_id
            ->select(
                'uqituvchis.fio as oraliq_fio',
                'harbiy_unvons.qs_nomi as unvon_qs_nomi'
            )->get()->first();



        $fannomi =Jurnal::leftJoin('fanlars','jurnals.fanlar_id', '=','fanlars.id')
            ->leftJoin('guruhs','jurnals.guruh_id', '=', 'guruhs.id')
            ->leftJoin('uquv_yili_ohtms','jurnals.uquv_yili_ohtm_id','=', 'uquv_yili_ohtms.id')
            ->leftJoin('fan_uqituvchis','jurnals.id', '=', 'fan_uqituvchis.jurnal_id')
            ->where('fanlars.ohtm_id', auth()->user()->ohtm_id)
//            ->where('fan_uqituvchis.uqituvchi_id', auth()->user()->uqituvchi->id)
            ->select('jurnals.id',
                'fanlars.nomi as fan_nomi',
                'guruhs.nomi as guruh_nomi',
                'uquv_yili_ohtms.nomi  as semestr',
                'fanlars.ohtm_id as fan_ohtm_id',

            )->distinct()
            ->get();

        $nazoratchi = Uqituvchi::where(['ohtm_id'=>auth()->user()->ohtm_id, ]) //'fakultet_kafedra_id'=>auth()->user()->uqituvchi->fakultet_kafedra_id
        ->select(
            'uqituvchis.id',
            'uqituvchis.fio',
            'uqituvchis.harbiy_unvon_id'
        )
            ->get();

        $harbiy_unvon=Harbiy_unvon::all();

        $uqituvchi=Uqituvchi::where('uqituvchis.rahbar', true)->get();
//        dd($uqituvchi);
        return view('ohtm_uquv_bulimi.qayta_topshirish',compact('fannomi','videmost','harbiy_unvon','nazoratchi' ,'oraliq_uqituvchi','joriy_uqituvchi' ,'uqituvchi'));
    }
}
