<?php

namespace App\Http\Controllers\ohtm_uquv_bulimi;

use App\Http\Controllers\Controller;
use App\Models\Fan_uqituvchi;
use App\Models\Fanlar;
use App\Models\Guruh;
use App\Models\Jurnal;
use App\Models\Kurs;
use App\Models\Kurs_bosqich;
use App\Models\Til;
use App\Models\Uqituvchi;
use App\Models\Uquv_yili_ohtm;
use App\Models\Yunalishlar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuruhController extends Controller
{

    public function index()
    {

        // $fanuq = Jurnal::leftJoin('fanlars', 'jurnals.fanlar_id', '=', 'fanlars.id')
        //     ->leftJoin('uquv_yili_ohtms', 'jurnals.uquv_yili_ohtm_id', '=', 'uquv_yili_ohtms.id')
        //     ->leftJoin('guruhs', 'guruhs.id', '=', 'jurnals.guruh_id')
        //     ->select('jurnals.id',
        //         'uquv_yili_ohtms.nomi',
        //         'fanlars.nomi as fanlar_id',
        //         'jurnals.soat',
        //         'jurnals.maruza',
        //         'jurnals.amaliy',
        //         'jurnals.oraliq',
        //         'jurnals.yakuniy',
        //         'guruhs.nomi as guruh_nomi',
        //         'guruhs.id as guruh_id'
        //     )
        //     ->paginate(10);
            $guruh=Guruh::leftjoin('tils', 'guruhs.til_id', '=', 'tils.id')
            ->leftjoin('kurs_bosqiches', 'guruhs.kurs_bosqiches_id', '=', 'kurs_bosqiches.id')
            ->leftjoin('yunalishlars', 'guruhs.yunalish_id', '=', 'yunalishlars.id')
            ->where('yunalishlars.ohtm_id', auth()->user()->ohtm_id)
            ->select('guruhs.id',
                      'guruhs.nomi',
                      'guruhs.boshliq_fio',
                      'guruhs.holat',
                      'tils.nomi as til_nomi',
                      'tils.id as til_id',
                      'kurs_bosqiches.nomi as kurs_nomi',
                      'kurs_bosqiches.id as kurs_id',
                      'yunalishlars.nomi as yunalish_nomi')
            ->paginate(10);


//         $fans = Fanlar::where('ohtm_id', auth()->user()->ohtm_id)
//             ->get();
//         $uquv_yili_ohtms = Uquv_yili_ohtm::where('ohtm_id', auth()->user()->ohtm_id)
//             ->get();
//         $guruhs = Guruh::leftJoin('kurs', 'kurs_id', '=', 'kurs.id')
//             ->where('kurs.ohtm_id', auth()->user()->ohtm_id)
//             ->select(
//                 'guruhs.id',
//                 'guruhs.nomi',
//                 'boshliq_fio',
//             )
//             ->get();
// //        dd($fanuq);

            $til=Til::all();
            $kurs=Kurs_bosqich::all();

            $yunalish=Yunalishlar::where('ohtm_id', auth()->user()->ohtm_id)->get();

        return view('ohtm_uquv_bulimi.guruh', compact( 'guruh', 'til','kurs', 'yunalish'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'guruh_nomi' => 'required',
            'fio' => 'required',
            'til' => 'required|integer',
            'kurs' => 'required|integer',
            'yunalish' => 'required',
        ], [
            'guruh_nomi.required'=>'Guruh nomi kiritish majburiy!',
            'fio.required'=>'Boshliq FIO kiritish majburiy!',
            'til.required'=>'Tilni tanlash majburiy!',
            'til.integer'=>'Til integer bulishi kerak',
            'kurs.required'=>'Kursni tanlash majburiy!',
            'yunalish.required'=>'Yunalishni tanlash majburiy!',

        ]);
        DB::transaction(function () use ($request) {
            // $fan = new Jurnal();
            // $fan->fanlar_id = $request->fanlar_id;
            // $fan->uquv_yili_ohtm_id = $request->uquv_yili_ohtm_id;
            // $fan->soat = $request->soat;
            // $fan->maruza = $request->maruza;
            // $fan->amaliy = $request->amaliy;
            // $fan->oraliq = $request->oraliq == "on" ? true : false;
            // $fan->yakuniy = $request->yakuniy == "on" ? true : false;
            // $fan->guruh_id =$request->guruh_id;
            // $fan->save();
            $gur=new Guruh();
            $gur->nomi=$request->guruh_nomi;
            $gur->boshliq_fio=$request->fio;
            $gur->holat=$request->holat;
            $gur->til_id=$request->til;
            $gur->kurs_bosqiches_id=$request->kurs;
            $gur->yunalish_id=$request->yunalish;
            $gur->save();
        });


        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }

    public function delete( $id)
    {

        $item = Guruh::find($id);
        $item->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'guruh_nomi' => 'required',
            'fio' => 'required',
            'til' => 'required',
            'kurs_nomi' => 'required',
            'yunalish_nomi'=>'required',

        ], [
            'guruh_nomi.required'=>'Guruh nomi kiritish majburiy!',
            'fio.required'=>'Boshliq FIO kiritish majburiy!',
            'til.required'=>'Tilni tanlash majburiy!',
            'kurs_nomi.required'=>'Kursni tanlash majburiy!',
            'yunalish_nomi.required'=>'Yunalishni tanlash majburiy!',
        ]);


        // $fan = Jurnal::find($id);
        // $fan->fanlar_id = $request->fanlar_id;
        // $fan->uquv_yili_ohtm_id = $request->uquv_yili_ohtm_id;
        // $fan->soat = $request->soat;
        // $fan->maruza = $request->maruza;
        // $fan->amaliy = $request->amaliy;
        // $fan->oraliq = $request->oraliq == "on" ? true : false;
        // $fan->yakuniy = $request->yakuniy == "on" ? true : false;
        // $fan->guruh_id =$request->guruh_id;
        // $fan->save();
           $gur=Guruh::find($id);
            $gur->nomi=$request->guruh_nomi;
            $gur->boshliq_fio=$request->fio;
            $gur->holat=$request->holat=="on" ? true:false;
            $gur->til_id=$request->til;
            $gur->kurs_bosqiches_id=$request->kurs_nomi;
            $gur->yunalish_id=$request->yunalish_nomi;
            $gur->save();

        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
}

