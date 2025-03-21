<?php

namespace App\Http\Controllers\ohtm_uquv_bulimi;

use App\Http\Controllers\Controller;
use App\Models\Fakultet_kafedra;
use Illuminate\Http\Request;
use App\Models\Fanlar;
use App\Models\Guruh;
use App\Models\Nashr;
use App\Models\Uqituvchi;

class KafBoshController extends Controller
{
    public function index($kafedra_id)
    {
        //  dd(auth()->user());

        $uqituvchilar_soni=Uqituvchi::where('uqituvchis.fakultet_kafedra_id',$kafedra_id)->count();
        $fanlar_soni=Fanlar::where('fanlars.fakultet_kafedra_id',$kafedra_id)->count();
        $ilmiy_salohiyat=Uqituvchi::where('uqituvchis.fakultet_kafedra_id',$kafedra_id)
                                   ->where('ilmiy_unvon_id', 1)
                                  ->where('ilmiy_daraja_id', 1)->count();
        $ilmiy_salohiyat-=$uqituvchilar_soni;
        $ilmiy_salohiyat*=-1;
        $x=$uqituvchilar_soni/10;
        $guruh_soni=Guruh::where('guruhs.fakultet_kafedra_id',$kafedra_id)->count();
        $uqituvchi=Uqituvchi::where('uqituvchis.fakultet_kafedra_id',$kafedra_id)
                            ->leftjoin('uqituvchi_shax_mals', 'uqituvchis.id', '=', 'uqituvchi_shax_mals.uqituvchi_id')
                            ->leftjoin('harbiy_unvons', 'harbiy_unvon_id','=','harbiy_unvons.id')
                            ->leftjoin('ilmiy_unvons', 'ilmiy_unvon_id','=','ilmiy_unvons.id')
                            ->select('uqituvchis.fio',
                                     'harbiy_unvons.nomi as harbiy_unvon_nomi',
                                     'ilmiy_unvons.nomi as ilmiy_unvon_nomi',
                                      'uqituvchis.mutaxassisligi',
                                      'uqituvchi_shax_mals.tugilgan_sana as tugilgan_sana ')->paginate(10);
//        dd($uqituvchi);

        if($uqituvchilar_soni==0)
        $kaf_ilmiy_sal=0;
        else
        $kaf_ilmiy_sal=(int)($ilmiy_salohiyat/$uqituvchilar_soni*100);

        $totalTasks = $uqituvchilar_soni; // faqat `soni` maydonini olamiz
        // Bajarilgan ishlarni olish (bu qismi sizning ma'lumotlaringizga qarab o‘zgartirilishi mumkin)
        $completedTasks = $ilmiy_salohiyat;// Hozircha random qiymat berdim
//        $nashrNames = $yillik_reja->pluck('nashr_nomi');

        $kitob_soni=Nashr::where('nashr_turi_id', 1)->count();
        $maqola_soni=Nashr::where('nashr_turi_id', 1)->count();
        $itob_soni=Nashr::where('nashr_turi_id', 1)->count();
        $kaf_nomi=Fakultet_kafedra::where('id',$kafedra_id)->get();

        return view('ohtm_uquv_bulimi.uquv_kaf_bosh',compact('uqituvchilar_soni', 'fanlar_soni','ilmiy_salohiyat','kaf_ilmiy_sal','guruh_soni','uqituvchi','totalTasks','completedTasks','kaf_nomi', 'kafedra_id'));


    }
}
