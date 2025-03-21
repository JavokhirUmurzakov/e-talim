<?php

namespace App\Http\Controllers\ohtm_fakkafboshliq;

use App\Http\Controllers\Controller;
use App\Models\Uqituvchi;

class UqituvchilarController extends Controller
{
    public function index()
    {
        $uqituvchi=Uqituvchi::leftJoin('harbiy_unvons' , 'uqituvchis.harbiy_unvon_id', '=', 'harbiy_unvons.id')
            ->select(

                'uqituvchis.id',
                'uqituvchis.fio',
                'uqituvchis.rasm',
                'harbiy_unvons.nomi as harbiy_unvon_nomi'
            )
            ->where('uqituvchis.ohtm_id', auth()->user()->ohtm_id)
            ->where('uqituvchis.fakultet_kafedra_id' ,auth()->user()->uqituvchi->fakultet_kafedra_id)
            ->get();
//        dd($uqituvchi);
        return view('ohtm_fakkafboshliq.uqituvchilar' , compact('uqituvchi' ,));
    }
}
