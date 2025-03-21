<?php

namespace App\Http\Controllers\ohtm_uqituvchi;

use App\Http\Controllers\Controller;
use App\Models\Baho;
use App\Models\Dars_kun;
use App\Models\Jurnal;
use App\Models\Mavzu;
use App\Models\Tinglovchi;
use Illuminate\Http\Request;

class BahoOraliqController extends Controller
{
    public function index($jurnal_id){

        $jurnal = Jurnal::where('id', $jurnal_id)->first();
        $mavzus = Mavzu::where(['jurnal_id'=>$jurnal_id, 'used'=>(bool)false])->get();

        $tinglovchis = Tinglovchi::where(['guruh_id'=>$jurnal->guruh_id, 'ohtm_id'=>auth()->user()->ohtm_id])->get();
        $dars_kuns = Dars_kun::with('get_baho_only','mavzu')->where('jurnal_id', $jurnal_id)
            ->where('nazorat_turi_id',1)->get();
        $bahos = Baho::orderBy('id')->get();
        $baho_array = $bahos->keyBy('id')->toArray();


        return view('ohtm_uqituvchi.baho_oraliq', compact('jurnal', 'mavzus', 'dars_kuns', 'tinglovchis', 'bahos', 'baho_array'));
    }
    public function create(Request $request)
    {

        $request->validate([
            'dars_kun_id' => 'required',
            'baho_id' => 'required',
            'tinglovchi_id' => 'required',
        ]);
        $modelName = 'App\Models\Baho' . auth()->user()->ohtm_id;
        $model = new $modelName;
        $model->dars_kun_id = $request->dars_kun_id;
        $model->baho_id = $request->baho_id;
        $model->tinglovchi_id = $request->tinglovchi_id;
        $model->save();

        return redirect()->back()->withSuccess("baho qo'yildi");

    }

    public function edit(Request $request, $id)
    {

        $modelName = 'App\Models\Baho' . auth()->user()->ohtm_id;
        $model = new $modelName;
        $curBaho = $model->find($id);
        $request->validate([
            'dars_kun_id' => 'required',
            'baho_id' => 'required',
            'tinglovchi_id' => 'required',
        ]);

        $curBaho->update([
            'dars_kun_id'=>$request->dars_kun_id,
            'baho_id'=>$request->baho_id,
            'tinglovchi_id'=>$request->tinglovchi_id
        ]);
        return redirect()->back()->withSuccess("baho o'zgartirildi");
    }
}
