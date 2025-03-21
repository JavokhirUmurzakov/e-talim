<?php

namespace App\Http\Controllers\ohtm_uquv_bulimi;

use App\Http\Controllers\Controller;
use App\Models\Dars_jadvali;
use App\Models\Dars_vaqti;
use App\Models\Fanlar;
use App\Models\Guruh;
use App\Models\Uquv_yili_ohtm;
use Illuminate\Http\Request;

class DarsJadvaliController extends Controller
{
    public function index()
    {
        // Fanlar va dars jadvali ma'lumotlarini olish
        $fanlar = Fanlar::where('ohtm_id', auth()->user()->ohtm_id)->get();
        $darsjad = Dars_jadvali::leftJoin('guruhs', 'dars_jadvalis.guruh_id', '=', 'guruhs.id')
            ->leftJoin('dars_vaqtis' , 'dars_vaqtis.id' , '=', 'dars_vaqti_id')
            ->leftJoin('dars_turis' , 'dars_turis.id' , '=', 'dars_turi_id')
            ->leftJoin('fan_uqituvchis', 'fan_uqituvchis.id', '=', 'fan_uqituvchi_id')
            ->leftJoin('fanlars', 'fan_uqituvchis.fanlar_id', '=', 'fanlars.id')
            ->leftJoin('uqituvchis', 'fan_uqituvchis.uqituvchi_id', '=', 'uqituvchis.id')
            ->leftJoin('xonalars', 'xonalars.id', '=', 'xona_id')
            ->leftJoin('uquv_yili_ohtms', 'uquv_yili_ohtm_id', '=', 'uquv_yili_ohtms.id')
            ->leftJoin('uquv_yilis', 'uquv_yilis.id', '=', 'uquv_yili_ohtms.uquv_yili_id')
            ->select(
                'sana',
                'fanlars.qs_nomi as fan_nomi',
                'mavzu',
                'guruh_id',
                'dars_vaqti_id',
                'dars_turi_id',
                'fan_uqituvchi_id',
                'xona_id',
                'uquv_yili_ohtm_id',
                'guruhs.nomi as guruh_nomi',
                'dars_vaqtis.vaqti as dars_vaqti',
                'dars_turis.nomi as dars_turi_nomi',
                'uqituvchis.fio as fan_uqituvchi_fio',
                'fan_uqituvchis.uqituvchi_id as uqituvchi_id',
                'xonalars.nomi as xona_nomi',
                'uquv_yili_ohtms.nomi as uquv_yili_ohtm_nomi',
                'uquv_yilis.nomi as uquv_yili_nomi'
            )
            ->get();
        $guruhs = Guruh::leftJoin('kurs', 'kurs.id', '=', 'kurs_id')
            ->where('kurs.ohtm_id', auth()->user()->ohtm_id)
            ->select('guruhs.id','guruhs.nomi', 'kurs.nomi as kurs_nomi')
            ->get();
        $dars_vaqtis = Dars_vaqti::all();


        $uquv_yili_ohtms = Uquv_yili_ohtm::with('uquv_yili')->where('ohtm_id', auth()->user()->ohtm_id)->get();


        return view('ohtm_uquv_bulimi.dars_jadvali', compact('darsjad','dars_vaqtis','guruhs', 'fanlar', 'uquv_yili_ohtms'));
    }

    public function create(Request $request)
    {
        // Ma'lumotlarni tekshirish
        $request->validate([
            'sana' => 'required|date',
            'fan' => 'required|integer',
            'mavzu' => 'required|integer',
            'guruh_id' => 'required|integer',
            'dars_vaqti_id' => 'required|string',
            'fan_uqtuvchi_id' => 'required|string',
            'xona_id' => 'required|string',
            'uquv_yili_ohtm_id' => 'required|string',
        ]);

        // Yangi dars jadvali qo'shish
        $darsjad = new Dars_jadvali();
        $darsjad->sana = $request->sana;
        $darsjad->fan = $request->qs_nomi;
        $darsjad->mavzu = $request->mavzu;
        $darsjad->guruh_id = $request->nomi;
        $darsjad->dars_vaqti_id = $request->dars_vaqti_id;
        $darsjad->fan_uqtuvchi_id = $request->fan_uqtuvchi_id;
        $darsjad->xona_id = $request->xona_id;
        $darsjad->uquv_yili_ohtm_id = $request->uquv_yili_ohtm_id;
        $darsjad->save();

        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }


    public function delete(Request $request)
    {
        // Dars jadvali o'chirish
        $item = Dars_jadvali::find($request->id);
        if ($item) {
            $item->delete();
            return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
        }

        return redirect()->back()->withError("Dars jadvali topilmadi!");
    }

    public function edit(Request $request, $id)
    {
        // Ma'lumotlarni tekshirish
        $request->validate([
            'sana' => 'required|date',
            'mavzu' => 'required|integer',
            'guruh_id' => 'required|integer',
            'dars_vaqti_id' => 'required|string',
            'fan_uqtuvchi_id' => 'required|string',
            'xona_id' => 'required|string',
            'uquv_yili_ohtm_id' => 'required|string',
        ]);

        // Dars jadvalini yangilash
        $darsjad = Dars_jadvali::find($id);
        if ($darsjad) {
            $darsjad->sana = $request->sana;
            $darsjad->mavzu = $request->mavzu;
            $darsjad->guruh_id = $request->guruh_id;
            $darsjad->dars_vaqti_id = $request->dars_vaqti_id;
            $darsjad->fan_uqtuvchi_id = $request->fan_uqtuvchi_id;
            $darsjad->xona_id = $request->xona_id;
            $darsjad->uquv_yili_ohtm_id = $request->uquv_yili_ohtm_id;
            $darsjad->save();

            return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
        }

        return redirect()->back()->withError("Dars jadvali topilmadi!");
    }
}
