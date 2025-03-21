<?php
namespace App\Http\Controllers\ohtm_tinglovchi;
use App\Http\Controllers\Controller;
use App\Models\Fanlar;
use App\Models\Jurnal;
use App\Models\Tinglovchi;
use Illuminate\Http\Request;

class TinglovchiFanController extends Controller
{
    public function index()
    {
        $fanlar = Fanlar::leftJoin('jurnals', 'jurnals.fanlar_id', '=' , 'fanlars.id')
            ->leftJoin('guruhs', 'guruhs.id', '=', 'jurnals.guruh_id')
            ->where('fanlars.ohtm_id', auth()->user()->ohtm_id)
            ->where('jurnals.guruh_id', auth()->user()->tinglovchi->guruh_id)
            ->select(
                'fanlars.id',
                'fanlars.nomi',
                'fanlars.qs_nomi',
            )->distinct()
            ->get();
        return view('ohtm_tinglovchi.fanlar',compact('fanlar'));
    }

  public function jurnal($jurnal_id)
    {
        $jurnal=Jurnal::leftJoin('fanlars' , 'jurnals.fanlar_id' , '=', 'fanlars.id')
            ->leftJoin('uquv_yili_ohtms' , 'jurnals.uquv_yili_ohtm_id' , '=' , 'uquv_yili_ohtms.id')
            ->leftJoin('guruhs' , 'guruhs.id' , '=' , 'jurnals.guruh_id')
            ->leftJoin('fan_uqituvchis','jurnals.id' , '=' , 'fan_uqituvchis.jurnal_id')
            ->leftJoin('uqituvchis','fan_uqituvchis.uqituvchi_id' , '=' , 'uqituvchis.id')
            ->leftJoin('harbiy_unvons','uqituvchis.harbiy_unvon_id' , '=' , 'harbiy_unvons.id')
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
                'uqituvchis.fio',
                'harbiy_unvons.nomi as harbiy_unvon_nomi',
//                'tinglovchi.nomi as tinglov_nomi',
            )
            ->where('fanlars.ohtm_id', auth()->user()->ohtm_id)
            ->where('jurnals.guruh_id', auth()->user()->tinglovchi->guruh_id)
            ->where('jurnals.fanlar_id' , $jurnal_id)
            ->distinct()
            ->get();
//        dd($jurnal);
        return view('ohtm_tinglovchi.tinglovchi_fan_jurnal', compact('jurnal'));
    }
}
