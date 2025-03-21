<?php

namespace App\Http\Controllers\ohtm_fakkafboshliq;

use App\Http\Controllers\Controller;
use App\Models\Fanlar;

class FanlarUqituvchiController extends Controller
{
    public function index()
    {
        $fanlar=Fanlar::select(
                'fanlars.id',
                'fanlars.nomi',
                'fanlars.qs_nomi',
            )
            ->where('fanlars.ohtm_id', auth()->user()->ohtm_id)
            ->where('fanlars.fakultet_kafedra_id' ,auth()->user()->uqituvchi->fakultet_kafedra_id)
            ->distinct()
//            ->where('fanlars.fakultet_kafedra_id' ,auth()->user()->fanlar->fakultet_kafedra_id)
            ->get();
//        dd(auth()->user());
        return view('ohtm_fakkafboshliq.fanlar',compact('fanlar'));
    }
}
