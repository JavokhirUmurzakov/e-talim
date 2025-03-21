<?php

namespace App\Http\Controllers\ohtm_uqituvchi;

use App\Http\Controllers\Controller;
use App\Models\Dars_kun;
use App\Models\Jurnal;
use App\Models\Mavzu;
use App\Models\Nazorat_turi;
use App\Models\Uqituvchi;
use App\Models\Yakuniy;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OraliqController extends Controller
{
    public function index()
    {
        $dars_kun=Dars_kun::leftJoin('jurnals', 'dars_kuns.jurnal_id','=','jurnals.id')
            ->leftJoin('fanlars', 'jurnals.fanlar_id', '=','fanlars.id')
            ->leftJoin('guruhs', 'jurnals.guruh_id', '=','guruhs.id')
            ->leftJoin('uquv_yili_ohtms', 'jurnals.uquv_yili_ohtm_id', '=','uquv_yili_ohtms.id')
            ->leftJoin('nazorat_turis', 'dars_kuns.nazorat_turi_id','=','nazorat_turis.id')
            ->where('nazorat_turis.id', 1)
            ->leftJoin('mavzus', 'dars_kuns.mavzu_id','=','mavzus.id')
            ->leftJoin('uqituvchis', 'dars_kuns.uqituvchi_id', '=', 'uqituvchis.id')
            ->where('uquv_yili_ohtms.ohtm_id', auth()->user()->ohtm_id)
            ->where('dars_kuns.uqituvchi_id', auth()->user()->uqituvchi->id)
            ->select('dars_kuns.id',
                'dars_kuns.sana',
                'jurnals.id as jurnal_id',
                'fanlars.nomi as fan_nomi',
                'uquv_yili_ohtms.nomi as uqy_nomi',
                'guruhs.nomi as guruh_nomi',
                'nazorat_turis.id as  nazorat_tur_id',
                'nazorat_turis.nazorat as nazorat',
                'mavzus.nomi as mavzu_nomi',
                'uqituvchis.id as uqituvchi_id',
                'uqituvchis.fio as uqituvchi_fio'
            )

            ->get();
//dd($dars_kun);

        $fannomi =Jurnal::leftJoin('fanlars','jurnals.fanlar_id', '=','fanlars.id')
            ->leftJoin('guruhs','jurnals.guruh_id', '=', 'guruhs.id')
            ->leftJoin('fan_uqituvchis','jurnals.id', '=', 'fan_uqituvchis.jurnal_id')
            ->leftJoin('dars_turis','fan_uqituvchis.dars_turi_id', '=', 'dars_turis.id')
            ->leftJoin('uquv_yili_ohtms','jurnals.uquv_yili_ohtm_id','=', 'uquv_yili_ohtms.id')
            ->where('fanlars.ohtm_id', auth()->user()->ohtm_id)
            ->where('fan_uqituvchis.uqituvchi_id', auth()->user()->uqituvchi->id)
            ->whereColumn('fan_uqituvchis.jurnal_id', 'jurnals.id')
            ->where('fanlars.fakultet_kafedra_id' , auth()->user()->uqituvchi->fakultet_kafedra_id)
            ->where('jurnals.oraliq', true)
            ->select('jurnals.id',
                'fanlars.nomi as fan_nomi',
                'guruhs.nomi as guruh_nomi',
                'uquv_yili_ohtms.nomi  as semestr',
                'fanlars.ohtm_id as fan_ohtm_id',
//                'dars_turis.nomi as dars_turi',
            )->distinct()
            ->get();
//        dd($fannomi);
        $nazorat_turi=Nazorat_turi::select('id', 'nazorat')->where('id', 1)->get();
//        dd($nazorat_turi);

        $mavzular = Mavzu::leftJoin('fan_uqituvchis', 'mavzus.jurnal_id','=','fan_uqituvchis.jurnal_id')
            ->where(['fan_uqituvchis.uqituvchi_id'=>auth()->user()->uqituvchi->id,'used'=>(bool)false])
            ->distinct()
//            ->whereIn('jurnal_id', function($query) {
//            $query->select('mavzus.jurnal_id')
//                ->from('mavzus')
//                ->groupBy('mavzus.jurnal_id');
//                ->havingRaw('COUNT(*) >1');
//        })
            ->get(['mavzus.id', 'mavzus.nomi as mavzu_nomi']);
//        dd($mavzular);
//        $mavzular = Mavzu::whereIn('jurnal_id', function($query) {
//            $query->select('jurnal_id')
//                ->from('mavzus')
//                ->groupBy('jurnal_id')
//                ->havingRaw('COUNT(*) > 1');
//        })->pluck('nomi', 'id')->toArray();
////        dd($mavzular);
        $uqituvchi=Uqituvchi::select('id','fio')
            ->where('ohtm_id', auth()->user()->ohtm_id)
            ->get();
//        dd($uqituvchi);
        return view('ohtm_uqituvchi.oraliq', compact('fannomi','mavzular','dars_kun', 'nazorat_turi','mavzular', 'uqituvchi'));
    }

    public function create(Request $request)
    {
//        dd(auth()->user());
        $request->validate([
            'jurnal_id' => 'required|integer',
            'sana' => 'required',
            'mavzu_id' => 'required|integer',
        ],[
            'sana.required'=>'Sana kiritish majburiy!',
            'jurnal_id.required' => 'Fan nomini tanlang!',
            'mavzu_id.required'=>'Mavzu tanlash majburiy!',

        ]);
        DB::transaction(function () use ($request) {
            $fan = new Dars_kun();
            $fan->jurnal_id = $request->jurnal_id;
            $fan->sana = $request->sana;
            $fan->nazorat_turi_id = 1;
            $fan->ohtm_id = auth()->user()->ohtm_id;
            $fan->mavzu_id = $request->mavzu_id;
            $fan->uqituvchi_id = auth()->user()->uqituvchi->id;
//                dd($fan);
            $fan->save();
        });



//        DB::transaction(function () use ($request) {
//            $fan = new Dars_kun();
//            $fan->jurnal_id = $request->jurnal_id;
//            $fan->sana = $request->sana;
//            $fan->nazorat_turi_id = 1;
//            $fan->ohtm_id = auth()->user()->ohtm_id;
//            $fan->mavzu_id = $request->mavzu_id;
//            $fan->uqituvchi_id =auth()->user()->uqituvchi_->id;
//            $fan->save();
//        });

        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }

    public function delete( $id)
    {
        try {
            $item = Dars_kun::find($id);
            $item->delete();
        }catch (QueryException $e){
            return redirect()->back()->withErrors("Bu oraliq jarayonda!");
        }


        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'jurnal_id' => 'required',
            'sana' => 'required',
            'mavzu_id' => 'required',
        ], [
            'sana.required'=>'Sana kiritish majburiy!',
            'jurnal_id.required'=>'Fan nomi tanlash majburiy!',
            'mavzu_id.required'=>'Mavzu tanlash majburiy!',

        ]);

        DB::transaction(function () use ($request, $id) {
            $fan = Dars_kun::findOrFail($id);
            $fan->jurnal_id = $request->jurnal_id;
            $fan->sana = $request->sana;
            $fan->nazorat_turi_id = 1;
            $fan->ohtm_id = auth()->user()->ohtm_id;
            $fan->mavzu_id = $request->mavzu_id;
            $fan->uqituvchi_id = auth()->user()->uqituvchi->id;
            $fan->save();
        });

        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }

}
