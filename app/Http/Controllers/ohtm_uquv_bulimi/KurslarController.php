<?php

namespace App\Http\Controllers\ohtm_uquv_bulimi;

use App\Http\Controllers\Controller;
use App\Models\Guruh;
use App\Models\Kurs;
use App\Models\Kurs_bosqich;
use App\Models\Tinglovchi;
use Illuminate\Support\Facades\DB;

class KurslarController extends Controller
{
    public function index()
    {

//        $guruhs = Guruh::select(DB::raw('count(guruhs.id)'))
//            ->whereColumn('kurs_id', 'kurs.id')
//            ->where('kurs.ohtm_id', auth()->user()->ohtm_id)
//            ->getQuery();
//        $tinglovchis = Tinglovchi::select(DB::raw('count(tinglovchis.id)'))
//            ->whereColumn('guruhs.id', 'guruh_id')
//            ->where('ohtm_id', auth()->user()->ohtm_id)
//            ->getQuery();
//
//
//        $course = Kurs_bosqich::leftJoin('kurs', 'kurs_bosqiches.id', '=', 'kurs.kurs_bosqich_id')
//            ->leftJoin('guruhs', 'guruhs.kurs_id', '=', 'kurs.id')
//            ->leftJoin('uquv_yili_ohtms', 'guruhs.kurs_id', '=', 'uquv_yili_ohtms.ohtm_id')
//            ->selectSub($tinglovchis, 'tinglovchi_count')
//            ->selectSub($guruhs, 'guruhs_count')
//            ->get();
////        $kurslar = Kurs_bosqich::leftJoin('kurs', 'kurs.kurs_bosqich_id', '=', 'kurs_bosqiches.id')
////            ->select(
////                'kurs_bosqiches.*',
////            )
////            ->get();
//
//        $kurslar = Kurs_bosqich::whereHas('kurslar', function ($query) {
//            return $query->where('ohtm_id', '=', auth()->user()->ohtm_id);
//            })->get();
////        $kurslar = Kurs_bosqich::withCount('kurslar')->get();
//
//
//        //dd($kurslar);
//        return view('ohtm_uquv_bulimi.kurslar', compact('kurslar','course','guruhs',));


        $guruhs_count = Guruh::selectRaw('COUNT(*)')
            ->whereColumn('guruhs.kurs_bosqiches_id', 'kurs.id')
            ->where('kurs.ohtm_id', auth()->user()->ohtm_id);

        $tinglovchi_count = Tinglovchi::selectRaw('COUNT(*)')
            ->whereIn('tinglovchis.guruh_id', function ($query) {
                $query->select('id')
                    ->from('guruhs')
                    ->whereColumn('guruhs.kurs_bosqiches_id', 'kurs.id');
            })
            ->where('tinglovchis.ohtm_id', auth()->user()->ohtm_id);

        $course = Kurs_bosqich::leftJoin('kurs', 'kurs_bosqiches.id', '=', 'kurs.kurs_bosqiches_id')
            ->leftJoin('guruhs', 'guruhs.kurs_bosqiches_id', '=', 'kurs.id')
            ->select(
                'kurs_bosqiches.*',
                'kurs.nomi as kurs_nomi',
                'kurs.id as kurs_id'
            )
            ->selectSub($tinglovchi_count, 'tinglovchi_count')
            ->selectSub($guruhs_count, 'guruhs_count')
            ->groupBy('kurs.id', 'kurs_bosqiches.id', 'kurs.nomi')
            ->get();

        $kurslar = Kurs_bosqich::whereHas('kurslar', function ($query) {
            return $query->where('ohtm_id', '=', auth()->user()->ohtm_id);
        })->get();

        return view('ohtm_uquv_bulimi.kurslar', compact('kurslar', 'course'));
    }
}
