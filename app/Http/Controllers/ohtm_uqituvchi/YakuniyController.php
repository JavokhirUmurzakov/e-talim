<?php

namespace App\Http\Controllers\ohtm_uqituvchi;

use App\Http\Controllers\Controller;
use App\Models\Jurnal;
use App\Models\Uqituvchi;
use App\Models\Yakuniy;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class YakuniyController extends Controller
{
    public function index()
    {
        $yakuniy=Yakuniy::leftJoin('jurnals', 'yakuniys.jurnal_id','=','jurnals.id')
            ->leftJoin('fanlars', 'jurnals.fanlar_id', '=','fanlars.id')
            ->leftJoin('guruhs', 'jurnals.guruh_id', '=','guruhs.id')
            ->leftJoin('uquv_yili_ohtms', 'jurnals.uquv_yili_ohtm_id', '=','uquv_yili_ohtms.id')
            ->leftJoin('uqituvchis', 'yakuniys.uqituvchi_id', '=', 'uqituvchis.id')
            ->where('uquv_yili_ohtms.ohtm_id', auth()->user()->ohtm_id)
            ->where('yakuniys.uqituvchi_id', auth()->user()->uqituvchi->id)
            ->where('jurnals.yakuniy', true)
            ->select('yakuniys.id',
                'yakuniys.sana',
                'jurnals.id as jurnal_id',
                'fanlars.nomi as fan_nomi',
                'uquv_yili_ohtms.nomi as uqy_nomi',
                'guruhs.nomi as guruh_nomi',
                'uqituvchis.id as uqituvchi_id',
                'uqituvchis.fio as uqituvchi_fio',
            )
            ->get();
//dd($yakuniy);

        $fannomi =Jurnal::leftJoin('fanlars','jurnals.fanlar_id', '=','fanlars.id')
            ->leftJoin('guruhs','jurnals.guruh_id', '=', 'guruhs.id')
            ->leftJoin('uquv_yili_ohtms','jurnals.uquv_yili_ohtm_id','=', 'uquv_yili_ohtms.id')
            ->leftJoin('fan_uqituvchis','jurnals.id', '=', 'fan_uqituvchis.jurnal_id')
            ->where('fanlars.ohtm_id', auth()->user()->ohtm_id)
            ->where('fan_uqituvchis.uqituvchi_id', auth()->user()->uqituvchi->id)
            ->where('jurnals.yakuniy', true)
            ->select('jurnals.id',
                'fanlars.nomi as fan_nomi',
                'guruhs.nomi as guruh_nomi',
                'uquv_yili_ohtms.nomi  as semestr',
                'fanlars.ohtm_id as fan_ohtm_id',

            )->distinct()
            ->get();
//        dd($fannomi);
//        $mavzular = Mavzu::whereIn('jurnal_id', function($query) {
//            $query->select('jurnal_id')
//                ->from('mavzus')
//                ->groupBy('jurnal_id')
//                ->havingRaw('COUNT(*) > 1');
//        })->get(['id', 'nomi']);

        $uqituvchi=Uqituvchi::select('fio')
            ->where('ohtm_id', auth()->user()->ohtm_id)
            ->get();
//        dd($uqituvchi);
        return view('ohtm_uqituvchi.yakuniy', compact('fannomi','yakuniy', 'uqituvchi'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'jurnal_id' => 'required|integer',
            'sana' => 'required',
        ], [
            'sana.required'=>'Sana kiritish majburiy!',
            'jurnal_id.required' => 'Fan nomini tanlang!',

        ]);
        DB::transaction(function () use ($request) {
            $fan = new Yakuniy();
            $fan->jurnal_id = $request->jurnal_id;
            $fan->sana = $request->sana;
            $fan->ohtm_id = auth()->user()->ohtm_id;
            $fan->uqituvchi_id = auth()->user()->uqituvchi->id;
            $fan->save();
        });

        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }

    public function delete( $id)
    {
        try {
            $item = Yakuniy::find($id);
            $item->delete();
        }catch (QueryException $e){
            return redirect()->back()->withErrors("Bu yakuniy jarayonda!");
        }

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'jurnal_id' => 'required',
            'sana' => 'required',
        ], [
            'sana.required'=>'Sana kiritish majburiy!',
            'jurnal_id.required'=>'Fan nomi tanlash majburiy!',

        ]);

        DB::transaction(function () use ($request, $id) {
            $fan = Yakuniy::findOrFail($id);
            $fan->jurnal_id = $request->jurnal_id;
            $fan->sana = $request->sana;
            $fan->ohtm_id = auth()->user()->ohtm_id;
            $fan->uqituvchi_id = auth()->user()->uqituvchi->id;
            $fan->save();
        });
        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
}
