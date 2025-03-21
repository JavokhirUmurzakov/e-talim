<?php

namespace App\Http\Controllers\ohtm_uqituvchi;

use App\Http\Controllers\Controller;
use App\Models\Dars_turi;
use App\Models\Jurnal;
use App\Models\Mavzu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MavzukiritUqituvchiController extends Controller
{
    public function index()
    {
        $fanuq = Mavzu::leftJoin('jurnals', 'mavzus.jurnal_id', '=', 'jurnals.id')
            ->leftJoin('fanlars', 'jurnals.fanlar_id', '=', 'fanlars.id')
            ->leftJoin('guruhs', 'guruhs.id', '=', 'jurnals.guruh_id')
            ->leftjoin('dars_turis','mavzus.dars_turis_id', '=', 'dars_turis.id')
            ->leftJoin('uquv_yili_ohtms','jurnals.uquv_yili_ohtm_id','uquv_yili_ohtms.id')
            ->leftJoin('fan_uqituvchis','jurnals.id','fan_uqituvchis.jurnal_id')
            ->where('fanlars.ohtm_id', auth()->user()->ohtm_id)
            ->where('fan_uqituvchis.uqituvchi_id', auth()->user()->uqituvchi->id)
            ->select('mavzus.id',
                'mavzus.nomi',
                'mavzus.soat',
                'mavzus.jurnal_id',
                'dars_turis.nomi as dars_turi_nomi',
                'fanlars.nomi as fan_nomi',
                'guruhs.nomi as guruh_nomi',
                'guruhs.id as guruh_id',
                'uquv_yili_ohtms.nomi  as semestr',
                'dars_turis.nomi as dars_turi_nomi'
            )
            ->paginate(10);
        $fannomi =Jurnal::leftJoin('fanlars','jurnals.fanlar_id', '=','fanlars.id')
            ->leftJoin('guruhs','jurnals.guruh_id', '=', 'guruhs.id')
            ->leftJoin('fan_uqituvchis','jurnals.id','fan_uqituvchis.jurnal_id')
            ->leftJoin('uquv_yili_ohtms','jurnals.uquv_yili_ohtm_id','=', 'uquv_yili_ohtms.id')
            ->where('fanlars.ohtm_id', auth()->user()->ohtm_id)
            ->where('fan_uqituvchis.uqituvchi_id', auth()->user()->uqituvchi->id)
            ->select('jurnals.id',
                'fanlars.nomi as fan_nomi',
                'guruhs.nomi as guruh_nomi',
                'uquv_yili_ohtms.nomi  as semestr'
            )->distinct()
            ->get();
        $dars_turis = Dars_turi::select(
            'id',
            'nomi as dars_turi_nomi')
            ->get();
//        dd($fanuq);
        return view('ohtm_uqituvchi.mavzu_kiritish', compact('fanuq', 'fannomi', 'dars_turis'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'nomi' => 'required',
            'soat' => 'required',
            'jurnal_id' => 'required',
            'dars_turis_id' => 'required',
        ], [
            'nomi.required'=>'Mavzu kiritish majburiy!',
            'soat.required'=>'Soat kiritish majburiy!',
            'jurnal_id.required'=>'Nomlarni tanlash majburiy!',
            'dars_turi_id.required'=>'Dars turi kiritish majburiy!',

        ]);
        DB::transaction(function () use ($request) {
            $fan = new Mavzu();
            $fan->nomi = $request->nomi;
            $fan->soat = $request->soat;
            $fan->jurnal_id = $request->jurnal_id;
            $fan->dars_turis_id = $request->dars_turis_id;
            $fan->save();
        });

        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }

    public function delete( $id)
    {

        $item = Mavzu::find($id);
        $item->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $id)
    {

        $request->validate([
            'nomi' => 'required',
            'soat' => 'required',
            'jurnal_id' => 'required',
        ], [
            'nomi.required'=>'Mavzu kiritish majburiy!',
            'soat.required'=>'Soat kiritish majburiy!',
            'jurnal_id.required'=>'Nomlarni tanlash majburiy!',
        ]);
        $fan = Mavzu::find($id);
        $fan->nomi = $request->nomi;
        $fan->soat = $request->soat;
        $fan->jurnal_id = $request->jurnal_id;
        $fan->dars_turis_id = $request->dars_turis_id;
        $fan->save();

        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
}
