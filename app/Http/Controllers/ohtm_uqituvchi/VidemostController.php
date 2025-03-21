<?php

namespace App\Http\Controllers\ohtm_uqituvchi;

use App\Http\Controllers\Controller;

use App\Models\Baho;
use App\Models\Dars_turi;
use App\Models\Fan_uqituvchi;
use App\Models\Guruh;
use App\Models\Harbiy_unvon;
use App\Models\Jurnal;
use App\Models\Mavzu;
use App\Models\Tinglovchi;
use App\Models\Uqituvchi;
use App\Models\Videmost;
use App\Models\VidemostBaho;
use App\Models\Yakuniy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VidemostController extends Controller
{

    public function index()
    {

        $videmost = Videmost::leftJoin('jurnals', 'videmosts.jurnal_id', '=', 'jurnals.id')
            ->leftJoin('yakuniys', 'jurnals.id', '=', 'yakuniys.jurnal_id')
            ->leftJoin('fanlars', 'jurnals.fanlar_id', '=', 'fanlars.id')
            ->leftJoin('guruhs', 'jurnals.guruh_id', '=', 'guruhs.id')
            ->leftJoin('uquv_yili_ohtms', 'jurnals.uquv_yili_ohtm_id', '=', 'uquv_yili_ohtms.id')
            ->leftJoin('fan_uqituvchis', 'jurnals.id', '=', 'fan_uqituvchis.jurnal_id')
            ->leftJoin('harbiy_unvons', 'videmosts.uquv_bulim_boshliq_unvon_id', '=', 'harbiy_unvons.id')
            ->where('uquv_yili_ohtms.ohtm_id', auth()->user()->ohtm_id)
//            ->where('fan_uqituvchis.uqituvchi_id', auth()->user()->uqituvchi->id)
            ->select('videmosts.id',
                'videmosts.sana',
                'videmosts.nomer',
                'videmosts.yakuniy_oluvchi',
                'videmosts.uquv_bulim_boshliq',
                'videmosts.xulosa',
                'videmosts.faol',
                'harbiy_unvons.nomi as harbiy_unvon_nomi',
                'jurnals.id as jurnal_id',
                'fanlars.nomi as fan_nomi',
                'uquv_yili_ohtms.nomi as uqy_nomi',
                'guruhs.nomi as guruh_nomi'
            )
            ->distinct()
            ->get();



        $joriy_uqituvchi = Videmost::leftJoin('uqituvchis', 'videmosts.joriy_uqituvchi_id', '=', 'uqituvchis.id')
            ->leftJoin('harbiy_unvons', 'uqituvchis.harbiy_unvon_id', '=', 'harbiy_unvons.id')
            ->where(['ohtm_id' => auth()->user()->ohtm_id, 'fakultet_kafedra_id' => auth()->user()->uqituvchi->fakultet_kafedra_id])
            ->select(
                'uqituvchis.fio as joriy_fio',
                'harbiy_unvons.qs_nomi as unvon_qs_nomi'
            )->get()->first();


        $oraliq_uqituvchi = Videmost::leftJoin('uqituvchis', 'videmosts.oraliq_uqituvchi_id', '=', 'uqituvchis.id')
            ->leftJoin('harbiy_unvons', 'uqituvchis.harbiy_unvon_id', '=', 'harbiy_unvons.id')
            ->where(['ohtm_id' => auth()->user()->ohtm_id, 'fakultet_kafedra_id' => auth()->user()->uqituvchi->fakultet_kafedra_id])
            ->select(
                'uqituvchis.fio as oraliq_fio',
                'harbiy_unvons.qs_nomi as unvon_qs_nomi'
            )->get()->first();


        $fannomi = Jurnal::leftJoin('fanlars', 'jurnals.fanlar_id', '=', 'fanlars.id')
            ->leftJoin('guruhs', 'jurnals.guruh_id', '=', 'guruhs.id')
            ->leftJoin('uquv_yili_ohtms', 'jurnals.uquv_yili_ohtm_id', '=', 'uquv_yili_ohtms.id')
            ->leftJoin('fan_uqituvchis', 'jurnals.id', '=', 'fan_uqituvchis.jurnal_id')
            ->where('fanlars.ohtm_id', auth()->user()->ohtm_id)
//            ->where('fan_uqituvchis.uqituvchi_id', auth()->user()->uqituvchi->id)
            ->select('jurnals.id',
                'fanlars.nomi as fan_nomi',
                'guruhs.nomi as guruh_nomi',
                'uquv_yili_ohtms.nomi  as semestr',
                'fanlars.ohtm_id as fan_ohtm_id',

            )->distinct()
            ->get();


        $nazoratchi = Uqituvchi::where(['ohtm_id' => auth()->user()->ohtm_id, 'fakultet_kafedra_id' => auth()->user()->uqituvchi->fakultet_kafedra_id])
            ->select(
                'uqituvchis.id',
                'uqituvchis.fio',
                'uqituvchis.harbiy_unvon_id'
            )
            ->get();

        $harbiy_unvon = Harbiy_unvon::all();

        return view('ohtm_uqituvchi.videmost', compact('fannomi', 'videmost', 'harbiy_unvon', 'nazoratchi', 'oraliq_uqituvchi', 'joriy_uqituvchi'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'jurnal_id' => 'required|integer',
            'sana' => 'required|date',
            'nomer' => 'required',
            'joriy_uqituvchi' => 'required',
            'oraliq_uqituvchi' => 'required',
            'yakuniy_oluvchi' => 'required',
            'uquv_bulim_boshliq_unvon_id' => 'required|integer',
            'uquv_bulim_boshliq' => 'required',
            'xulosa' => 'required',
        ], [
            'sana.required' => 'Sana kiritish majburiy!',
            'jurnal_id.required' => 'Fan nomini tanlang!',
            'nomer.required' => 'Qaydnoma raqamini kiritish majburiy!',
            'joriy_uqituvchi.required' => 'Joriy nazorat oluvchini kiritish majburiy!',
            'yakuniy_oluvchi.required' => 'Yakuniy nazorat oluvchini kiritish majburiy!',
            'oraliq_uqituvchi.required' => 'Oraliq nazorat oluvchini kiritish majburiy!',
            'uquv_bulim_boshliq_unvon_id.required' => 'Harbiy unvon nomini tanlang!',
            'uquv_bulim_boshliq.required' => 'Uquv bo\'lim boshlig\'ini kiritish majburiy!',
            'xulosa.required' => 'Xulosa kiritish majburiy!',

        ]);

        $jami = Tinglovchi::leftJoin('guruhs', 'guruhs.id', '=', 'tinglovchis.guruh_id')
            ->where('tinglovchis.ohtm_id', auth()->user()->ohtm_id)
            ->select(
                'tinglovchis.id',
                'tinglovchis.fio'

            )->count();
        $jurnal_id = $request->jurnal_id;
        $data = Videmost::joriyBaho($jurnal_id);


        DB::transaction(function () use ($jami, $data, $request) {
            $fan = new Videmost();
            $fan->jurnal_id = $request->jurnal_id;
            $fan->sana = $request->sana;
            $fan->nomer = $request->nomer;
            $fan->joriy_uqituvchi_id = $request->joriy_uqituvchi;
            $fan->oraliq_uqituvchi_id = $request->oraliq_uqituvchi;
            $fan->yakuniy_oluvchi = $request->yakuniy_oluvchi;
            $fan->uquv_bulim_boshliq_unvon_id = $request->uquv_bulim_boshliq_unvon_id;
            $fan->uquv_bulim_boshliq = $request->uquv_bulim_boshliq;
            $fan->jami_tinglovchi = $jami;
            $fan->alo = $data['five'];
            $fan->yaxshi = $data['four'];
            $fan->qoniqarli = $data['three'];
            $fan->qoniqarsiz = $data['two'];
            $fan->baholanmagan = 0;
            $fan->xulosa = $request->xulosa;
            $fan->save();


            if ($fan->save()) {
                $videmost = $fan->save();
                foreach ($data['kursants'] as $kur) {
                    VidemostBaho::create([
                        'videmost_id' => $videmost->id,
                        'tinglovchi_id' => $kur->id,
                        'joriy' => $kur->joriy_bahos,
                        'oraliq' => $kur->oraliq_bahos,
                        'yakuniy' => $kur->yakuniy_bahos,
                        'umumiy' => $kur->total_bahos,
                        'baho' => $kur->total_mark
                    ]);
                }
            }

        });


        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }

    public function delete($id)
    {

        $item = Yakuniy::find($id);
        $item->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'jurnal_id' => 'required|integer',
            'sana' => 'required|date',
            'nomer' => 'required',
            'joriy_uqituvchi' => 'required',
            'oraliq_uqituvchi' => 'required',
            'yakuniy_oluvchi' => 'required',
            'uquv_bulim_boshliq_unvon_id' => 'required|integer',
            'uquv_bulim_boshliq' => 'required',
            'xulosa' => 'required',
        ], [
            'sana.required' => 'Sana kiritish majburiy!',
            'jurnal_id.required' => 'Fan nomini tanlang!',
            'nomer.required' => 'Qaydnoma raqamini kiritish majburiy!',
            'joriy_uqituvchi.required' => 'Joriy nazorat oluvchini kiritish majburiy!',
            'yakuniy_oluvchi.required' => 'Yakuniy nazorat oluvchini kiritish majburiy!',
            'oraliq_uqituvchi.required' => 'Oraliq nazorat oluvchini kiritish majburiy!',
            'uquv_bulim_boshliq_unvon_id.required' => 'Harbiy unvon nomini tanlang!',
            'uquv_bulim_boshliq.required' => 'Uquv bo\'lim boshlig\'ini kiritish majburiy!',
            'xulosa.required' => 'Xulosa kiritish majburiy!',

        ]);

        $jami = Tinglovchi::leftJoin('guruhs', 'guruhs.id', '=', 'tinglovchis.guruh_id')
            ->where('tinglovchis.ohtm_id', auth()->user()->ohtm_id)
            ->select(
                'tinglovchis.id',
                'tinglovchis.fio'

            )->count();
        $jurnal_id = $request->jurnal_id;
        $data = Videmost::joriyBaho($jurnal_id);

        DB::transaction(function () use ($jami, $data, $request, $id) {
            $fan = Yakuniy::findOrFail($id);
            $fan->jurnal_id = $request->jurnal_id;
            $fan->sana = $request->sana;
            $fan->nomer = $request->nomer;
            $fan->joriy_uqituvchi_id = $request->joriy_uqituvchi;
            $fan->oraliq_uqituvchi_id = $request->oraliq_uqituvchi;
            $fan->yakuniy_oluvchi = $request->yakuniy_oluvchi;
            $fan->uquv_bulim_boshliq_unvon_id = $request->uquv_bulim_boshliq_unvon_id;
            $fan->uquv_bulim_boshliq = $request->uquv_bulim_boshliq;
            $fan->jami_tinglovchi = $jami;
            $fan->alo = $data['five'];
            $fan->yaxshi = $data['four'];
            $fan->qoniqarli = $data['three'];
            $fan->qoniqarsiz = $data['two'];
            $fan->baholanmagan = 0;
            $fan->xulosa = $request->xulosa;
            $fan->save();

            if ($fan->save()) {
                $videmost = $fan->save();
                foreach ($data['kursants'] as $kur) {
                    VidemostBaho::update([
                        'videmost_id' => $videmost->id,
                        'tinglovchi_id' => $kur->id,
                        'joriy' => $kur->joriy_bahos,
                        'oraliq' => $kur->oraliq_bahos,
                        'yakuniy' => $kur->yakuniy_bahos,
                        'umumiy' => $kur->total_bahos,
                        'baho' => $kur->total_mark
                    ]);
                }
            }
        });

        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
}
