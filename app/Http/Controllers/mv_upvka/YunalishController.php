<?php

namespace App\Http\Controllers\mv_upvka;

use App\Http\Controllers\Controller;
use App\Models\Yunalishlar;
use Illuminate\Http\Request;

class YunalishController extends Controller
{
    public function guruh(Request $request)
    {
        $guruhs = Guruh::where('yunalish_id', $request->yunalish_id)
        ->leftJoin('kurs', 'guruhs.kurs_id', '=', 'kurs.id')
        ->leftJoin('yunalishlars', 'guruhs.yunalish_id', '=', 'yunalishlars.id')
        ->leftJoin('ohtms', 'kurs.ohtm_id', '=', 'ohtms.id')
        ->select('kurs.nomi as kurs_nomi', 'guruhs.nomi')->get();
         dd(111);

        return view('mv_upvka.guruhlar', compact('guruhs'));
    }

    public function show(Request $request)
    {
        $yunalishlar = Yunalishlar::where('ohtm_id', $request->ohtm)->get();
        return view('mv_upvka.yunalishlar', compact('yunalishlar'));
    }
}
