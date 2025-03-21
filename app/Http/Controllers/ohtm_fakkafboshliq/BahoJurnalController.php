<?php

namespace App\Http\Controllers\ohtm_fakkafboshliq;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Baho;
use App\Models\Dars_kun;
use App\Models\Jurnal;
use App\Models\Mavzu;
use App\Models\Tinglovchi;

class BahoJurnalController extends Controller
{
    public function index($jurnal_id){


        $jurnal = Jurnal::where('id', $jurnal_id)->first();
        $mavzus = Mavzu::where(['jurnal_id'=>$jurnal_id, 'used'=>(bool)false])->get();


        $tinglovchis = Tinglovchi::where(['guruh_id'=>$jurnal->guruh_id ,'ohtm_id'=>auth()->user()->ohtm_id])->get();
        $dars_kuns = Dars_kun::with('get_baho_only')->where('jurnal_id', $jurnal_id)
                                                            ->where('nazorat_turi_id',3)->get();
        $bahos = Baho::orderBy('id')->get();
        $baho_array = $bahos->keyBy('id')->toArray();


        return view('ohtm_fakkafboshliq.baho_jurnal', compact('jurnal', 'mavzus', 'dars_kuns', 'tinglovchis', 'bahos', 'baho_array'));
    }


}
