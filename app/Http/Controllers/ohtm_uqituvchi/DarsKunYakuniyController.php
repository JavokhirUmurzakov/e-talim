<?php

namespace App\Http\Controllers\ohtm_uqituvchi;

use App\Http\Controllers\Controller;
use App\Models\Dars_kun;
use App\Models\Mavzu;
use App\Models\Yakuniy;
use Illuminate\Http\Request;

class DarsKunYakuniyController extends Controller
{
    public function create(Request $request){
        $today = date("d-m-y");
        $request->validate([
            'sana'=> 'required|date_format:d-m-y|after_or_equal:'.$today,
        ]);
        $jurnal_id = $request->jurnal_id;
        $cur_dars_kun = Yakuniy::where(['jurnal_id'=>$jurnal_id, 'sana'=>date("d-m-y")])->first();

        if($cur_dars_kun==null) {
             Yakuniy::create([
                'jurnal_id' => $jurnal_id,
                'sana' => $request->sana,
                'ohtm_id' => auth()->user()->ohtm_id,
                'uqituvchi_id' => auth()->user()->uqituvchi->id
            ]);
        }
//        dd($cur_dars_kun);
        return redirect()->back()->withSuccess('yaratildi');
    }
}
