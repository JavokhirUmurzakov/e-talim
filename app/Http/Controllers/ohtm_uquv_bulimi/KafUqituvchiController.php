<?php

namespace App\Http\Controllers\ohtm_uquv_bulimi;

use App\Http\Controllers\Controller;
use App\Models\Uqituvchi;
use Illuminate\Http\Request;

class KafUqituvchiController extends Controller
{
    public function index($kafedra_id){

        $uqituvchi=Uqituvchi::leftJoin('ilmiy_unvons','uqituvchis.ilmiy_unvon_id','=','ilmiy_unvons.id')
            ->leftJoin('ilmiy_darajas','uqituvchis.ilmiy_daraja_id','=','ilmiy_darajas.id')
            ->leftJoin('harbiy_unvons','uqituvchis.harbiy_unvon_id','=','harbiy_unvons.id')
            ->leftJoin('uqituvchi_shax_mals','uqituvchi_shax_mals.uqituvchi_id','=','uqituvchis.id')
            ->leftJoin('fakultet_kafedras','uqituvchis.fakultet_kafedra_id','=','fakultet_kafedras.id')
            ->where('uqituvchis.fakultet_kafedra_id', $kafedra_id)
            ->select('uqituvchis.id',
                'uqituvchis.fio',
                'uqituvchis.mutaxassisligi',
                'harbiy_unvons.nomi as unvon_nomi',
                'uqituvchi_shax_mals.tugilgan_sana',
                'fakultet_kafedras.nomi as kaf_nomi',
                'ilmiy_darajas.nomi as ilmiy_daraja_nomi',
                'ilmiy_unvons.nomi as ilmiy_unvon_nomi'

            )
            ->get();
        return view('ohtm_uquv_bulimi.kaf_uqituvchi', compact('uqituvchi'));
    }
}
