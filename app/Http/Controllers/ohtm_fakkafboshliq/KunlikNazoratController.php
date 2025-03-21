<?php

namespace App\Http\Controllers\ohtm_fakkafboshliq;

use App\Http\Controllers\Controller;
use App\Models\KunlikNazorat;
use App\Models\Uqituvchi;

class KunlikNazoratController extends Controller
{
    public function index()
    {
        $kunlik_nazorat = KunlikNazorat::leftJoin('fakultet_kafedras','kunlik_nazorats.fakultet_kafedra_id','fakultet_kafedras.id')
            ->leftJoin('xonalars','kunlik_nazorats.xona_id','xonalars.id')
            ->leftJoin('uqituvchis','uqituvchis.fakultet_kafedra_id','kunlik_nazorats.fakultet_kafedra_id')
            ->leftJoin('uquv_yili_ohtms','kunlik_nazorats.uquv_yili_ohtm_id','uquv_yili_ohtms.id')
            ->select(
                'kunlik_nazorats.id',
                'xonalars.nomi as xona',
                'fakultet_kafedras.nomi as kafedra',
                'kunlik_nazorats.vaqti as vaqti',
                'kunlik_nazorats.fayl as fayl',
                'kunlik_nazorats.haqida as haqida',
                'kunlik_nazorats.korildi as korildi',
            )
            ->where('kunlik_nazorats.fakultet_kafedra_id',auth()->user()->uqituvchi->fakultet_kafedra_id)
            ->distinct()
            ->get();
//        dd($kunlik_nazorat);


        $son=KunlikNazorat::where('fakultet_kafedra_id',auth()->user()->uqituvchi->fakultet_kafedra_id)
            ->where('korildi',false)->count();

        return view('ohtm_fakkafboshliq.kunlik_nazorat',compact('kunlik_nazorat') , [
            'extra_data' => $son,
            'active_menu' => 9  // 9-itemni faollashtirish uchun
        ]);
    }


    public function edit($id){
//        dd($id);
        $kun_naz=KunlikNazorat::where('id', $id)->first();
        $kun_naz->korildi=true;
        $kun_naz->save();

        return redirect()->back();
    }

}
