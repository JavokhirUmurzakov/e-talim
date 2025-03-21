<?php

namespace App\Http\Controllers\ohtm_uqituvchi;

use App\Http\Controllers\Controller;
use App\Models\Dars_kun;
use App\Models\Mavzu;
use Illuminate\Http\Request;

class DarsKunController extends Controller
{
    public function create(Request $request){

        $today = date("d-m-y");
        $request->validate([
            'mavzu_id'=>'required',
            'sana'=> 'required|date_format:d-m-y|after_or_equal:'.$today,
        ]);
        $jurnal_id = $request->jurnal_id;
        $cur_dars_kun = Dars_kun::where(['jurnal_id'=>$jurnal_id, 'sana'=>date("d-m-y"), 'mavzu_id'=>$request->mavzu_id, 'nazorat_turi_id'=>3])->first();

        if($cur_dars_kun==null){
            $dars = Dars_kun::create([
                'jurnal_id'=>$jurnal_id,
                'sana'=>$request->sana,
                'nazorat_turi_id'=>3,
                'ohtm_id'=>auth()->user()->ohtm_id,
                'mavzu_id'=>$request->mavzu_id,
                'uqituvchi_id'=>auth()->user()->uqituvchi->id
            ]);
            if($dars){
                $mavzu = Mavzu::where('id', $request->mavzu_id);
                $mavzu->update([
                    'used'=>true
                ]);
            }
        }else{
            $cur_dars_kun->update([
                'mavzu_id'=>$request->mavzu_id
            ]);
        }
        return redirect()->back()->withSuccess('yaratildi');
    }


}
