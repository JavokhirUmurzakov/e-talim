<?php

namespace App\Http\Controllers\ohtm_tinglovchi;

use App\Http\Controllers\Controller;
use App\Models\Guruh;
use App\Models\Hujjatlar;
use App\Models\Jurnal;
use App\Models\Tinglovchi;
use App\Models\Tinglovchi_yutuqlar;
use App\Models\Uquv_yili_ohtm;
use App\Models\Yutuq_yunalish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class HomeTinglovchiController extends Controller
{
    public function index()
    {
        $guruh =Tinglovchi::leftJoin('guruhs','tinglovchis.guruh_id','=','guruhs.id')
            ->leftJoin('jurnals','jurnals.guruh_id','=','guruhs.id')
            ->leftJoin('fanlars','jurnals.fanlar_id','=','fanlars.id')
            ->leftJoin('fakultet_kafedras','tinglovchis.fakultet_kafedra_id','=','fakultet_kafedras.id')
            ->select('guruhs.id',
            'guruhs.nomi as guruh_nomi',
            'fanlars.nomi as fan_nomi',
            'tinglovchis.fio as tinglovchi_fio',
            'fakultet_kafedras.nomi as fakultet_kafedra_nomi',)
            ->where('tinglovchis.guruh_id', auth()->user()->tinglovchi->guruh_id)
//            ->where('jurnals.guruh_id',auth()->user()->tinglovchi->guruh_id)
            ->where('tinglovchis.id', auth()->user()->tinglovchi->id)
            ->where('fanlars.ohtm_id', auth()->user()->ohtm_id)
            ->where('tinglovchis.ohtm_id', auth()->user()->ohtm_id)
            ->where('tinglovchis.fakultet_kafedra_id', auth()->user()->tinglovchi->fakultet_kafedra_id)
            ->distinct()
            ->get();
//        dd($guruh);
        $guruh_l=Tinglovchi::leftJoin('guruhs','tinglovchis.guruh_id','=','guruhs.id')
            ->leftJoin('fakultet_kafedras','tinglovchis.fakultet_kafedra_id','=','fakultet_kafedras.id')
            ->leftJoin('harbiy_unvons', 'tinglovchis.harbiy_unvon_id','=','harbiy_unvons.id')
            ->select('tinglovchis.id',
                'fakultet_kafedras.nomi as fak_nomi',
                'tinglovchis.fio as tinglovchi_fio',
                'harbiy_unvons.nomi as harbiy_unvon_nomi',
                'tinglovchis.lavozim as tinglovchi_lavozim',

            )
            ->where('tinglovchis.guruh_id', auth()->user()->tinglovchi->guruh_id)
            ->where('tinglovchis.fakultet_kafedra_id', auth()->user()->tinglovchi->fakultet_kafedra_id)

            ->get();
//        dd($guruh_l);

            $yutuq_turis = Yutuq_yunalish::all();
//            dd($yutuq_turis);
            $uquv_yili_ohtm = Uquv_yili_ohtm::all();

        return view('ohtm_tinglovchi.tinglovchi_home',compact('guruh','guruh_l'));
    }


}
