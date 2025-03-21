<?php

namespace App\Http\Controllers\ohtm_fakkafboshliq;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hujjatlar;
use App\Models\Fanlar;
use App\Models\HujjatTuri;

class KafHujjatController extends Controller
{
    public function index($jurnal_id)
    {
        $hujjatlars = Hujjatlar::leftjoin('hujjat_turis', 'hujjat_turi_id', '=', 'hujjat_turis.id')
            ->leftjoin('jurnals', 'hujjatlars.jurnal_id', '=', 'jurnals.id')
            ->leftjoin('fanlars', 'jurnals.fanlar_id', '=', 'fanlars.id')
            ->where('fanlars.ohtm_id', auth()->user()->ohtm_id)
            ->where('hujjatlars.jurnal_id', $jurnal_id)
            ->select(
                'hujjatlars.*',
                'hujjatlars.id',
                'hujjat_turis.name as hujjat_turi_nomi',
                'fanlars.nomi as jurnal_nomi',
                'hujjatlars.nomi',
                'hujjatlars.file_name',
                'hujjatlars.file_path',
            )

            ->paginate(10);

//        dd($hujjatlars);
        $jurnal_nomi = Fanlar::all();
        $hujjat_tur = HujjatTuri::all();



        return view('ohtm_fakkafboshliq.kaf_hujjat', compact('hujjatlars', 'hujjat_tur', 'jurnal_nomi', 'jurnal_id'));
    }
}
