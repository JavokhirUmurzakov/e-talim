<?php

namespace App\Http\Controllers\ohtm_fakkafboshliq;

use App\Http\Controllers\Controller;
use App\Models\Dars_turi;
use App\Models\Fan_uqituvchi;
use App\Models\Jurnal;
use App\Models\Uqituvchi;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FanBiriktirishController extends Controller
{
    public function index()
    {

        $fanuq = Fan_uqituvchi::leftJoin('uqituvchis', 'fan_uqituvchis.uqituvchi_id', '=', 'uqituvchis.id')
            ->leftjoin('ohtms', 'uqituvchis.ohtm_id', '=', 'ohtms.id')
            ->leftJoin('jurnals', 'fan_uqituvchis.jurnal_id', '=', 'jurnals.id')
            ->leftJoin('fanlars','jurnals.fanlar_id', '=', 'fanlars.id' )
            ->leftJoin('guruhs','jurnals.guruh_id', '=', 'guruhs.id')
            ->leftJoin('uquv_yili_ohtms','jurnals.uquv_yili_ohtm_id','uquv_yili_ohtms.id')
            ->leftJoin('dars_turis', 'fan_uqituvchis.dars_turi_id', '=', 'dars_turis.id')
            ->where('fanlars.ohtm_id', auth()->user()->ohtm_id)
            ->where('uqituvchis.fakultet_kafedra_id', auth()->user()->uqituvchi->fakultet_kafedra_id)
            ->select(
                'fan_uqituvchis.id as id',
                'fan_uqituvchis.uqituvchi_id',
                'uqituvchis.fio as uqituvchi_fio',
                'ohtms.id as ohtm_id',
                'dars_turis.nomi as dars_turi_nomi',
                'fan_uqituvchis.soat',
                'fanlars.nomi as fan_nomi',
                'guruhs.nomi as guruh_nomi',
                'uquv_yili_ohtms.nomi  as semestr',
            )
            ->paginate(10);
        $uqituvchis = Uqituvchi::where(['ohtm_id'=>auth()->user()->ohtm_id, 'fakultet_kafedra_id'=>auth()->user()->uqituvchi->fakultet_kafedra_id])
            ->get();
//        dd($uqituvchis);
//
        $fannomi =Jurnal::leftJoin('fanlars','jurnals.fanlar_id', '=','fanlars.id')
            ->leftJoin('guruhs','jurnals.guruh_id', '=', 'guruhs.id')
            ->leftJoin('uquv_yili_ohtms','jurnals.uquv_yili_ohtm_id','=', 'uquv_yili_ohtms.id')
            ->where('fanlars.ohtm_id', auth()->user()->ohtm_id)
            ->where('fanlars.fakultet_kafedra_id', auth()->user()->uqituvchi->fakultet_kafedra_id)

            ->select('jurnals.id',
                'fanlars.nomi as fan_nomi',
                'guruhs.nomi as guruh_nomi',
                'uquv_yili_ohtms.nomi  as semestr'

            )
            ->get();
        $dars_turi = Dars_turi::all();
        return view('ohtm_fakkafboshliq.fanbiriktirish', compact('fanuq', 'uqituvchis', 'fannomi', 'dars_turi'));
    }
//dd($request->all());
    public function create(Request $request)
    {
        $request->validate([
            'uqituvchi_id' => 'required|integer',
            'jurnal_id' => 'required',
            'soat' => 'required',
            'dars_turi_id' => 'required|integer',
        ], [
            'uqituvchi_id.required' => 'O`qituvchi tanlash majburiy!',
            'jurnal_id.required'=>'Fanlar tanlash majburiy!',
            'soat.required'=>'Soat kiritish majburiy!',
            'dars_turi_id.required'=>'O`quv yili kiritish majburiy!',
        ]);
        DB::transaction(function () use ($request) {
            $fan = new Fan_uqituvchi();
            $fan->uqituvchi_id = $request->uqituvchi_id;
            $fan->jurnal_id = $request->jurnal_id;
            $fan->dars_turi_id = $request->dars_turi_id;
            $fan->soat = $request->soat;
            $fan->save();
        });

        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }

    public function delete( $id)
    {
        try {
            $item = Fan_uqituvchi::find($id);
            $item->delete();
        }catch (QueryException $e){
            return redirect()->back()->withErrors("Bu jurnal jarayonda");
        }



        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $id)
    {

        $request->validate([
            'uqituvchi_id' => 'required|integer',
            'jurnal_id' => 'required|integer',
        ], [
            'uqituvchi_id.required' => 'O`qituvchi tanlash majburiy!',
            'jurnal_id.required'=>'Fanlar tanlash majburiy!',
        ]);


        $fan = Fan_uqituvchi::find($id);
        $fan->uqituvchi_id = $request->uqituvchi_id;
        $fan->jurnal_id = $request->jurnal_id;
        $fan->dars_turi_id = $request->dars_turi_id;
        $fan->save();
        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
}
