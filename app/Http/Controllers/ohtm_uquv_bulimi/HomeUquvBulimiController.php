<?php

namespace App\Http\Controllers\ohtm_uquv_bulimi;

use App\Http\Controllers\Controller;
use App\Models\Fakultet_kafedra;
use App\Models\Fanlar;
use App\Models\Guruh;
use App\Models\Ohtm;
use App\Models\Tinglovchi;
use App\Models\Uqituvchi;
use App\Models\Yunalishlar;
use Illuminate\Http\Request;

class HomeUquvBulimiController extends Controller
{
    public function index()
    {

        $fak_kaf = Fakultet_kafedra::leftJoin('fak_kaf_turis', 'fakultet_kafedras.fak_kaf_turi_id', '=', 'fak_kaf_turis.id')
            ->select(
                'fakultet_kafedras.id',
                'fakultet_kafedras.fak_kaf_turi_id',
                'fakultet_kafedras.nomi as fak_kaf_nomi'
            )
            ->where('fakultet_kafedras.fak_kaf_turi_id', 4)
            ->where('ohtm_id', auth()->user()->ohtm_id)
            ->get();

        $fak_kaf_soni=$fak_kaf->count();

        $fan=Fanlar::where('ohtm_id', auth()->user()->ohtm_id)->count();

            //muammo bolishi mumkin
        $tinglovchi=Tinglovchi::where('ohtm_id', auth()->user()->ohtm_id)->count();
        //muammo bolishi mumkin
        $guruh=Guruh::leftJoin('fakultet_kafedras','guruhs.fakultet_kafedra_id','=','fakultet_kafedras.id')
            ->where('fakultet_kafedras.ohtm_id', auth()->user()->ohtm_id)->count();

        $yunalish=Yunalishlar::where('ohtm_id', auth()->user()->ohtm_id)->count();

        $uqituvchi_u=Uqituvchi::where('uqituvchis.ohtm_id', auth()->user()->ohtm_id)->count();


        $uqituvchi=Uqituvchi::leftJoin('fakultet_kafedras' ,'uqituvchis.fakultet_kafedra_id','=','fakultet_kafedras.id')
            ->leftJoin('harbiy_unvons' ,'uqituvchis.harbiy_unvon_id','=','harbiy_unvons.id')
            ->leftJoin('uqituvchi_shax_mals','uqituvchis.id','=','uqituvchi_shax_mals.uqituvchi_id')
            ->leftJoin('ilmiy_unvons','uqituvchis.ilmiy_unvon_id','=','ilmiy_unvons.id')
            ->leftJoin('ilmiy_darajas','uqituvchis.ilmiy_daraja_id','=','ilmiy_darajas.id')
            ->select(
                'uqituvchis.fio',
                'uqituvchis.mutaxassisligi',
                'harbiy_unvons.nomi as harbiy_unvon_nomi',
                'ilmiy_unvons.id as ilm_unv_id',
                'ilmiy_unvons.nomi as ilmiy_unvon_nomi',
                'uqituvchi_shax_mals.tugilgan_sana as tugilgan_sana',
                'fakultet_kafedras.nomi as fak_kaf_nomi',
                'ilmiy_darajas.id as ilm_dar_id'
            )
            ->where('uqituvchis.ohtm_id', auth()->user()->ohtm_id)
            ->where('uqituvchis.rahbar', true)
            ->get();
//        dd($uqituvchi);

        $uqituvchi_is=Uqituvchi::leftJoin('ilmiy_unvons','uqituvchis.ilmiy_unvon_id','=','ilmiy_unvons.id')
            ->leftJoin('ilmiy_darajas','uqituvchis.ilmiy_daraja_id','=','ilmiy_darajas.id')
            ->select( 'uqituvchis.id',
                'uqituvchis.fio',
                'ilmiy_unvons.id as ilm_unv_id',
                'ilmiy_unvons.nomi as ilmiy_unvon_nomi',
                'ilmiy_darajas.id as ilm_dar_id'
            )
            ->where('uqituvchis.ohtm_id', auth()->user()->ohtm_id)
            ->where(function ($query) {
                $query->where('ilmiy_unvons.id', '!=', 1)
                    ->orWhere('ilmiy_darajas.id', '!=', 1);
            })
            ->count();


        $umumiy=(int)(($uqituvchi_is / $uqituvchi_u)*100);

        return view('ohtm_uquv_bulimi.uquv_bulimi_home', compact('fak_kaf_soni','fak_kaf','fan',
            'yunalish','uqituvchi_u','uqituvchi','tinglovchi','guruh','uqituvchi_is','umumiy'));

    }
}
