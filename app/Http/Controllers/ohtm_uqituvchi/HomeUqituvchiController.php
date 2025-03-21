<?php

namespace App\Http\Controllers\ohtm_uqituvchi;

use App\Http\Controllers\Controller;
use App\Models\Fanlar;
use App\Models\Guruh;
use App\Models\KunlikNazorat;
use App\Models\Nashr;
use App\Models\Nashr_turi;
use App\Models\Uqituvchi;
use App\Models\YillikReja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeUqituvchiController extends Controller
{
    public function index()
    {
        $uqituvchi=Uqituvchi::leftJoin('harbiy_unvons' ,'uqituvchis.harbiy_unvon_id','=','harbiy_unvons.id')
            ->leftJoin('uqituvchi_shax_mals','uqituvchis.id','=','uqituvchi_shax_mals.uqituvchi_id')
            ->leftJoin('ilmiy_unvons','uqituvchis.ilmiy_unvon_id','=','ilmiy_unvons.id')
            ->select(
                'uqituvchis.fio',
                'uqituvchis.mutaxassisligi',
                'harbiy_unvons.nomi as harbiy_unvon_nomi',
                'ilmiy_unvons.nomi as ilmiy_unvon_nomi',
                'uqituvchi_shax_mals.tugilgan_sana as tugilgan_sana'
            )->where('uqituvchis.fakultet_kafedra_id' ,auth()->user()->uqituvchi->fakultet_kafedra_id)
            ->where('uqituvchis.ohtm_id', auth()->user()->ohtm_id)
            ->get();
//        dd($uqituvchi);

        $guruh = Guruh::leftJoin('kurs_bosqiches', 'guruhs.kurs_bosqiches_id', '=', 'kurs_bosqiches.id')
            ->leftJoin('yunalishlars', 'guruhs.yunalish_id', '=', 'yunalishlars.id')
            ->leftJoin('jurnals', 'jurnals.guruh_id', '=', 'guruhs.id')
            ->leftJoin('fan_uqituvchis', 'fan_uqituvchis.jurnal_id', '=', 'jurnals.id')
            ->where('fan_uqituvchis.uqituvchi_id', auth()->user()->uqituvchi->id)
            ->select(
                'guruhs.id',
                'guruhs.nomi as guruh_nomi',
                'kurs_bosqiches.nomi as kurs_nomi',
                'yunalishlars.nomi as yunalish_nomi',
//                DB::raw('COUNT(guruhs.id) as total')
            )
            ->groupBy('guruhs.id', 'guruhs.nomi', 'kurs_bosqiches.nomi', 'yunalishlars.nomi')
            ->get();
        $guruh_soni=$guruh->count();

        $fanlar = Fanlar::leftJoin('jurnals', 'fanlars.id', '=', 'jurnals.fanlar_id')
            ->leftJoin('uquv_yili_ohtms', 'jurnals.uquv_yili_ohtm_id', '=', 'uquv_yili_ohtms.id')
            ->leftJoin('fan_uqituvchis', 'jurnals.fanlar_id', '=', 'fan_uqituvchis.id')
            ->leftJoin('uqituvchis', 'fan_uqituvchis.uqituvchi_id', '=', 'uqituvchis.id')
            ->select(
                'fanlars.nomi',
                'fanlars.qs_nomi',
            )
            ->where('fanlars.ohtm_id', auth()->user()->ohtm_id)
            ->where('uqituvchis.fakultet_kafedra_id', auth()->user()->uqituvchi->fakultet_kafedra_id)
            ->groupBy('fanlars.id')
            ->get();

        $fanlar_soni = $fanlar->count(); // Fanlar soni


        $nashr = Nashr::leftJoin('uqituvchis', 'nashrs.uqituvchi_id', '=', 'uqituvchis.id')
            ->leftJoin('nashr_turis', 'nashrs.nashr_turi_id', '=', 'nashr_turis.id')
            ->select(
                'nashr_turis.id as nashr_turis_id',
                'nashr_turis.nomi as nashr_nomi',
                DB::raw('count(nashrs.id) as total')
            )
            ->where('uqituvchis.id', auth()->user()->uqituvchi->id)
            ->where('uqituvchis.ohtm_id', auth()->user()->ohtm_id)
            ->groupBy('nashr_turis.nomi', 'nashr_turis.id')
            ->orderBy('nashr_turis.id', 'asc')
            ->get();
//        dd($nashr);

        $yillik_reja=YillikReja::leftjoin('uqituvchis', 'yillik_rejas.uqituvchi_id', '=', 'uqituvchis.id')
            ->leftjoin('nashr_turis', 'yillik_rejas.nashr_tur_id', '=', 'nashr_turis.id')
            ->leftjoin('uquv_yilis', 'yillik_rejas.uquv_yili_id', '=', 'uquv_yilis.id')
            ->select('uqituvchis.fio as uqituvchi_fio',
                'nashr_turis.nomi as nashr_nomi',
                'nashr_turis.id as nashr_turis_id',
                'uquv_yilis.nomi as uquv_yili',
                'yillik_rejas.id',
                'yillik_rejas.soni'
            )
            ->where('uqituvchis.ohtm_id', auth()->user()->ohtm_id)
            ->where('uqituvchis.id', auth()->user()->uqituvchi->id)
            ->orderBy('nashr_turis.id', 'asc')
            ->get();

            // dd($yillik_reja);
        // Bajarilishi kerak bo'lgan nashrlar (umumiy soni)
        $totalTasks = $yillik_reja->pluck('soni'); // faqat `soni` maydonini olamiz
        // Bajarilgan ishlarni olish (bu qismi sizning ma'lumotlaringizga qarab o‘zgartirilishi mumkin)
        $completedTasks = $nashr->pluck('total');// Hozircha random qiymat berdim
        $nashrNames = $yillik_reja->pluck('nashr_nomi');

        $umumiy = $nashr->map(function ($n, $index) use ($yillik_reja) {
            return ($n->total ?? 0) . ' | ' . ($yillik_reja[$index]->soni ?? 0);
        });
//

        return view('ohtm_uqituvchi.uqituvchi_home', compact('uqituvchi', 'nashr',
            'guruh','fanlar','fanlar_soni','guruh_soni','yillik_reja', 'umumiy', 'totalTasks', 'completedTasks', 'nashrNames'));

    }
}
