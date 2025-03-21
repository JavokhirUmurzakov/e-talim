<?php

namespace App\Http\Controllers\ohtm_fakkafboshliq;

use App\Http\Controllers\Controller;
use App\Models\Uqituvchi_shax_mal;
use App\Models\Uqituvchi_yutuqlar;
use App\Models\Uquv_yili_ohtm;
use App\Models\Yutuq_yunalish;

class IntoUqituvchiController extends Controller
{
    public function index($id)
    {

        $uqituvchi=Uqituvchi_shax_mal::leftJoin('uqituvchis', 'uqituvchi_shax_mals.uqituvchi_id' , '=' , 'uqituvchis.id')
            ->leftJoin('harbiy_unvons' , 'uqituvchis.harbiy_unvon_id' ,'=' ,'harbiy_unvons.id')
            ->leftJoin('ilmiy_unvons' , 'uqituvchis.ilmiy_unvon_id' ,'=' ,'ilmiy_unvons.id')
            ->leftJoin('ilmiy_darajas' , 'uqituvchis.ilmiy_daraja_id' ,'=' ,'ilmiy_darajas.id')

            ->select(
                'uqituvchis.rasm as uqituvchi_rasm',
                'uqituvchis.fio as uqituvchi_fio',
                'harbiy_unvons.nomi as harbiy_unvon_nomi',
                'uqituvchi_shax_mals.fuqarolik',
                'uqituvchi_shax_mals.pass_raqami',
                'uqituvchi_shax_mals.jshshir_kod',
                'uqituvchi_shax_mals.uy_manzili',
                'uqituvchi_shax_mals.haqida',
                'uqituvchi_shax_mals.tugilgan_sana',
                'ilmiy_unvons.qs_nomi as ilmiy_unvon_qs_nomi',
                'ilmiy_darajas.qs_nomi as ilmiy_daraja_qs_nomi',

            )
            ->where('uqituvchis.id', $id)
            ->get();

        $fanlar= Uqituvchi_shax_mal::leftJoin('uqituvchis', 'uqituvchi_shax_mals.uqituvchi_id' , '=' , 'uqituvchis.id')
            ->leftJoin('fan_uqituvchis' , 'uqituvchis.id' ,'=' ,'fan_uqituvchis.uqituvchi_id')
            ->leftJoin('jurnals' , 'fan_uqituvchis.jurnal_id' ,'=' ,'jurnals.id')
            ->leftJoin('fanlars' , 'jurnals.fanlar_id' ,'=' ,'fanlars.id')
            ->select(
                'fanlars.nomi as fanlar_nomi',
            )
            ->where('uqituvchis.id', $id)
            ->get();
//        dd($id);

        $yutuq_turis = Yutuq_yunalish::all();
//            dd($yutuq_turis);
        $uquv_yili_ohtm = Uquv_yili_ohtm::all();
        $yutuq = Uqituvchi_yutuqlar::where('uqituvchi_id', auth()->user()->uqituvchi->id)
            ->get();
//        dd($yutuq);

        return view('ohtm_fakkafboshliq.into_uqituvchi' , compact('uqituvchi' , 'fanlar','yutuq'));
    }
}
