<?php

namespace App\Http\Controllers\ohtm_tinglovchi;

use App\Http\Controllers\Controller;
use App\Models\Fanlar;
use Illuminate\Http\Request;

class YakuniyTinglovchiController extends Controller
{
    public function index(){
        $yakuniylar = Fanlar::leftJoin('jurnals','fanlars.id','=','jurnals.fanlar_id')
            ->leftJoin('dars_kuns','jurnals.id','=','dars_kuns.jurnal_id')
            ->where(['jurnals.guruh_id'=>auth()->user()->tinglovchi->guruh_id,'jurnals.yakuniy'=>true,
                'dars_kuns.ohtm_id'=>auth()->user()->ohtm_id])
            ->select(
                'fanlars.nomi as nomi',
                'dars_kuns.sana as yakuniy_sana',
            )->get();
//        dd($yakuniylar);
        return view('ohtm_tinglovchi.tinglovchi_yakuniy',compact('yakuniylar'));
    }
}
