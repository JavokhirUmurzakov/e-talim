<?php

namespace App\Http\Controllers;

use App\Models\Fan_uqituvchi;
use App\Models\Fanlar;
use App\Models\Uqituvchi;
use App\Models\Uquv_yili_ohtm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FanUqituvchiController extends Controller
{
    public function index()
    {
        $fanuq = Fan_uqituvchi::leftJoin('uqituvchis', 'fan_uqituvchis.uqituvchi_id', '=', 'uqituvchis.id')
            ->join('ohtms', 'uqituvchis.ohtm_id', '=', 'ohtms.id')
            ->leftJoin('fanlars', 'fan_uqituvchis.fanlar_id', '=', 'fanlars.id')
            ->leftJoin('uquv_yili_ohtms', 'fan_uqituvchis.uquv_yili_ohtm_id', '=', 'uquv_yili_ohtms.id')

            ->select(
                'fan_uqituvchis.uqituvchi_id',
                'uqituvchis.fio as uqituvchi_fio',
                'ohtms.nomi as ohtm_nomi',
                'uquv_yili_ohtms.nomi',
                'fanlars.nomi as qs_nomi',
                'fan_uqituvchis.soat',
                'fan_uqituvchis.maruza',
                'fan_uqituvchis.amaliy',
                'fan_uqituvchis.oraliq',
                'fan_uqituvchis.yakuniy',
                'fan_uqituvchis.koef',
                'fan_uqituvchis.faol'
            )
            ->paginate(10);

        $uqituvchis = Uqituvchi::leftjoin('ohtms', 'uqituvchis.ohtm_id', '=', 'ohtms.id')
            ->select('fio')
            ->get();
//        dd($uqituvchis);

        $fans = Fanlar::leftjoin('ohtms', 'fanlars.ohtm_id', '=', 'ohtms.id')
            ->select('fanlars.nomi as fan_nomi')
            ->get();
//
        $uquv_yili_ohtms = Uquv_yili_ohtm::leftJoin('ohtms', 'uquv_yili_ohtms.ohtm_id', '=', 'ohtms.id')
//        ->where('ohtm_id', auth()->user()->ohtm_id)
            ->select('uquv_yili_ohtms.nomi as semestr')
            ->get();


        return view('mv_admin.fan_uqituvchi', compact('fanuq','uqituvchis','fans', 'uquv_yili_ohtms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'uqituvchi_id' => 'required|integer',
            'qs_nomi' => 'required',

            'soat' => 'required',
            'maruza' => 'required',
            'amaliy' => 'required',
            'koef' => 'required',
        ]);

        DB::transaction(function () use ($request) {
            Fan_uqituvchi::create([
                'uqituvchi_id' => $request->uqituvchi_id,
                'fanlar_id' => $request->qs_nomi,
                'uquv_yili_ohtm_id' => $request->ohtm_nomi,
                'soat' => $request->soat,
                'maruza' => $request->maruza,
                'amaliy' => $request->amaliy,
                'oraliq' => $request->oraliq,
                'yakuniy' => $request->yakuniy,
                'koef' => $request->koef,
                'faol' => $request->faol,
            ]);
        });

        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }

    public function destroy($id)
    {
        $fanuq = Fan_uqituvchi::find($id);

        if (!$fanuq) {
            return redirect()->back()->with('error', 'Fan uqituvchi topilmadi!');
        }

        $fanuq->delete();
        return redirect()->back()->withSuccess("Ma'lumot o'chirildi");
    }

    public function edit($id)
    {
        $fanuq = Fan_uqituvchi::findOrFail($id);
        return view('mv_admin.fan_uqituvchi_edit', compact('fanuq'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'uqituvchi_id' => 'required|integer',
            'qs_nomi' => 'required|integer',
            'soat' => 'required',
            'maruza' => 'required',
            'amaliy' => 'required',
            'oraliq' => 'required',
            'yakuniy' => 'required',
            'koef' => 'required',
        ]);

        $fanuq = Fan_uqituvchi::findOrFail($id);

        DB::transaction(function () use ($request, $fanuq) {
            $fanuq->update([
                'uqituvchi_id' => $request->uqituvchi_id,
                'fanlar_id' => $request->qs_nomi,
                'uquv_yili_ohtm_id' => $request->ohtm_nomi,
                'soat' => $request->soat,
                'maruza' => $request->maruza,
                'amaliy' => $request->amaliy,
                'oraliq' => $request->oraliq,
                'yakuniy' => $request->yakuniy,
                'koef' => $request->koef,
                'faol' => $request->faol,
            ]);
        });

        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
}
