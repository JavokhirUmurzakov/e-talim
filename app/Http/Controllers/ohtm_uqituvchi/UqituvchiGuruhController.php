<?php

namespace App\Http\Controllers\ohtm_uqituvchi;

use App\Http\Controllers\Controller;
use App\Models\Fan_uqituvchi;
use App\Models\Guruh;
use Illuminate\Http\Request;

class UqituvchiGuruhController extends Controller
{
    public function index(){

        $guruhlar=Fan_uqituvchi::leftJoin('jurnals','fan_uqituvchis.jurnal_id','=','jurnals.id')
            ->leftJoin('guruhs','jurnals.guruh_id','=','guruhs.id')
            ->leftJoin('uqituvchis','fan_uqituvchis.uqituvchi_id','=','uqituvchis.id')
            ->leftJoin('fanlars','jurnals.fanlar_id','fanlars.id')
            ->where('uqituvchis.id', auth()->user()->uqituvchi->id)
//            ->where('jurnals.id', auth()->user()->uqituvchi->id)
            ->where('uqituvchis.ohtm_id', auth()->user()->ohtm_id)
            ->select('guruhs.id',
                'guruhs.nomi as gur_nomi')
            ->distinct()
            ->get();
//        dd($guruhlar);
        return view('ohtm_uqituvchi.uqituvchi_guruh', compact('guruhlar'));
    }
}
