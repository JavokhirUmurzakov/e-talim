<?php

namespace App\Http\Controllers\ohtm_fakkafboshliq;

use App\Http\Controllers\Controller;
use App\Models\Jurnal;
use App\Models\Nashr_turi;
use App\Models\Uqituvchi;
use App\Models\Uquv_yili;
use App\Models\YillikReja;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class YillikRejaController extends Controller
{
    public function index()
    {
        // dd(auth()->user()->uqituvchi->fakultet_kafedra_id);
        $fak_kaf_id=(auth()->user()->uqituvchi->fakultet_kafedra_id);

        $yillik_reja=YillikReja::leftjoin('uqituvchis', 'yillik_rejas.uqituvchi_id', '=', 'uqituvchis.id')
                               ->leftjoin('nashr_turis', 'yillik_rejas.nashr_tur_id', '=', 'nashr_turis.id')
                               ->leftjoin('uquv_yilis', 'yillik_rejas.uquv_yili_id', '=', 'uquv_yilis.id')
                               ->select('uqituvchis.fio as uqituvchi_fio',
                                        'nashr_turis.nomi as nashr_nomi',
                                        'uquv_yilis.nomi as uquv_yili',
                                        'yillik_rejas.*'
                                        )
                                ->paginate(10);

        //  dd($yillik_reja);
        $uqituvchi = Uqituvchi::where(['ohtm_id'=>auth()->user()->ohtm_id, 'fakultet_kafedra_id'=>auth()->user()->uqituvchi->fakultet_kafedra_id])
            ->get();
        $nashrlar=Nashr_turi::all();

        $yillar=Uquv_yili::all();
        return view('ohtm_uqituvchi.reja', compact('yillik_reja', 'fak_kaf_id','uqituvchi','nashrlar','yillar'));
//         $fanuq = Jurnal::leftJoin('fanlars', 'jurnals.fanlar_id', '=', 'fanlars.id')
//             ->leftJoin('uquv_yili_ohtms', 'jurnals.uquv_yili_ohtm_id', '=', 'uquv_yili_ohtms.id')
//             ->leftJoin('guruhs', 'guruhs.id', '=', 'jurnals.guruh_id')
//             ->select('jurnals.id',
//                 'uquv_yili_ohtms.nomi',
//                 'fanlars.nomi as fanlar_id',
//                 'jurnals.soat',
//                 'jurnals.maruza',
//                 'jurnals.amaliy',
//                 'jurnals.oraliq',
//                 'jurnals.yakuniy',
//                 'guruhs.nomi as guruh_nomi',
//                 'guruhs.id as guruh_id'
//             )
//             ->paginate(10);

//         $fans = Fanlar::where('ohtm_id', auth()->user()->ohtm_id)
//             ->get();
//         $uquv_yili_ohtms = Uquv_yili_ohtm::where('ohtm_id', auth()->user()->ohtm_id)
//             ->select('uquv_yili_ohtms.id',
//             'uquv_yili_ohtms.nomi')
//             ->get();
//         $guruhs = Guruh::leftJoin('kurs', 'kurs_id', '=', 'kurs.id')
//             ->where('kurs.ohtm_id', auth()->user()->ohtm_id)
//             ->select(
//                 'guruhs.id',
//                 'guruhs.nomi as guruh_nomi',
//             )
//             ->get();
// //        dd($fanuq);
//         return view('ohtm_uqituvchi.jurnal', compact('fanuq', 'fans', 'uquv_yili_ohtms', 'guruhs'));
     }

     public function create(Request $request)
    {
        $request->validate([
            'uqituvchi_fio' => 'required|integer',
            'nashr_nomi' => 'required|integer ',
            'soni' => 'required|integer',
            'uquv_yili' => 'required',
            'haqida' => 'required',
        ], [
            'uqituvchi_fio' => 'O`qituvchini tanlash majburiy!',
            'nashr_nomi' => 'Nashr turini tanlash majburiy!',
            'soni' => 'Sonini tanlash majburiy',
            'uquv_yili' => 'O`quv yilini tanlash majburiy!',
            'haqida' => 'Izoh yozish majburiy',
        ]);
        DB::transaction(function () use ($request) {
            $reja = new YillikReja();
            $reja->uqituvchi_id = $request->uqituvchi_fio;
            $reja->nashr_tur_id = $request->nashr_nomi;
            $reja->soni = $request->soni;
            $reja->uquv_yili_id = $request->uquv_yili;
            $reja->haqida = $request->haqida;
            $reja->fak_kaf_id = $request->fak_kaf_id;
            $reja->save();
        });


         return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
     }

     public function delete( $id)
    {

        try {
            $reja_id=YillikReja::find($id);
            $reja_id->delete();
        }catch (QueryException $e){
            return redirect()->back()->withErrors("Hozir jarayonda");
        }


        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'uqituvchi_fio' => 'required|integer',
            'nashr_nomi' => 'required|integer ',
            'soni' => 'required|integer',
            'uquv_yili' => 'required',
            'haqida' => 'required',
        ], [
            'uqituvchi_fio' => 'O`qituvchini tanlash majburiy!',
            'nashr_nomi' => 'Nashr turini tanlash majburiy!',
            'soni' => 'Sonini tanlash majburiy',
            'uquv_yili' => 'O`quv yilini tanlash majburiy!',
            'haqida' => 'Izoh yozish majburiy',
        ]);

        $reja = YillikReja::find($id);
        $reja->uqituvchi_id = $request->uqituvchi_fio;
        $reja->nashr_tur_id = $request->nashr_nomi;
        $reja->soni = $request->soni;
        $reja->uquv_yili_id = $request->uquv_yili;
        $reja->haqida = $request->haqida;
        $reja->fak_kaf_id = auth()->user()->uqituvchi->fakultet_kafedra_id;
        $reja->save();

        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
}
