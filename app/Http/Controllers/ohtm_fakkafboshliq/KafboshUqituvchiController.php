<?php

namespace App\Http\Controllers\ohtm_fakkafboshliq;

use App\Http\Controllers\Controller;
use App\Models\Fanlar;
use App\Models\Guruh;
use App\Models\KunlikNazorat;
use App\Models\Nashr;
use App\Models\Uqituvchi;
use App\Models\YillikReja;
use function Brick\Math\getIntegralPart;

class KafboshUqituvchiController extends Controller
{
    public function index()
    {
        $uqituvchilar_soni=Uqituvchi::where('fakultet_kafedra_id', auth()->user()->uqituvchi->fakultet_kafedra_id)->count();
        $fanlar_soni=Fanlar::where('fakultet_kafedra_id', auth()->user()->uqituvchi->fakultet_kafedra_id)->count();
        $ilmiy_salohiyat=Uqituvchi::where('uqituvchis.fakultet_kafedra_id',auth()->user()->uqituvchi->fakultet_kafedra_id)->where('ilmiy_unvon_id', 1)
                                  ->where('ilmiy_daraja_id', 1)->count(); // ilmiy sal yuq uqituvchilar

//        $x=Uqituvchi::where('uqituvchis.fakultet_kafedra_id',auth()->user()->fakultet_kafedra_id)->count();
//            ->where('ilmiy_unvon_id', 1)
//            ->where('ilmiy_daraja_id', 1)->count();
//        dd(auth()->user()->uqituvchi->fakultet_kafedra_id);
        $ilmiy_salohiyat-=$uqituvchilar_soni;
        $ilmiy_salohiyat*=-1;
        $guruh_soni=Guruh::where('fakultet_kafedra_id',  auth()->user()->uqituvchi->fakultet_kafedra_id)->count();
        $uqituvchi=Uqituvchi::leftjoin('uqituvchi_shax_mals', 'uqituvchis.id', '=', 'uqituvchi_shax_mals.uqituvchi_id')
                            ->leftjoin('harbiy_unvons', 'harbiy_unvon_id','=','harbiy_unvons.id')
                            ->leftjoin('ilmiy_unvons', 'ilmiy_unvon_id','=','ilmiy_unvons.id')
                            ->select('uqituvchis.fio',
                                     'harbiy_unvons.nomi as harbiy_unvon_nomi',
                                     'ilmiy_unvons.nomi as ilmiy_unvon_nomi',
                                      'uqituvchis.mutaxassisligi',
                                      'uqituvchi_shax_mals.tugilgan_sana as tugilgan_sana ')
                            ->where('fakultet_kafedra_id',  auth()->user()->uqituvchi->fakultet_kafedra_id)
                            ->paginate(10);
       // dd($uqituvchilar_soni);
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




        return view('ohtm_fakkafboshliq.kafboshuqituvchi',compact('uqituvchilar_soni', 'fanlar_soni','ilmiy_salohiyat','kaf_ilmiy_sal','guruh_soni','uqituvchi','totalTasks','completedTasks'));


    }
}
