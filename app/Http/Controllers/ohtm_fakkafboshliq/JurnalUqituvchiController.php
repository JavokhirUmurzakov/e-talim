<?php

namespace App\Http\Controllers\ohtm_fakkafboshliq;

use App\Http\Controllers\Controller;
use App\Models\Fanlar;
use App\Models\Guruh;
use App\Models\Jurnal;
use App\Models\Uquv_yili_ohtm;
use Couchbase\QueryErrorException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JurnalUqituvchiController extends Controller
{
//    public function index()
//    {
//        $fanuq = Jurnal::leftJoin('fanlars', 'jurnals.fanlar_id', '=', 'fanlars.id')
//            ->leftJoin('uquv_yili_ohtms', 'jurnals.uquv_yili_ohtm_id', '=', 'uquv_yili_ohtms.id')
//            ->leftJoin('guruhs', 'guruhs.id', '=', 'jurnals.guruh_id')
//            ->select('jurnals.id',
//                'uquv_yili_ohtms.nomi',
//                'fanlars.nomi as fanlar_id',
//                'jurnals.soat',
//                'jurnals.maruza',
//                'jurnals.amaliy',
//                'jurnals.oraliq',
//                'jurnals.yakuniy',
//                'guruhs.nomi as guruh_nomi',
//                'guruhs.id as guruh_id'
//            )
//            ->paginate(10);
//
//        $fans = Fanlar::where('ohtm_id', auth()->user()->ohtm_id)
//            ->get();
//        $uquv_yili_ohtms = Uquv_yili_ohtm::where('ohtm_id', auth()->user()->ohtm_id)
//            ->get();
//        $guruhs = Guruh::leftJoin('kurs', 'kurs_id', '=', 'kurs.id')
//            ->where('kurs.ohtm_id', auth()->user()->ohtm_id)
//            ->select(
//                'guruhs.id',
//                'guruhs.nomi',
//                'boshliq_fio',
//            )
//            ->get();
////        dd($fanuq);
//        return view('ohtm_fakkafboshliq.jurnal', compact('fanuq', 'fans', 'uquv_yili_ohtms', 'guruhs'));
//    }

    public function index()
    {
        $fanuq = Jurnal::leftJoin('fanlars', 'jurnals.fanlar_id', '=', 'fanlars.id')
            ->leftJoin('uquv_yili_ohtms', 'jurnals.uquv_yili_ohtm_id', '=', 'uquv_yili_ohtms.id')
            ->leftJoin('guruhs', 'guruhs.id', '=', 'jurnals.guruh_id')
            ->select('jurnals.id',
                'uquv_yili_ohtms.nomi',
                'fanlars.nomi as fanlar_id',
                'jurnals.soat',
                'jurnals.maruza',
                'jurnals.amaliy',
                'jurnals.oraliq',
                'jurnals.yakuniy',
                'guruhs.nomi as guruh_nomi',
                'guruhs.id as guruh_id'
            )
            ->where('fanlars.ohtm_id', auth()->user()->ohtm_id)
            ->where('fanlars.fakultet_kafedra_id', auth()->user()->uqituvchi->fakultet_kafedra_id)
            ->paginate(10);

//        dd($fanuq);
        $fans = Fanlar::where(['ohtm_id'=>auth()->user()->ohtm_id, 'fakultet_kafedra_id'=>auth()->user()->uqituvchi->fakultet_kafedra_id])
            ->get();
        $uquv_yili_ohtms = Uquv_yili_ohtm::where('ohtm_id', auth()->user()->ohtm_id)
            ->select('uquv_yili_ohtms.id',
                'uquv_yili_ohtms.nomi')
            ->get();
        $guruhs = Guruh::leftJoin('kurs_bosqiches', 'kurs_bosqiches_id', '=', 'kurs_bosqiches.id')
            ->leftJoin('yunalishlars', 'yunalishlars.id', '=', 'guruhs.yunalish_id')
            ->where('yunalishlars.ohtm_id', auth()->user()->ohtm_id)
            ->select(
                'guruhs.id',
                'guruhs.nomi as guruh_nomi',
            )
            ->get();
//        dd($guruhs);
        return view('ohtm_uqituvchi.jurnal', compact('fanuq', 'fans', 'uquv_yili_ohtms', 'guruhs'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'fanlar_id' => 'required|integer',
            'soat' => 'required',
            'maruza' => 'required',
            'amaliy' => 'required',
            'uquv_yili_ohtm_id' => 'required|integer',
            'guruh_id' => 'required|integer',
        ], [
            'fanlar_id.required'=>'Fanlar tanlash majburiy!',
            'soat.required'=>'Soat kiritish majburiy!',
            'maruza.required'=>'Maruza kiritish majburiy!',
            'amaliy.required'=>'Amaliy kiritish majburiy!',
            'uquv_yili_ohtm_id.required'=>'O`quv yili kiritish majburiy!',
            'guruh_id.required'=>'O`quv yili kiritish majburiy!',

        ]);
        DB::transaction(function () use ($request) {
            $fan = new Jurnal();
            $fan->fanlar_id = $request->fanlar_id;
            $fan->uquv_yili_ohtm_id = $request->uquv_yili_ohtm_id;
            $fan->soat = $request->soat;
            $fan->maruza = $request->maruza;
            $fan->amaliy = $request->amaliy;
            $fan->oraliq = $request->oraliq == "on" ? true : false;
            $fan->yakuniy = $request->yakuniy == "on" ? true : false;
            $fan->guruh_id =$request->guruh_id;
            $fan->save();
        });


        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }

    public function delete( $id)
    {

        try {
            $item = Jurnal::find($id);
            $item->delete();
        }catch (QueryException $e){
            return redirect()->back()->withErrors("Bu jurnal jarayonda");
        }

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $id)
    {

        $request->validate([
            'fanlar_id' => 'required',
            'soat' => 'required',
            'maruza' => 'required',
            'amaliy' => 'required',
            'uquv_yili_ohtm_id' => 'required',
            'guruh_id' => 'required|integer',
        ],[
            'fanlar_id.required'=>'Fanlar tanlash majburiy!',
            'soat.required'=>'Soat kiritish majburiy!',
            'maruza.required'=>'Maruza kiritish majburiy!',
            'amaliy.required'=>'Amaliy kiritish majburiy!',
            'uquv_yili_ohtm_id.required'=>'O`quv yili kiritish majburiy!',
            'guruh_id' => 'required|integer',
        ]);


        $fan = Jurnal::find($id);
        $fan->fanlar_id = $request->fanlar_id;
        $fan->uquv_yili_ohtm_id = $request->uquv_yili_ohtm_id;
        $fan->soat = $request->soat;
        $fan->maruza = $request->maruza;
        $fan->amaliy = $request->amaliy;
        $fan->oraliq = $request->oraliq == "on" ? true : false;
        $fan->yakuniy = $request->yakuniy == "on" ? true : false;
        $fan->guruh_id =$request->guruh_id;
        $fan->save();

        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
}
